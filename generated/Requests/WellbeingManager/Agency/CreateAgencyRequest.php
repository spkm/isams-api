<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Agency;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\AgencyForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an agency.
 *
 * POST /api/wellbeing/agency
 */
class CreateAgencyRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\AgencyForCreate|array<string, mixed>  $agency
     */
    public function __construct(
        protected AgencyForCreate|array $agency,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/agency';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->agency instanceof Data ? $this->agency->toArray() : $this->agency;
    }
}
