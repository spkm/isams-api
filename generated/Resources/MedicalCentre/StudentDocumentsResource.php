<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\DocumentForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\ArchiveStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\CreateStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\DeleteStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\DownloadStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\GetStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\GetStudentDocumentsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\PatchStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\RestoreStudentDocumentRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentDocumentsResource extends BaseResource
{
    public function archiveStudentDocument(string $schoolId, string $documentId): Response
    {
        return $this->connector->send(new ArchiveStudentDocumentRequest($schoolId, $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\DocumentForCreate|array<string, mixed>  $data
     */
    public function createStudentDocument(
        string $schoolId,
        MultipartValue $binary,
        DocumentForCreate|array $data,
    ): Response {
        return $this->connector->send(new CreateStudentDocumentRequest($schoolId, $binary, $data));
    }

    public function deleteStudentDocument(string $schoolId, string $documentId): Response
    {
        return $this->connector->send(new DeleteStudentDocumentRequest($schoolId, $documentId));
    }

    public function downloadStudentDocument(string $schoolId, string $documentId): Response
    {
        return $this->connector->send(new DownloadStudentDocumentRequest($schoolId, $documentId));
    }

    public function getStudentDocument(string $schoolId, string $documentId): Response
    {
        return $this->connector->send(new GetStudentDocumentRequest($schoolId, $documentId));
    }

    public function getStudentDocuments(string $schoolId, ?bool $includeArchive = null): Response
    {
        return $this->connector->send(new GetStudentDocumentsRequest($schoolId, $includeArchive));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentDocument(string $schoolId, string $documentId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentDocumentRequest($schoolId, $documentId, $patch));
    }

    public function restoreStudentDocument(string $schoolId, string $documentId): Response
    {
        return $this->connector->send(new RestoreStudentDocumentRequest($schoolId, $documentId));
    }
}
