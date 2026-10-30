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
    public function all(string $schoolId, int $concernId): Response
    {
        return $this->connector->send(new GetConcernDocumentsRequest($schoolId, $concernId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernDocumentForCreate|array<string, mixed>  $data
     */
    public function create(
        string $schoolId,
        int $concernId,
        MultipartValue $document,
        ConcernDocumentForCreate|array $data,
    ): Response {
        return $this->connector->send(new CreateConcernDocumentRequest($schoolId, $concernId, $document, $data));
    }

    public function delete(string $schoolId, int $concernId, int $id): Response
    {
        return $this->connector->send(new DeleteConcernDocumentRequest($schoolId, $concernId, $id));
    }

    public function download(string $schoolId, int $concernId, int $documentId): Response
    {
        return $this->connector->send(new DownloadConcernDocumentRequest($schoolId, $concernId, $documentId));
    }
}
