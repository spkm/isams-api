<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernStudentForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Associates a student with a concern.
 *
 * POST /api/wellbeing/students/{schoolId}/concerns/{concernId}/students
 */
class AssociateConcernStudentRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernStudentForCreate|array<string, mixed>  $concernStudent
     */
    public function __construct(
        protected string $schoolId,
        protected int $concernId,
        protected ConcernStudentForCreate|array $concernStudent,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/students';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concernStudent instanceof Data ? $this->concernStudent->toArray() : $this->concernStudent;
    }
}
