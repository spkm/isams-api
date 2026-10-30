<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\ProfileInformationForUpdate;
use spkm\IsamsApi\Data\SystemConfiguration\SecurityQuestionInformationForUpdate;
use spkm\IsamsApi\Requests\CloudPortals\School\Account\GetAccountProfileInformationRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Account\UpdateAccountProfileInformationRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Account\UpdateAccountSecurityQuestionAnswerRequest;

class AccountResource extends BaseResource
{
    public function getProfileInformation(): Response
    {
        return $this->connector->send(new GetAccountProfileInformationRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\ProfileInformationForUpdate|array<string, mixed>  $profileInformation
     */
    public function updateProfileInformation(ProfileInformationForUpdate|array $profileInformation): Response
    {
        return $this->connector->send(new UpdateAccountProfileInformationRequest($profileInformation));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\SecurityQuestionInformationForUpdate|array<string, mixed>  $securityQuestionInformation
     */
    public function updateSecurityQuestionAnswer(
        SecurityQuestionInformationForUpdate|array $securityQuestionInformation,
    ): Response {
        return $this->connector->send(new UpdateAccountSecurityQuestionAnswerRequest($securityQuestionInformation));
    }
}
