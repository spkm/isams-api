<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\StudentRegisters\RegisterAssociationForCreate;
use spkm\IsamsApi\Requests\StudentRegisters\RegisterAssociation\GetRegisterAssociationRequest;
use spkm\IsamsApi\Requests\StudentRegisters\RegisterAssociation\GetRegisterAssociationsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\RegisterAssociation\UpdateRegisterAssociationRequest;

class RegisterAssociationResource extends BaseResource
{
    public function getRegisterAssociation(int $registerId, string $schoolId): Response
    {
        return $this->connector->send(new GetRegisterAssociationRequest($registerId, $schoolId));
    }

    public function getRegisterAssociations(
        int $registerId,
        ?string $systemStatus = null,
        ?int $page = null,
        ?int $pageSize = null,
    ): Response {
        return $this->connector->send(new GetRegisterAssociationsRequest($registerId, $systemStatus, $page, $pageSize));
    }

    /**
     * @param  \spkm\IsamsApi\Data\StudentRegisters\RegisterAssociationForCreate|array<string, mixed>  $association
     */
    public function updateRegisterAssociation(
        int $registerId,
        string $schoolId,
        RegisterAssociationForCreate|array $association,
    ): Response {
        return $this->connector->send(new UpdateRegisterAssociationRequest($registerId, $schoolId, $association));
    }
}
