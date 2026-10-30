<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\DownloadPortalDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetDocumentFolderRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetDocumentsDownloadHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetDocumentsInFolderRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetLatestDocumentsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\SearchDocumentsRequest;

class DocumentResource extends BaseResource
{
    public function download(int $documentId): Response
    {
        return $this->connector->send(new DownloadPortalDocumentRequest($documentId));
    }

    public function getDownloadHistory(): Response
    {
        return $this->connector->send(new GetDocumentsDownloadHistoryRequest());
    }

    public function getFolder(int $selectedFolder): Response
    {
        return $this->connector->send(new GetDocumentFolderRequest($selectedFolder));
    }

    public function getInFolder(int $selectedFolder): Response
    {
        return $this->connector->send(new GetDocumentsInFolderRequest($selectedFolder));
    }

    public function getLatest(): Response
    {
        return $this->connector->send(new GetLatestDocumentsRequest());
    }

    public function search(string $searchTerm): Response
    {
        return $this->connector->send(new SearchDocumentsRequest($searchTerm));
    }
}
