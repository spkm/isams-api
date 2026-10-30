<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Registration\UpdateStudentAttendanceSelfRegistrationRegisterCollectionForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PUT /api/portals/students/attendance/self/periods
 */
class UpdateSelfRegistrationRegisterPeriodsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Registration\UpdateStudentAttendanceSelfRegistrationRegisterCollectionForUpdate|array<string, mixed>  $updateStudentRegistersDto
     */
    public function __construct(
        protected UpdateStudentAttendanceSelfRegistrationRegisterCollectionForUpdate|array $updateStudentRegistersDto,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/attendance/self/periods';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->updateStudentRegistersDto instanceof Data ? $this->updateStudentRegistersDto->toArray() : $this->updateStudentRegistersDto;
    }
}
