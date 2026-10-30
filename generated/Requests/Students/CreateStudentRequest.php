<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\StudentForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a student.
 *
 * POST /api/students
 */
class CreateStudentRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentForCreate|array<string, mixed>  $student
     */
    public function __construct(
        protected StudentForCreate|array $student,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->student instanceof Data ? $this->student->toArray() : $this->student;
    }
}
