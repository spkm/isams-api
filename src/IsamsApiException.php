<?php

namespace spkm\IsamsApi;

use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
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
     * The exception for iSAMS's error status: a subclass for the errors callers handle differently.
     */
    public static function fromResponse(Response $response): self
    {
        $status = $response->status();

        return match (true) {
            $response->getRequest() instanceof GetClientCredentialsTokenRequest => new UnauthorizedException($response),
            self::refusesPermission($response) => new MissingPermissionException($response),
            $status === 404 => new NotFoundException($response),
            in_array($status, [400, 409, 412, 415, 422], true) => new InvalidRequestException($response),
            $status === 401 => new UnauthorizedException($response),
            $status === 408 || $response->serverError() => new ServerErrorException($response),
            default => new self($response),
        };
    }

    /**
     * Whether iSAMS refused for want of a permission: a 403, or a 401 saying which permission is required.
     */
    public static function refusesPermission(Response $response): bool
    {
        return $response->status() === 403
            || ($response->status() === 401 && preg_match('/permissions? (are|is) required/i', (string) self::field($response, 'message')) === 1);
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
        $text = 'iSAMS responded '.$response->status().' to '.self::requestLine($response);
        $page = self::htmlTitle($response);

        if ($page !== null) {
            return $text.' with an HTML '.($response->successful() ? 'page instead of JSON' : 'error page').($page !== '' ? " ('$page')" : '').($response->status() === 500 ? "; iSAMS sends one for a path it doesn't have, among other faults" : '');
        }

        if ($response->successful() && $response->body() !== '' && ! json_validate($response->body())) {
            return $text.' with a body that is not JSON';
        }

        $message = self::field($response, 'message');
        $trackingNumber = self::field($response, 'trackingNumber');
        $text .= ($message ? ": $message" : '').($trackingNumber ? " (tracking number $trackingNumber)" : '');

        if ($response->status() === 500 && $message === 'An error occurred.' && $response->getPendingRequest()->query()->get('$filter') !== null) {
            $text .= ". iSAMS answers this to any \$filter it can't apply: use the model's property names (in PascalCase), and only eq, ne, gt, ge, lt, le and and.";
        }

        return $text;
    }

    /**
     * The failed request's method and path, without its query string.
     */
    protected static function requestLine(Response $response): string
    {
        $pendingRequest = $response->getPendingRequest();

        return $pendingRequest->getMethod()->value.' '.(parse_url($pendingRequest->getUrl(), PHP_URL_PATH) ?: '/');
    }

    /**
     * The title of an HTML error page ('' when it has none), or null when iSAMS didn't send HTML.
     */
    private static function htmlTitle(Response $response): ?string
    {
        if (! str_contains(strtolower((string) $response->header('Content-Type')), 'html') && ! str_starts_with(ltrim($response->body()), '<')) {
            return null;
        }

        return preg_match('#<title>(.*?)</title>#is', $response->body(), $matches) ? trim(html_entity_decode($matches[1])) : '';
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
