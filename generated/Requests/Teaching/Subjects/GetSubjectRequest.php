<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\Subjects;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Teaching\Subject;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a subject.
 *
 * GET /api/teaching/subjects/{id}
 */
class GetSubjectRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Subject::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/teaching/subjects/'.rawurlencode((string) $this->id);
    }
}
