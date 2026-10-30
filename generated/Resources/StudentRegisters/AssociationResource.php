<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\StudentRegisters\RegisterAssociationForCreate;
use spkm\IsamsApi\Requests\StudentRegisters\Association\GetRegisterAssociationRequest;
use spkm\IsamsApi\Requests\StudentRegisters\Association\GetRegisterAssociationsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\Association\UpdateRegisterAssociationRequest;

class AssociationResource extends BaseResource
{
    public function all(
        int $registerId,
        ?string $systemStatus = null,
        ?int $page = null,
        ?int $pageSize = null,
    ): Response {
        return $this->connector->send(new GetRegisterAssociationsRequest($registerId, $systemStatus, $page, $pageSize));
    }

    public function get(int $registerId, string $schoolId): Response
    {
        return $this->connector->send(new GetRegisterAssociationRequest($registerId, $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\StudentRegisters\RegisterAssociationForCreate|array<string, mixed>  $registerAssociation
     */
    public function update(
        int $registerId,
        string $schoolId,
        RegisterAssociationForCreate|array $registerAssociation,
    ): Response {
        return $this->connector->send(new UpdateRegisterAssociationRequest($registerId, $schoolId, $registerAssociation));
    }
}
