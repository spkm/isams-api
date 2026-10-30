<?php

namespace spkm\IsamsApi;

use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use spkm\IsamsApi\Exceptions\InvalidRequestException;
use spkm\IsamsApi\Exceptions\MissingPermissionException;
use spkm\IsamsApi\Exceptions\NotFoundException;
use spkm\IsamsApi\Exceptions\ServerErrorException;
use spkm\IsamsApi\Exceptions\UnauthorizedException;

class IsamsApiException extends RequestException
{
    public function __construct(Response $response)
    {
        parent::__construct($response, $this->describe($response));
    }

    /**
     * The exception for iSAMS's error status: a subclass for the statuses callers handle differently.
     */
    public static function fromResponse(Response $response): self
    {
        return match (true) {
            $response->status() === 404 => new NotFoundException($response),
            in_array($response->status(), [400, 409, 412, 415, 422], true) => new InvalidRequestException($response),
            $response->status() === 401 => new UnauthorizedException($response),
            $response->status() === 403 => new MissingPermissionException($response),
            $response->serverError() => new ServerErrorException($response),
            default => new self($response),
        };
    }

    public function isamsMessage(): ?string
    {
        return self::field($this->getResponse(), 'message');
    }

    public function trackingNumber(): ?string
    {
        return self::field($this->getResponse(), 'trackingNumber');
    }

    protected function describe(Response $response): string
    {
        $message = self::field($response, 'message');

        return 'iSAMS responded '.$response->status().($message ? ': '.$message : '');
    }

    /**
     * A field of iSAMS's JSON error body, or null when the body isn't JSON (such as a maintenance page).
     */
    protected static function field(Response $response, string $name): ?string
    {
        $body = json_decode($response->body(), true);
        $value = is_array($body) ? $body[$name] ?? null : null;

        return is_scalar($value) ? (string) $value : null;
    }
}
