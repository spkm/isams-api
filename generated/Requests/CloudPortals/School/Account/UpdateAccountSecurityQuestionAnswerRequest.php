<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Account;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\SystemConfiguration\SecurityQuestionInformationForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PUT /api/portals/account/securityquestion
 */
class UpdateAccountSecurityQuestionAnswerRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\SecurityQuestionInformationForUpdate|array<string, mixed>  $securityQuestionInformation
     */
    public function __construct(
        protected SecurityQuestionInformationForUpdate|array $securityQuestionInformation,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/securityquestion';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->securityQuestionInformation instanceof Data ? $this->securityQuestionInformation->toArray() : $this->securityQuestionInformation;
    }
}
