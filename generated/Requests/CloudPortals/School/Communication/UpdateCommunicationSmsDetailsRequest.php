<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Communication;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasStringBody;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * POST /api/portals/communications/sms/add
 */
class UpdateCommunicationSmsDetailsRequest extends IsamsRequest implements HasBody
{
    use HasStringBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected string $mobileNumber,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/communications/sms/add';
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return ['Content-Type' => 'application/json'];
    }

    protected function defaultBody(): string
    {
        return (string) json_encode($this->mobileNumber);
    }
}
