<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Registration\NatureOfAbsence;
use spkm\IsamsApi\Requests\Registration\NatureOfAbsence\CreateRegistrationNatureOfAbsenceRequest;
use spkm\IsamsApi\Requests\Registration\NatureOfAbsence\DeleteRegistrationNatureOfAbsenceRequest;
use spkm\IsamsApi\Requests\Registration\NatureOfAbsence\GetRegistrationNatureOfAbsencesRequest;
use spkm\IsamsApi\Requests\Registration\NatureOfAbsence\PatchRegistrationNatureOfAbsenceRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class NatureOfAbsenceResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Registration\NatureOfAbsence>
     * @see \spkm\IsamsApi\Requests\Registration\NatureOfAbsence\GetRegistrationNatureOfAbsencesRequest
     */
    public function all(
        DateTimeInterface|string|null $registrationFrom = null,
        DateTimeInterface|string|null $registrationTo = null,
        ?string $code = null,
        ?bool $onlyEmptyNatureOfAbsence = null,
        ?string $orderBy = null,
    ): LazyCollection {
        return $this->each(new GetRegistrationNatureOfAbsencesRequest(registrationFrom: $registrationFrom, registrationTo: $registrationTo, code: $code, onlyEmptyNatureOfAbsence: $onlyEmptyNatureOfAbsence, orderBy: $orderBy), NatureOfAbsence::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\Registration\NatureOfAbsence\CreateRegistrationNatureOfAbsenceRequest
     */
    public function create(int $registrationPupilId, string $reason): Created
    {
        return $this->fetch(new CreateRegistrationNatureOfAbsenceRequest(registrationPupilId: $registrationPupilId, reason: $reason));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Registration\NatureOfAbsence\DeleteRegistrationNatureOfAbsenceRequest
     */
    public function delete(int $registrationPupilId): void
    {
        $this->fetch(new DeleteRegistrationNatureOfAbsenceRequest(registrationPupilId: $registrationPupilId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Registration\NatureOfAbsence\PatchRegistrationNatureOfAbsenceRequest
     */
    public function patch(int $id, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchRegistrationNatureOfAbsenceRequest(id: $id, patch: $patch));
    }
}
