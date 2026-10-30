<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Data\Students\StudentPassportDocument;
use spkm\IsamsApi\Data\Students\StudentPassportDocumentForCreate;
use spkm\IsamsApi\Requests\Students\PassportDocuments\CreateStudentPassportDocumentRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\DeleteStudentPassportDocumentRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\DownloadStudentPassportDocumentRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\GetStudentPassportDocumentRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\GetStudentPassportDocumentsRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\PatchStudentPassportDocumentRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class PassportDocumentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\StudentPassportDocument>
     * @see \spkm\IsamsApi\Requests\Students\PassportDocuments\GetStudentPassportDocumentsRequest
     */
    public function all(string $schoolId, int $passportId): Collection
    {
        return $this->fetch(new GetStudentPassportDocumentsRequest(schoolId: $schoolId, passportId: $passportId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportDocumentForCreate|array<string, mixed>  $data
     * @see \spkm\IsamsApi\Requests\Students\PassportDocuments\CreateStudentPassportDocumentRequest
     */
    public function create(
        string $schoolId,
        int $passportId,
        MultipartValue $binary,
        StudentPassportDocumentForCreate|array $data,
    ): void {
        $this->fetch(new CreateStudentPassportDocumentRequest(schoolId: $schoolId, passportId: $passportId, binary: $binary, data: $data));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\PassportDocuments\DeleteStudentPassportDocumentRequest
     */
    public function delete(string $schoolId, int $passportId, int $documentId): void
    {
        $this->fetch(new DeleteStudentPassportDocumentRequest(schoolId: $schoolId, passportId: $passportId, documentId: $documentId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\PassportDocuments\DownloadStudentPassportDocumentRequest
     */
    public function download(string $schoolId, int $passportId, int $documentId): File
    {
        return $this->fetch(new DownloadStudentPassportDocumentRequest(schoolId: $schoolId, passportId: $passportId, documentId: $documentId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\PassportDocuments\GetStudentPassportDocumentRequest
     */
    public function get(string $schoolId, int $passportId, int $documentId): StudentPassportDocument
    {
        return $this->fetch(new GetStudentPassportDocumentRequest(schoolId: $schoolId, passportId: $passportId, documentId: $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Students\PassportDocuments\PatchStudentPassportDocumentRequest
     */
    public function patch(string $schoolId, int $passportId, int $documentId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentPassportDocumentRequest(schoolId: $schoolId, passportId: $passportId, documentId: $documentId, patch: $patch));
    }
}
