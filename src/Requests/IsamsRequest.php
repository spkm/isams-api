<?php

namespace spkm\IsamsApi\Requests;

use Illuminate\Support\Facades\Cache;
use Psr\Http\Message\RequestInterface;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Enums\Method;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\IsamsApiException;
use spkm\IsamsApi\IsamsConnector;

abstract class IsamsRequest extends Request implements Cacheable
{
    use HasCaching;

    public const ONE = 'one';

    public const LIST = 'list';

    public const CREATED = 'created';

    public const FILE = 'file';

    public const RAW = 'raw';

    public const NONE = 'none';

    public string $resultKey = '';

    protected string $responseShape = self::NONE;

    /** @var class-string<Data>|null */
    protected ?string $dto = null;

    protected bool $cacheable = false;

    protected bool $safe = true;

    protected ?string $apiVersion = null;

    public function resolveCacheDriver(): Driver
    {
        return new LaravelCacheDriver(Cache::store(config('isams-api.cache.store')));
    }

    public function cacheExpiryInSeconds(): int
    {
        return (int) config('isams-api.cache.seconds', 3600);
    }

    /**
     * @return array<Method>
     */
    protected function getCacheableMethods(): array
    {
        return $this->cacheable && config('isams-api.cache.enabled') ? [Method::GET] : [];
    }

    protected function cacheKey(PendingRequest $pendingRequest): string
    {
        $connector = $pendingRequest->getConnector();
        $client = $connector instanceof IsamsConnector ? $connector->oauthConfig()->getClientId() : '';

        return 'isams-api.response.'.sha1($client.' '.$pendingRequest->getMethod()->value.' '.$pendingRequest->getUri());
    }

    public function handlePsrRequest(RequestInterface $request, PendingRequest $pendingRequest): RequestInterface
    {
        $query = (string) preg_replace('/%5B\d+%5D=/', '=', $request->getUri()->getQuery());

        return $request->withUri($request->getUri()->withQuery($query));
    }

    public function boot(PendingRequest $pendingRequest): void
    {
        if ($this->apiVersion !== null) {
            $pendingRequest->query()->add('api-version', $this->apiVersion);
        }
    }

    public function isSafe(): bool
    {
        return $this->safe && $this->getMethod() === Method::GET;
    }

    /**
     * @return class-string<Data>|null
     */
    public function dtoClass(): ?string
    {
        return $this->dto;
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return $this->responseShape === self::FILE ? ['Accept' => '*/*'] : [];
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        if ($response->failed()) {
            throw new IsamsApiException($response);
        }

        return match ($this->responseShape) {
            self::ONE => $this->dto ? $this->dto::from($response->json()) : $response->json(),
            self::LIST => collect((array) ($this->resultKey === '' ? $response->json() : $response->json($this->resultKey)))
                ->map(fn (mixed $item) => $this->dto && is_array($item) ? $this->dto::from($item) : $item)
                ->values(),
            self::CREATED => Created::fromResponse($response),
            self::FILE => File::fromResponse($response),
            self::RAW => $response->body() === '' ? [] : json_decode($response->body(), true, flags: JSON_THROW_ON_ERROR),
            default => null,
        };
    }
}
