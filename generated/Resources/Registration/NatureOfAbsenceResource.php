<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Registration\NatureOfAbsence\CreateRegistrationNatureOfAbsenceRequest;
use spkm\IsamsApi\Requests\Registration\NatureOfAbsence\DeleteRegistrationNatureOfAbsenceRequest;
use spkm\IsamsApi\Requests\Registration\NatureOfAbsence\GetRegistrationNatureOfAbsencesRequest;
use spkm\IsamsApi\Requests\Registration\NatureOfAbsence\PatchRegistrationNatureOfAbsenceRequest;
use spkm\IsamsApi\Support\JsonPatch;

class NatureOfAbsenceResource extends BaseResource
{
    public function createRegistrationNatureOfAbsence(int $registrationPupilId, string $reason): Response
    {
        return $this->connector->send(new CreateRegistrationNatureOfAbsenceRequest($registrationPupilId, $reason));
    }

    public function deleteRegistrationNatureOfAbsence(int $registrationPupilId): Response
    {
        return $this->connector->send(new DeleteRegistrationNatureOfAbsenceRequest($registrationPupilId));
    }

    public function getRegistrationNatureOfAbsences(
        DateTimeInterface|string|null $registrationFrom = null,
        DateTimeInterface|string|null $registrationTo = null,
        ?string $code = null,
        ?bool $onlyEmptyNatureOfAbsence = null,
        ?string $orderBy = null,
        ?int $page = null,
        ?int $pageSize = null,
    ): Response {
        return $this->connector->send(new GetRegistrationNatureOfAbsencesRequest($registrationFrom, $registrationTo, $code, $onlyEmptyNatureOfAbsence, $orderBy, $page, $pageSize));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchRegistrationNatureOfAbsence(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchRegistrationNatureOfAbsenceRequest($id, $patch));
    }
}
