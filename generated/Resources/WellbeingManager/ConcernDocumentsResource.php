<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernDocumentForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\CreateConcernDocumentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\DeleteConcernDocumentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\DownloadConcernDocumentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\GetConcernDocumentsRequest;

class ConcernDocumentsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernDocumentForCreate|array<string, mixed>  $data
     */
    public function createConcernDocument(
        string $schoolId,
        int $concernId,
        MultipartValue $document,
        ConcernDocumentForCreate|array $data,
    ): Response {
        return $this->connector->send(new CreateConcernDocumentRequest($schoolId, $concernId, $document, $data));
    }

    public function deleteConcernDocument(int $id, int $concernId, string $schoolId): Response
    {
        return $this->connector->send(new DeleteConcernDocumentRequest($id, $concernId, $schoolId));
    }

    public function downloadConcernDocument(string $schoolId, int $concernId, int $documentId): Response
    {
        return $this->connector->send(new DownloadConcernDocumentRequest($schoolId, $concernId, $documentId));
    }

    public function getConcernDocuments(string $schoolId, int $concernId): Response
    {
        return $this->connector->send(new GetConcernDocumentsRequest($schoolId, $concernId));
    }
}
