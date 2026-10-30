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
 * GET /api/discipline/detention/sessions/{id}/students
 */
#[Beta]
class GetDetentionSessionStudentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = DetentionSessionStudent::class;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/discipline/detention/sessions/'.rawurlencode((string) $this->id).'/students';
    }
}
