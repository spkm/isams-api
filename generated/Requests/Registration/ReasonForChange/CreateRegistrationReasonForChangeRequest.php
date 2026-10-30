<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\ReasonForChange;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Registration\AttendanceCodeReasonForChangeForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Create a Reason for Change record against a Registration Code change.
 *
 * POST /api/registration/register/{periodId}/students/{schoolId}/reasonforchanges
 */
#[Beta]
class CreateRegistrationReasonForChangeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Registration\AttendanceCodeReasonForChangeForCreate|array<string, mixed>  $reasonForChange
     */
    public function __construct(
        protected int $periodId,
        protected string $schoolId,
        protected AttendanceCodeReasonForChangeForCreate|array $reasonForChange,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/register/'.rawurlencode((string) $this->periodId).'/students/'.rawurlencode((string) $this->schoolId).'/reasonforchanges';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->reasonForChange instanceof Data ? $this->reasonForChange->toArray() : $this->reasonForChange;
    }
}
