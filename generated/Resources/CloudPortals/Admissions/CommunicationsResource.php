<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailsBySchoolIdsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationEmailsForUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationLetterByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationLettersBySchoolIdsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationSMSByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications\GetCommunicationSMSsBySchoolIdsRequest;

class CommunicationsResource extends BaseResource
{
    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getEmail(int $id, ?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationEmailByIdRequest($id, $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getEmailsBySchoolIds(?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationEmailsBySchoolIdsRequest($schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getEmailsForUser(
        ?string $divisionIdsCommaSeparated = null,
        ?int $pupilStatus = null,
        ?array $schoolIds = null,
    ): Response {
        return $this->connector->send(new GetCommunicationEmailsForUserRequest($divisionIdsCommaSeparated, $pupilStatus, $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getLetter(int $id, ?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationLetterByIdRequest($id, $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getLettersBySchoolIds(?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationLettersBySchoolIdsRequest($schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getSMS(int $id, ?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationSMSByIdRequest($id, $schoolIds));
    }

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function getSMSsBySchoolIds(?array $schoolIds = null): Response
    {
        return $this->connector->send(new GetCommunicationSMSsBySchoolIdsRequest($schoolIds));
    }
}
