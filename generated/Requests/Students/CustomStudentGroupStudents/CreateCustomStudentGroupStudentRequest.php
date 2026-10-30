<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Associates a student with custom student group.
 *
 * POST /api/students/customgroups/{customGroupId}/students/{schoolId}
 */
class CreateCustomStudentGroupStudentRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForCreate|array<string, mixed>  $customStudentGroupStudent
     */
    public function __construct(
        protected int $customGroupId,
        protected string $schoolId,
        protected CustomStudentGroupStudentForCreate|array $customStudentGroupStudent,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/customgroups/'.rawurlencode((string) $this->customGroupId).'/students/'.rawurlencode((string) $this->schoolId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->customStudentGroupStudent instanceof Data ? $this->customStudentGroupStudent->toArray() : $this->customStudentGroupStudent;
    }
}
