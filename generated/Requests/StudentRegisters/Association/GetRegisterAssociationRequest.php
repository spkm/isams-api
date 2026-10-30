<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\Association;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\StudentRegisters\RegisterAssociation;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the association of a student to a register.
 *
 * GET /api/registers/{registerId}/students/{schoolId}/association
 */
class GetRegisterAssociationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = RegisterAssociation::class;

    public function __construct(
        protected int $registerId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/association';
    }
}
