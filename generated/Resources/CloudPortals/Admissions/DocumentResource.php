<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\DownloadPortalDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetDocumentFolderRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetDocumentsDownloadHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetDocumentsInFolderRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetLatestDocumentsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\SearchDocumentsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DocumentResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\DownloadPortalDocumentRequest
     */
    public function download(int $documentId): File
    {
        return $this->fetch(new DownloadPortalDocumentRequest(documentId: $documentId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\DocumentDownloadHistory>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetDocumentsDownloadHistoryRequest
     */
    public function getDownloadHistory(): Collection
    {
        return $this->fetch(new GetDocumentsDownloadHistoryRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\Folder>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetDocumentFolderRequest
     */
    public function getFolder(int $selectedFolder): Collection
    {
        return $this->fetch(new GetDocumentFolderRequest(selectedFolder: $selectedFolder));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\Folder>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetDocumentsInFolderRequest
     */
    public function getInFolder(int $selectedFolder): Collection
    {
        return $this->fetch(new GetDocumentsInFolderRequest(selectedFolder: $selectedFolder));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\Document>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\GetLatestDocumentsRequest
     */
    public function getLatest(): Collection
    {
        return $this->fetch(new GetLatestDocumentsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\Document>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\SearchDocumentsRequest
     */
    public function search(string $searchTerm): Collection
    {
        return $this->fetch(new SearchDocumentsRequest(searchTerm: $searchTerm));
    }
}
