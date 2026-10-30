<?php

namespace spkm\IsamsApi\Exceptions;

use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\Response;
use Saloon\Repositories\Body\ArrayBodyRepository;
use spkm\IsamsApi\IsamsApiException;

/**
 * iSAMS rejected the credentials: a refused token request, or a token it no longer accepts.
 */
class UnauthorizedException extends IsamsApiException
{
    protected function describe(Response $response): string
    {
        if (! $response->getRequest() instanceof GetClientCredentialsTokenRequest) {
            return parent::describe($response);
        }

        $body = $response->getPendingRequest()->body();
        $body = $body instanceof ArrayBodyRepository ? $body : null;
        $error = self::field($response, 'error') ?? (string) $response->status();
        $reason = match ($error) {
            'invalid_client' => 'the client id or secret is wrong',
            'invalid_scope' => "the client isn't allowed the scope it asked for (".$body?->get('scope').')',
            default => self::field($response, 'error_description'),
        };

        return 'iSAMS refused the token request: '.$error.($reason ? ", $reason" : '');
    }
}
