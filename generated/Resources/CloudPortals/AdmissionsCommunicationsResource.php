<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailsBySchoolIdsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailsForUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationLetterByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationLettersBySchoolIdsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationSMSByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationSMSsBySchoolIdsRequest;

class AdmissionsCommunicationsResource extends BaseResource
{
    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getCommunicationEmailById(int $id, ?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationEmailByIdRequest($id, $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getCommunicationEmailsBySchoolIds(?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationEmailsBySchoolIdsRequest($schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getCommunicationEmailsForUser(
        ?string $divisionIdsCommaSeparated = null,
        ?int $pupilStatus = null,
        ?array $schoolIds = null,
    ): Response {
        return $this->connector->send(new GetCommunicationEmailsForUserRequest($divisionIdsCommaSeparated, $pupilStatus, $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getCommunicationLetterById(int $id, ?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationLetterByIdRequest($id, $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getCommunicationLettersBySchoolIds(?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationLettersBySchoolIdsRequest($schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getCommunicationSMSById(int $id, ?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationSMSByIdRequest($id, $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getCommunicationSMSsBySchoolIds(?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationSMSsBySchoolIdsRequest($schoolIds));
    }
}
