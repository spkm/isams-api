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
    public function all(string $schoolId, ?bool $includeArchive = null): Response
    {
        return $this->connector->send(new GetStudentDocumentsRequest($schoolId, $includeArchive));
    }

    public function archive(string $schoolId, string $documentId): Response
    {
        return $this->connector->send(new ArchiveStudentDocumentRequest($schoolId, $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\DocumentForCreate|array<string, mixed>  $data
     */
    public function create(string $schoolId, MultipartValue $binary, DocumentForCreate|array $data): Response
    {
        return $this->connector->send(new CreateStudentDocumentRequest($schoolId, $binary, $data));
    }

    public function delete(string $schoolId, string $documentId): Response
    {
        return $this->connector->send(new DeleteStudentDocumentRequest($schoolId, $documentId));
    }

    public function download(string $schoolId, string $documentId): Response
    {
        return $this->connector->send(new DownloadStudentDocumentRequest($schoolId, $documentId));
    }

    public function get(string $schoolId, string $documentId): Response
    {
        return $this->connector->send(new GetStudentDocumentRequest($schoolId, $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, string $documentId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentDocumentRequest($schoolId, $documentId, $patch));
    }

    public function restore(string $schoolId, string $documentId): Response
    {
        return $this->connector->send(new RestoreStudentDocumentRequest($schoolId, $documentId));
    }
}
