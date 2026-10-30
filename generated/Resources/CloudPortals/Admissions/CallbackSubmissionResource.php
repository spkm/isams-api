<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use spkm\IsamsApi\Data\Admissions\CallbackSubmissionForCreate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\CallbackSubmission\SaveCallbackSubmissionRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CallbackSubmissionResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Admissions\CallbackSubmissionForCreate|array<string, mixed>  $callbackSubmission
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\CallbackSubmission\SaveCallbackSubmissionRequest
     */
    public function save(CallbackSubmissionForCreate|array $callbackSubmission): Created
    {
        return $this->fetch(new SaveCallbackSubmissionRequest(callbackSubmission: $callbackSubmission));
    }
}
