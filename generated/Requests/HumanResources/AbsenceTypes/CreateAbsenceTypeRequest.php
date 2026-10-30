<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\AbsenceTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\AbsenceTypeForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an absence type.
 *
 * POST /api/humanresources/absencetypes
 */
class CreateAbsenceTypeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceTypeForCreate|array<string, mixed>  $absenceType
     */
    public function __construct(
        protected AbsenceTypeForCreate|array $absenceType,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/absencetypes';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->absenceType instanceof Data ? $this->absenceType->toArray() : $this->absenceType;
    }
}
