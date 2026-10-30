<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\Subjects;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Teaching\SubjectForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a subject.
 *
 * POST /api/teaching/subjects
 */
class CreateSubjectRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\SubjectForCreate|array<string, mixed>  $subject
     */
    public function __construct(
        protected SubjectForCreate|array $subject,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/teaching/subjects';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->subject instanceof Data ? $this->subject->toArray() : $this->subject;
    }
}
