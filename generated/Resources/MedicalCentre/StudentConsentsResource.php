<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\ConsentForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\ArchiveStudentConsentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\CreateStudentConsentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\DeleteStudentConsentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\GetStudentConsentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\GetStudentConsentsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\PatchStudentConsentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\RestoreStudentConsentRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentConsentsResource extends BaseResource
{
    public function archiveStudentConsent(string $schoolId, string $consentId): Response
    {
        return $this->connector->send(new ArchiveStudentConsentRequest($schoolId, $consentId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\ConsentForCreate|array<string, mixed>  $consent
     */
    public function createStudentConsent(string $schoolId, ConsentForCreate|array $consent): Response
    {
        return $this->connector->send(new CreateStudentConsentRequest($schoolId, $consent));
    }

    public function deleteStudentConsent(string $schoolId, string $consentId): Response
    {
        return $this->connector->send(new DeleteStudentConsentRequest($schoolId, $consentId));
    }

    public function getStudentConsent(string $schoolId, string $consentId): Response
    {
        return $this->connector->send(new GetStudentConsentRequest($schoolId, $consentId));
    }

    public function getStudentConsents(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentConsentsRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentConsent(string $schoolId, string $consentId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentConsentRequest($schoolId, $consentId, $patch));
    }

    public function restoreStudentConsent(string $schoolId, string $consentId): Response
    {
        return $this->connector->send(new RestoreStudentConsentRequest($schoolId, $consentId));
    }
}
