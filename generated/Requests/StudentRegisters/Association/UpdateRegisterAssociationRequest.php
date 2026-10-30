<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\Association;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\StudentRegisters\RegisterAssociationForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates the association of a student to a register.
 *
 * PUT /api/registers/{registerId}/students/{schoolId}/association
 */
class UpdateRegisterAssociationRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\StudentRegisters\RegisterAssociationForCreate|array<string, mixed>  $registerAssociation
     */
    public function __construct(
        protected int $registerId,
        protected string $schoolId,
        protected RegisterAssociationForCreate|array $registerAssociation,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/association';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->registerAssociation instanceof Data ? $this->registerAssociation->toArray() : $this->registerAssociation;
    }
}
