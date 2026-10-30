<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Discipline\DetentionSessions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Discipline\DetentionSessionStudent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a detention session students by its DetentionSessionID.
 *
 * GET /api/discipline/detention/students/{schoolId}/sessions
 */
#[Beta]
class GetStudentDetentionSessionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = DetentionSessionStudent::class;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/discipline/detention/students/'.rawurlencode((string) $this->schoolId).'/sessions';
    }
}
