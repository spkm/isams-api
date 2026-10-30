<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a pupil leaving reasons.
 *
 * DELETE /api/systemconfiguration/list/pupilleavingreasons/{id}
 */
class DeleteStudentLeavingReasonRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/list/pupilleavingreasons/'.rawurlencode((string) $this->id);
    }
}
