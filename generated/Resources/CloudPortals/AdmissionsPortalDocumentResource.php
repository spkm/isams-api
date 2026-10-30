<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalDocument\DownloadPortalDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalDocument\GetPortalDocumentFolderRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalDocument\GetPortalDocumentLatestDocumentsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalDocument\GetPortalDocumentsDownloadHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalDocument\GetPortalDocumentsInFolderRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalDocument\SearchPortalDocumentsRequest;

class AdmissionsPortalDocumentResource extends BaseResource
{
    public function downloadPortalDocument(int $documentId): Response
    {
        return $this->connector->send(new DownloadPortalDocumentRequest($documentId));
    }

    public function getPortalDocumentFolder(int $selectedFolder): Response
    {
        return $this->connector->send(new GetPortalDocumentFolderRequest($selectedFolder));
    }

    public function getPortalDocumentLatestDocuments(): Response
    {
        return $this->connector->send(new GetPortalDocumentLatestDocumentsRequest());
    }

    public function getPortalDocumentsDownloadHistory(): Response
    {
        return $this->connector->send(new GetPortalDocumentsDownloadHistoryRequest());
    }

    public function getPortalDocumentsInFolder(int $selectedFolder): Response
    {
        return $this->connector->send(new GetPortalDocumentsInFolderRequest($selectedFolder));
    }

    public function searchPortalDocuments(string $searchTerm): Response
    {
        return $this->connector->send(new SearchPortalDocumentsRequest($searchTerm));
    }
}
