<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Admissions\AdmissionsCommunicationMessage;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailsBySchoolIdsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailsForUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationLetterByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationLettersBySchoolIdsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationSMSByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationSMSsBySchoolIdsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CommunicationsResource extends IsamsResource
{
    /**
     * @param  array<mixed>|null  $schoolIds
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailByIdRequest
     */
    public function getEmail(int $id, ?array $schoolIds = null): AdmissionsCommunicationMessage
    {
        return $this->fetch(new GetCommunicationEmailByIdRequest(id: $id, schoolIds: $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\AdmissionsCommunicationMessage>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailsBySchoolIdsRequest
     */
    public function getEmailsBySchoolIds(?array $schoolIds = null): Collection
    {
        return $this->fetch(new GetCommunicationEmailsBySchoolIdsRequest(schoolIds: $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\AdmissionsCommunicationMessage>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailsForUserRequest
     */
    public function getEmailsForUser(
        ?string $divisionIdsCommaSeparated = null,
        ?int $pupilStatus = null,
        ?array $schoolIds = null,
    ): Collection {
        return $this->fetch(new GetCommunicationEmailsForUserRequest(divisionIdsCommaSeparated: $divisionIdsCommaSeparated, pupilStatus: $pupilStatus, schoolIds: $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationLetterByIdRequest
     */
    public function getLetter(int $id, ?array $schoolIds = null): AdmissionsCommunicationMessage
    {
        return $this->fetch(new GetCommunicationLetterByIdRequest(id: $id, schoolIds: $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\AdmissionsCommunicationMessage>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationLettersBySchoolIdsRequest
     */
    public function getLettersBySchoolIds(?array $schoolIds = null): Collection
    {
        return $this->fetch(new GetCommunicationLettersBySchoolIdsRequest(schoolIds: $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationSMSByIdRequest
     */
    public function getSMS(int $id, ?array $schoolIds = null): AdmissionsCommunicationMessage
    {
        return $this->fetch(new GetCommunicationSMSByIdRequest(id: $id, schoolIds: $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\AdmissionsCommunicationMessage>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationSMSsBySchoolIdsRequest
     */
    public function getSMSsBySchoolIds(?array $schoolIds = null): Collection
    {
        return $this->fetch(new GetCommunicationSMSsBySchoolIdsRequest(schoolIds: $schoolIds));
    }
}
