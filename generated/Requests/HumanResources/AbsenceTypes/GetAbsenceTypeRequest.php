<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\AbsenceTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\AbsenceType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an absence type.
 *
 * GET /api/humanresources/absencetypes/{id}
 */
class GetAbsenceTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = AbsenceType::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/absencetypes/'.rawurlencode((string) $this->id);
    }
}
