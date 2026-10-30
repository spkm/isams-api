<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\PortalEmailDetails;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\CancelEmailOptionEmailDetailsVerificationRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\GetEmailOptionEmailDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\PatchEmailOptionEmailDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\VerifyEmailOptionEmailDetailsRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class EmailOptionsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\CancelEmailOptionEmailDetailsVerificationRequest
     */
    public function cancelDetailsVerification(): Created
    {
        return $this->fetch(new CancelEmailOptionEmailDetailsVerificationRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\GetEmailOptionEmailDetailsRequest
     */
    public function getDetails(): ?PortalEmailDetails
    {
        return $this->fetch(new GetEmailOptionEmailDetailsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\PatchEmailOptionEmailDetailsRequest
     */
    public function patchDetails(JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchEmailOptionEmailDetailsRequest(patch: $patch));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\VerifyEmailOptionEmailDetailsRequest
     */
    public function verifyDetails(string $verificationGuid, bool $updateUsername): Created
    {
        return $this->fetch(new VerifyEmailOptionEmailDetailsRequest(verificationGuid: $verificationGuid, updateUsername: $updateUsername));
    }
}
