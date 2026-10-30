<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\CancelEmailOptionEmailDetailsVerificationRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\GetEmailOptionEmailDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\PatchEmailOptionEmailDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\EmailOptions\VerifyEmailOptionEmailDetailsRequest;
use spkm\IsamsApi\Support\JsonPatch;

class SchoolEmailOptionsResource extends BaseResource
{
    public function cancelEmailOptionEmailDetailsVerification(): Response
    {
        return $this->connector->send(new CancelEmailOptionEmailDetailsVerificationRequest());
    }

    public function getEmailOptionEmailDetails(): Response
    {
        return $this->connector->send(new GetEmailOptionEmailDetailsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchEmailOptionEmailDetails(JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchEmailOptionEmailDetailsRequest($patch));
    }

    public function verifyEmailOptionEmailDetails(string $verificationGuid, bool $updateUsername): Response
    {
        return $this->connector->send(new VerifyEmailOptionEmailDetailsRequest($verificationGuid, $updateUsername));
    }
}
