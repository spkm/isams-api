<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Data\WellbeingManager\ConcernDocumentForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\CreateConcernDocumentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\DeleteConcernDocumentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\DownloadConcernDocumentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\GetConcernDocumentsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ConcernDocumentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ConcernDocument>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\GetConcernDocumentsRequest
     */
    public function all(string $schoolId, int $concernId): Collection
    {
        return $this->fetch(new GetConcernDocumentsRequest(schoolId: $schoolId, concernId: $concernId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernDocumentForCreate|array<string, mixed>  $data
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\CreateConcernDocumentRequest
     */
    public function create(
        string $schoolId,
        int $concernId,
        MultipartValue $document,
        ConcernDocumentForCreate|array $data,
    ): Created {
        return $this->fetch(new CreateConcernDocumentRequest(schoolId: $schoolId, concernId: $concernId, document: $document, data: $data));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\DeleteConcernDocumentRequest
     */
    public function delete(string $schoolId, int $concernId, int $id): void
    {
        $this->fetch(new DeleteConcernDocumentRequest(schoolId: $schoolId, concernId: $concernId, id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\DownloadConcernDocumentRequest
     */
    public function download(string $schoolId, int $concernId, int $documentId): File
    {
        return $this->fetch(new DownloadConcernDocumentRequest(schoolId: $schoolId, concernId: $concernId, documentId: $documentId));
    }
}
