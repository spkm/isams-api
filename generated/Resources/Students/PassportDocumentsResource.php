<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Students\StudentPassportDocumentForCreate;
use spkm\IsamsApi\Requests\Students\PassportDocuments\CreateStudentPassportDocumentRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\DeleteStudentPassportDocumentRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\DownloadStudentPassportDocumentRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\GetStudentPassportDocumentRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\GetStudentPassportDocumentsRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\PatchStudentPassportDocumentRequest;
use spkm\IsamsApi\Support\JsonPatch;

class PassportDocumentsResource extends BaseResource
{
    public function all(string $schoolId, int $passportId): Response
    {
        return $this->connector->send(new GetStudentPassportDocumentsRequest($schoolId, $passportId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportDocumentForCreate|array<string, mixed>  $data
     */
    public function create(
        string $schoolId,
        int $passportId,
        MultipartValue $binary,
        StudentPassportDocumentForCreate|array $data,
    ): Response {
        return $this->connector->send(new CreateStudentPassportDocumentRequest($schoolId, $passportId, $binary, $data));
    }

    public function delete(string $schoolId, int $passportId, int $documentId): Response
    {
        return $this->connector->send(new DeleteStudentPassportDocumentRequest($schoolId, $passportId, $documentId));
    }

    public function download(string $schoolId, int $passportId, int $documentId): Response
    {
        return $this->connector->send(new DownloadStudentPassportDocumentRequest($schoolId, $passportId, $documentId));
    }

    public function get(string $schoolId, int $passportId, int $documentId): Response
    {
        return $this->connector->send(new GetStudentPassportDocumentRequest($schoolId, $passportId, $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, int $passportId, int $documentId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentPassportDocumentRequest($schoolId, $passportId, $documentId, $patch));
    }
}
