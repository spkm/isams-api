<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Surgeries;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\SurgeryForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a surgery.
 *
 * POST /api/medical/surgeries
 */
class CreateMedicalSurgeryRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\SurgeryForCreate|array<string, mixed>  $surgery
     */
    public function __construct(
        protected SurgeryForCreate|array $surgery,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/surgeries';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->surgery instanceof Data ? $this->surgery->toArray() : $this->surgery;
    }
}
