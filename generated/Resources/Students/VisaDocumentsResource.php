<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Data\Students\StudentVisaDocument;
use spkm\IsamsApi\Data\Students\StudentVisaDocumentForCreate;
use spkm\IsamsApi\Requests\Students\VisaDocuments\CreateStudentVisaDocumentRequest;
use spkm\IsamsApi\Requests\Students\VisaDocuments\DeleteStudentVisaDocumentRequest;
use spkm\IsamsApi\Requests\Students\VisaDocuments\DownloadStudentVisaDocumentRequest;
use spkm\IsamsApi\Requests\Students\VisaDocuments\GetStudentVisaDocumentRequest;
use spkm\IsamsApi\Requests\Students\VisaDocuments\GetStudentVisaDocumentsRequest;
use spkm\IsamsApi\Requests\Students\VisaDocuments\PatchStudentVisaDocumentRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class VisaDocumentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\StudentVisaDocument>
     * @see \spkm\IsamsApi\Requests\Students\VisaDocuments\GetStudentVisaDocumentsRequest
     */
    public function all(string $schoolId, int $visaId): Collection
    {
        return $this->fetch(new GetStudentVisaDocumentsRequest(schoolId: $schoolId, visaId: $visaId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaDocumentForCreate|array<string, mixed>  $data
     * @see \spkm\IsamsApi\Requests\Students\VisaDocuments\CreateStudentVisaDocumentRequest
     */
    public function create(
        string $schoolId,
        int $visaId,
        MultipartValue $binary,
        StudentVisaDocumentForCreate|array $data,
    ): void {
        $this->fetch(new CreateStudentVisaDocumentRequest(schoolId: $schoolId, visaId: $visaId, binary: $binary, data: $data));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\VisaDocuments\DeleteStudentVisaDocumentRequest
     */
    public function delete(string $schoolId, int $visaId, int $documentId): void
    {
        $this->fetch(new DeleteStudentVisaDocumentRequest(schoolId: $schoolId, visaId: $visaId, documentId: $documentId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\VisaDocuments\DownloadStudentVisaDocumentRequest
     */
    public function download(string $schoolId, int $visaId, int $documentId): File
    {
        return $this->fetch(new DownloadStudentVisaDocumentRequest(schoolId: $schoolId, visaId: $visaId, documentId: $documentId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\VisaDocuments\GetStudentVisaDocumentRequest
     */
    public function get(string $schoolId, int $visaId, int $documentId): StudentVisaDocument
    {
        return $this->fetch(new GetStudentVisaDocumentRequest(schoolId: $schoolId, visaId: $visaId, documentId: $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Students\VisaDocuments\PatchStudentVisaDocumentRequest
     */
    public function patch(string $schoolId, int $visaId, int $documentId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentVisaDocumentRequest(schoolId: $schoolId, visaId: $visaId, documentId: $documentId, patch: $patch));
    }
}
