<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Students\StudentDocumentForCreate;
use spkm\IsamsApi\Requests\Students\Document\CreateStudentDocumentRequest;
use spkm\IsamsApi\Requests\Students\Document\GetStudentDocumentsRequest;

class DocumentResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentDocumentForCreate|array<string, mixed>|null  $data
     */
    public function createStudentDocument(
        string $schoolId,
        MultipartValue $binary,
        StudentDocumentForCreate|array|null $data = null,
    ): Response {
        return $this->connector->send(new CreateStudentDocumentRequest($schoolId, $binary, $data));
    }

    public function getStudentDocuments(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentDocumentsRequest($schoolId));
    }
}
