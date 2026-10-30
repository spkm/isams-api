<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\StatusStudents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Registration\UpdateRegistrationStatusCommand;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a registration status.
 *
 * PUT /api/registration/register/{registrationPeriodId}/students/{schoolId}
 */
class UpdateStudentRegistrationStatusRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Registration\UpdateRegistrationStatusCommand|array<string, mixed>  $updateRegistrationStatus
     */
    public function __construct(
        protected int $registrationPeriodId,
        protected string $schoolId,
        protected UpdateRegistrationStatusCommand|array $updateRegistrationStatus,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/register/'.rawurlencode((string) $this->registrationPeriodId).'/students/'.rawurlencode((string) $this->schoolId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->updateRegistrationStatus instanceof Data ? $this->updateRegistrationStatus->toArray() : $this->updateRegistrationStatus;
    }
}
