<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\StatusStudents;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Registration\RegistrationStatus;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a registration status for a student in a registration period.
 *
 * GET /api/registration/register/{registrationPeriodId}/students/{schoolId}
 */
class GetStudentRegistrationStatusRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = RegistrationStatus::class;

    public function __construct(
        protected int $registrationPeriodId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/register/'.rawurlencode((string) $this->registrationPeriodId).'/students/'.rawurlencode((string) $this->schoolId);
    }
}
