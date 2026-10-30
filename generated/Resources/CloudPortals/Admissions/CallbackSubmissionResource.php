<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\CallbackSubmissionForCreate;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\CallbackSubmission\SaveCallbackSubmissionRequest;

class CallbackSubmissionResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Admissions\CallbackSubmissionForCreate|array<string, mixed>  $callbackSubmission
     */
    public function save(CallbackSubmissionForCreate|array $callbackSubmission): Response
    {
        return $this->connector->send(new SaveCallbackSubmissionRequest($callbackSubmission));
    }
}
