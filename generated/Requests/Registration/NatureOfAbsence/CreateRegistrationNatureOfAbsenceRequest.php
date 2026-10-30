<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\NatureOfAbsence;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasStringBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Add a nature of absence for a registration pupil.
 *
 * POST /api/registration/natureofabsence/{registrationPupilId}
 */
#[Beta]
class CreateRegistrationNatureOfAbsenceRequest extends IsamsRequest implements HasBody
{
    use HasStringBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected int $registrationPupilId,
        protected string $reason,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/natureofabsence/'.rawurlencode((string) $this->registrationPupilId);
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return ['Content-Type' => 'application/json'];
    }

    protected function defaultBody(): string
    {
        return (string) json_encode($this->reason);
    }
}
