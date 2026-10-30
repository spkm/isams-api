<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Discipline\DetentionSessions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Discipline\DetentionSession;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a detention session by its ID.
 *
 * GET /api/discipline/detention/sessions/{id}
 */
#[Beta]
class GetDetentionSessionRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = DetentionSession::class;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/discipline/detention/sessions/'.rawurlencode((string) $this->id);
    }
}
