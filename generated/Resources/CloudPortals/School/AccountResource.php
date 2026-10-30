<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use spkm\IsamsApi\Data\SystemConfiguration\PortalProfileInformation;
use spkm\IsamsApi\Data\SystemConfiguration\ProfileInformationForUpdate;
use spkm\IsamsApi\Data\SystemConfiguration\SecurityQuestionInformationForUpdate;
use spkm\IsamsApi\Requests\CloudPortals\School\Account\GetAccountProfileInformationRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Account\UpdateAccountProfileInformationRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Account\UpdateAccountSecurityQuestionAnswerRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AccountResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Account\GetAccountProfileInformationRequest
     */
    public function getProfileInformation(): PortalProfileInformation
    {
        return $this->fetch(new GetAccountProfileInformationRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\ProfileInformationForUpdate|array<string, mixed>  $profileInformation
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Account\UpdateAccountProfileInformationRequest
     */
    public function updateProfileInformation(ProfileInformationForUpdate|array $profileInformation): bool
    {
        $this->fetch(new UpdateAccountProfileInformationRequest(profileInformation: $profileInformation));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\SecurityQuestionInformationForUpdate|array<string, mixed>  $securityQuestionInformation
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Account\UpdateAccountSecurityQuestionAnswerRequest
     */
    public function updateSecurityQuestionAnswer(
        SecurityQuestionInformationForUpdate|array $securityQuestionInformation,
    ): bool {
        $this->fetch(new UpdateAccountSecurityQuestionAnswerRequest(securityQuestionInformation: $securityQuestionInformation));

        return true;
    }
}
