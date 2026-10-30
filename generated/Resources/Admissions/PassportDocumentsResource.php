<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportDocument;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportDocumentForCreate;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\CreateApplicantPassportDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\DeleteApplicantPassportDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\DownloadApplicantPassportDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\GetApplicantPassportDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\GetApplicantPassportDocumentsRequest;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\PatchApplicantPassportDocumentRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class PassportDocumentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\ApplicantPassportDocument>
     * @see \spkm\IsamsApi\Requests\Admissions\PassportDocuments\GetApplicantPassportDocumentsRequest
     */
    public function all(string $schoolId, int $passportId): Collection
    {
        return $this->fetch(new GetApplicantPassportDocumentsRequest(schoolId: $schoolId, passportId: $passportId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportDocumentForCreate|array<string, mixed>  $data
     * @see \spkm\IsamsApi\Requests\Admissions\PassportDocuments\CreateApplicantPassportDocumentRequest
     */
    public function create(
        string $schoolId,
        int $passportId,
        MultipartValue $binary,
        ApplicantPassportDocumentForCreate|array $data,
    ): bool {
        $this->fetch(new CreateApplicantPassportDocumentRequest(schoolId: $schoolId, passportId: $passportId, binary: $binary, data: $data));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\PassportDocuments\DeleteApplicantPassportDocumentRequest
     */
    public function delete(string $schoolId, int $passportId, int $documentId): bool
    {
        $this->fetch(new DeleteApplicantPassportDocumentRequest(schoolId: $schoolId, passportId: $passportId, documentId: $documentId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\PassportDocuments\DownloadApplicantPassportDocumentRequest
     */
    public function download(string $schoolId, int $passportId, int $documentId): File
    {
        return $this->fetch(new DownloadApplicantPassportDocumentRequest(schoolId: $schoolId, passportId: $passportId, documentId: $documentId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\PassportDocuments\GetApplicantPassportDocumentRequest
     */
    public function get(string $schoolId, int $passportId, int $documentId): ApplicantPassportDocument
    {
        return $this->fetch(new GetApplicantPassportDocumentRequest(schoolId: $schoolId, passportId: $passportId, documentId: $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Admissions\PassportDocuments\PatchApplicantPassportDocumentRequest
     */
    public function patch(string $schoolId, int $passportId, int $documentId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchApplicantPassportDocumentRequest(schoolId: $schoolId, passportId: $passportId, documentId: $documentId, patch: $patch));

        return true;
    }
}
