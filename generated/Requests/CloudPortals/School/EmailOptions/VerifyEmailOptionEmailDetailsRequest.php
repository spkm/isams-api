<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * POST /api/portals/account/emailoptions/verification/{verificationGuid}/commands/verify
 */
class VerifyEmailOptionEmailDetailsRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected string $verificationGuid,
        protected bool $updateUsername,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/emailoptions/verification/'.rawurlencode((string) $this->verificationGuid).'/commands/verify';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return [
            'updateUsername' => ($this->updateUsername ? 'true' : 'false'),
        ];
    }
}
