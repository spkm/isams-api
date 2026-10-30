<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\Consent;
use spkm\IsamsApi\Data\MedicalCentre\ConsentForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\ArchiveStudentConsentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\CreateStudentConsentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\DeleteStudentConsentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\GetStudentConsentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\GetStudentConsentsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\PatchStudentConsentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\RestoreStudentConsentRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentConsentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Consent>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\GetStudentConsentsRequest
     */
    public function all(string $schoolId): Collection
    {
        return $this->fetch(new GetStudentConsentsRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\ArchiveStudentConsentRequest
     */
    public function archive(string $schoolId, string $consentId): Created
    {
        return $this->fetch(new ArchiveStudentConsentRequest(schoolId: $schoolId, consentId: $consentId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\ConsentForCreate|array<string, mixed>  $consent
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\CreateStudentConsentRequest
     */
    public function create(string $schoolId, ConsentForCreate|array $consent): Created
    {
        return $this->fetch(new CreateStudentConsentRequest(schoolId: $schoolId, consent: $consent));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\DeleteStudentConsentRequest
     */
    public function delete(string $schoolId, string $consentId): bool
    {
        $this->fetch(new DeleteStudentConsentRequest(schoolId: $schoolId, consentId: $consentId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\GetStudentConsentRequest
     */
    public function get(string $schoolId, string $consentId): Consent
    {
        return $this->fetch(new GetStudentConsentRequest(schoolId: $schoolId, consentId: $consentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\PatchStudentConsentRequest
     */
    public function patch(string $schoolId, string $consentId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchStudentConsentRequest(schoolId: $schoolId, consentId: $consentId, patch: $patch));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConsents\RestoreStudentConsentRequest
     */
    public function restore(string $schoolId, string $consentId): Created
    {
        return $this->fetch(new RestoreStudentConsentRequest(schoolId: $schoolId, consentId: $consentId));
    }
}
