<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Alumni;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Transitions an alumni to current.
 *
 * POST /api/alumni/{schoolId}/commands/movetocurrent
 */
class MoveAlumniToCurrentRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/alumni/'.rawurlencode((string) $this->schoolId).'/commands/movetocurrent';
    }
}
