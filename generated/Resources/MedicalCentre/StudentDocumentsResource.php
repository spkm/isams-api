<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Data\MedicalCentre\Document;
use spkm\IsamsApi\Data\MedicalCentre\DocumentForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\ArchiveStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\CreateStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\DeleteStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\DownloadStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\GetStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\GetStudentDocumentsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\PatchStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\RestoreStudentDocumentRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentDocumentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Document>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\GetStudentDocumentsRequest
     */
    public function all(string $schoolId, ?bool $includeArchive = null): Collection
    {
        return $this->fetch(new GetStudentDocumentsRequest(schoolId: $schoolId, includeArchive: $includeArchive));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\ArchiveStudentDocumentRequest
     */
    public function archive(string $schoolId, string $documentId): Created
    {
        return $this->fetch(new ArchiveStudentDocumentRequest(schoolId: $schoolId, documentId: $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\DocumentForCreate|array<string, mixed>  $data
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\CreateStudentDocumentRequest
     */
    public function create(string $schoolId, MultipartValue $binary, DocumentForCreate|array $data): Created
    {
        return $this->fetch(new CreateStudentDocumentRequest(schoolId: $schoolId, binary: $binary, data: $data));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\DeleteStudentDocumentRequest
     */
    public function delete(string $schoolId, string $documentId): bool
    {
        $this->fetch(new DeleteStudentDocumentRequest(schoolId: $schoolId, documentId: $documentId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\DownloadStudentDocumentRequest
     */
    public function download(string $schoolId, string $documentId): File
    {
        return $this->fetch(new DownloadStudentDocumentRequest(schoolId: $schoolId, documentId: $documentId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\GetStudentDocumentRequest
     */
    public function get(string $schoolId, string $documentId): Document
    {
        return $this->fetch(new GetStudentDocumentRequest(schoolId: $schoolId, documentId: $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\PatchStudentDocumentRequest
     */
    public function patch(string $schoolId, string $documentId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchStudentDocumentRequest(schoolId: $schoolId, documentId: $documentId, patch: $patch));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\RestoreStudentDocumentRequest
     */
    public function restore(string $schoolId, string $documentId): Created
    {
        return $this->fetch(new RestoreStudentDocumentRequest(schoolId: $schoolId, documentId: $documentId));
    }
}
