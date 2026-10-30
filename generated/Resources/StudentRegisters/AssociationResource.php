<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\StudentRegisters\RegisterAssociation;
use spkm\IsamsApi\Data\StudentRegisters\RegisterAssociationForCreate;
use spkm\IsamsApi\Data\StudentRegisters\StudentRegisterAssociation;
use spkm\IsamsApi\Requests\StudentRegisters\Association\GetRegisterAssociationRequest;
use spkm\IsamsApi\Requests\StudentRegisters\Association\GetRegisterAssociationsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\Association\UpdateRegisterAssociationRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AssociationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\StudentRegisters\StudentRegisterAssociation>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\Association\GetRegisterAssociationsRequest
     */
    public function all(int $registerId, ?string $systemStatus = null): LazyCollection
    {
        return $this->each(new GetRegisterAssociationsRequest(registerId: $registerId, systemStatus: $systemStatus), StudentRegisterAssociation::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\StudentRegisters\Association\GetRegisterAssociationRequest
     */
    public function get(int $registerId, string $schoolId): RegisterAssociation
    {
        return $this->fetch(new GetRegisterAssociationRequest(registerId: $registerId, schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\StudentRegisters\RegisterAssociationForCreate|array<string, mixed>  $registerAssociation
     * @see \spkm\IsamsApi\Requests\StudentRegisters\Association\UpdateRegisterAssociationRequest
     */
    public function update(
        int $registerId,
        string $schoolId,
        RegisterAssociationForCreate|array $registerAssociation,
    ): void {
        $this->fetch(new UpdateRegisterAssociationRequest(registerId: $registerId, schoolId: $schoolId, registerAssociation: $registerAssociation));
    }
}
