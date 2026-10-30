<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates an association between a custom student group and a student.
 *
 * PUT /api/students/customgroups/{customGroupId}/students/{schoolId}
 */
class UpdateCustomStudentGroupStudentRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupStudentForUpdate|array<string, mixed>  $customStudentGroupStudent
     */
    public function __construct(
        protected int $customGroupId,
        protected string $schoolId,
        protected CustomStudentGroupStudentForUpdate|array $customStudentGroupStudent,
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
