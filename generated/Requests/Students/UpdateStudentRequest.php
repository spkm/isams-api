<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\StudentForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a student.
 *
 * PUT /api/students/{schoolId}
 */
class UpdateStudentRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentForUpdate|array<string, mixed>  $student
     */
    public function __construct(
        protected string $schoolId,
        protected StudentForUpdate|array $student,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->student instanceof Data ? $this->student->toArray() : $this->student;
    }
}
