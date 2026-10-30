<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\Subjects;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Teaching\SubjectForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a subject.
 *
 * PUT /api/teaching/subjects/{id}
 */
class UpdateSubjectRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\SubjectForUpdate|array<string, mixed>  $subject
     */
    public function __construct(
        protected int $id,
        protected SubjectForUpdate|array $subject,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/teaching/subjects/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->subject instanceof Data ? $this->subject->toArray() : $this->subject;
    }
}
