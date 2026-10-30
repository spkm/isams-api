<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Students\StudentVisaDocumentForCreate;
use spkm\IsamsApi\Requests\Students\VisaDocuments\CreateStudentVisaDocumentRequest;
use spkm\IsamsApi\Requests\Students\VisaDocuments\DeleteStudentVisaDocumentRequest;
use spkm\IsamsApi\Requests\Students\VisaDocuments\DownloadStudentVisaDocumentRequest;
use spkm\IsamsApi\Requests\Students\VisaDocuments\GetStudentVisaDocumentRequest;
use spkm\IsamsApi\Requests\Students\VisaDocuments\GetStudentVisaDocumentsRequest;
use spkm\IsamsApi\Requests\Students\VisaDocuments\PatchStudentVisaDocumentRequest;
use spkm\IsamsApi\Support\JsonPatch;

class VisaDocumentsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaDocumentForCreate|array<string, mixed>  $data
     */
    public function createStudentVisaDocument(
        string $schoolId,
        int $visaId,
        MultipartValue $binary,
        StudentVisaDocumentForCreate|array $data,
    ): Response {
        return $this->connector->send(new CreateStudentVisaDocumentRequest($schoolId, $visaId, $binary, $data));
    }

    public function deleteStudentVisaDocument(string $schoolId, int $visaId, int $documentId): Response
    {
        return $this->connector->send(new DeleteStudentVisaDocumentRequest($schoolId, $visaId, $documentId));
    }

    public function downloadStudentVisaDocument(string $schoolId, int $visaId, int $documentId): Response
    {
        return $this->connector->send(new DownloadStudentVisaDocumentRequest($schoolId, $visaId, $documentId));
    }

    public function getStudentVisaDocument(string $schoolId, int $visaId, int $documentId): Response
    {
        return $this->connector->send(new GetStudentVisaDocumentRequest($schoolId, $visaId, $documentId));
    }

    public function getStudentVisaDocuments(string $schoolId, int $visaId): Response
    {
        return $this->connector->send(new GetStudentVisaDocumentsRequest($schoolId, $visaId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentVisaDocument(
        string $schoolId,
        int $visaId,
        int $documentId,
        JsonPatch|array $patch,
    ): Response {
        return $this->connector->send(new PatchStudentVisaDocumentRequest($schoolId, $visaId, $documentId, $patch));
    }
}
