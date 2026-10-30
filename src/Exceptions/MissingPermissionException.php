<?php

namespace spkm\IsamsApi\Exceptions;

use Illuminate\Support\Str;
use Saloon\Http\Response;
use spkm\IsamsApi\IsamsApiException;

/**
 * iSAMS refused because the API client's permission for the request's area is too low (iSAMS sets None, Read, Write,
 * Modify or Full per area).
 */
class MissingPermissionException extends IsamsApiException
{
    /**
     * The permission iSAMS says is needed: Read, Write, Modify or Full.
     */
    public function requiredPermission(): ?string
    {
        return self::permissionIn($this->getResponse());
    }

    /**
     * The iSAMS area of the refused request, such as "Medical Centre"; null for an endpoint named by its path.
     */
    public function area(): ?string
    {
        return self::areaOf($this->getResponse());
    }

    protected function describe(Response $response): string
    {
        $permission = self::permissionIn($response);
        $area = self::areaOf($response);
        $message = self::field($response, 'message');

        return 'The iSAMS API client '.($permission ? "needs $permission permission" : 'lacks permission').($area ? " for $area" : '').($message ? ": $message" : '');
    }

    private static function permissionIn(Response $response): ?string
    {
        return preg_match('/\b(Read|Write|Modify|Full)\b/i', (string) self::field($response, 'message'), $matches) ? ucfirst(strtolower($matches[1])) : null;
    }

    private static function areaOf(Response $response): ?string
    {
        $namespace = Str::after($response->getRequest()::class, 'spkm\IsamsApi\Requests\\');

        return str_contains($namespace, '\\') ? Str::headline(Str::before($namespace, '\\')) : null;
    }
}
