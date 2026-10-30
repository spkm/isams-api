<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaDocument;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaDocumentForCreate;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\CreateApplicantVisaDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\DeleteApplicantVisaDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\DownloadApplicantVisaDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\GetApplicantVisaDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\GetApplicantVisaDocumentsRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\PatchApplicantVisaDocumentRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class VisaDocumentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\ApplicantVisaDocument>
     * @see \spkm\IsamsApi\Requests\Admissions\VisaDocuments\GetApplicantVisaDocumentsRequest
     */
    public function all(string $schoolId, int $visaId): Collection
    {
        return $this->fetch(new GetApplicantVisaDocumentsRequest(schoolId: $schoolId, visaId: $visaId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaDocumentForCreate|array<string, mixed>  $data
     * @see \spkm\IsamsApi\Requests\Admissions\VisaDocuments\CreateApplicantVisaDocumentRequest
     */
    public function create(
        string $schoolId,
        int $visaId,
        MultipartValue $binary,
        ApplicantVisaDocumentForCreate|array $data,
    ): bool {
        $this->fetch(new CreateApplicantVisaDocumentRequest(schoolId: $schoolId, visaId: $visaId, binary: $binary, data: $data));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\VisaDocuments\DeleteApplicantVisaDocumentRequest
     */
    public function delete(string $schoolId, int $visaId, int $documentId): bool
    {
        $this->fetch(new DeleteApplicantVisaDocumentRequest(schoolId: $schoolId, visaId: $visaId, documentId: $documentId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\VisaDocuments\DownloadApplicantVisaDocumentRequest
     */
    public function download(string $schoolId, int $visaId, int $documentId): File
    {
        return $this->fetch(new DownloadApplicantVisaDocumentRequest(schoolId: $schoolId, visaId: $visaId, documentId: $documentId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\VisaDocuments\GetApplicantVisaDocumentRequest
     */
    public function get(string $schoolId, int $visaId, int $documentId): ApplicantVisaDocument
    {
        return $this->fetch(new GetApplicantVisaDocumentRequest(schoolId: $schoolId, visaId: $visaId, documentId: $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Admissions\VisaDocuments\PatchApplicantVisaDocumentRequest
     */
    public function patch(string $schoolId, int $visaId, int $documentId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchApplicantVisaDocumentRequest(schoolId: $schoolId, visaId: $visaId, documentId: $documentId, patch: $patch));

        return true;
    }
}
