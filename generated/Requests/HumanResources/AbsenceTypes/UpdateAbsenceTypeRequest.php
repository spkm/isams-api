<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\AbsenceTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\AbsenceTypeForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates an absence type.
 *
 * PUT /api/humanresources/absencetypes/{id}
 */
class UpdateAbsenceTypeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceTypeForUpdate|array<string, mixed>  $absenceType
     */
    public function __construct(
        protected int $id,
        protected AbsenceTypeForUpdate|array $absenceType,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/absencetypes/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->absenceType instanceof Data ? $this->absenceType->toArray() : $this->absenceType;
    }
}
