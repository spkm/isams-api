<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use spkm\IsamsApi\Data\CloudPortals\SmsDetails;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\CloudPortals\School\Communication\DeleteCommunicationSmsDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Communication\GetCommunicationSmsDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Communication\UpdateCommunicationSmsDetailsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CommunicationResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Communication\DeleteCommunicationSmsDetailsRequest
     */
    public function deleteSmsDetails(): bool
    {
        $this->fetch(new DeleteCommunicationSmsDetailsRequest());

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Communication\GetCommunicationSmsDetailsRequest
     */
    public function getSmsDetails(): ?SmsDetails
    {
        return $this->fetch(new GetCommunicationSmsDetailsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Communication\UpdateCommunicationSmsDetailsRequest
     */
    public function updateSmsDetails(string $mobileNumber): Created
    {
        return $this->fetch(new UpdateCommunicationSmsDetailsRequest(mobileNumber: $mobileNumber));
    }
}
