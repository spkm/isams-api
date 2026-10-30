<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Account;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\SystemConfiguration\ProfileInformationForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PUT /api/portals/account/profile
 */
class UpdateAccountProfileInformationRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\ProfileInformationForUpdate|array<string, mixed>  $profileInformation
     */
    public function __construct(
        protected ProfileInformationForUpdate|array $profileInformation,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/profile';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->profileInformation instanceof Data ? $this->profileInformation->toArray() : $this->profileInformation;
    }
}
