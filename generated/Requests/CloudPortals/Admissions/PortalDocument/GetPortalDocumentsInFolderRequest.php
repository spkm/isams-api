<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalDocument;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\Folder;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get list of documents in folder
 *
 * GET /api/portals/documents/folders/{selectedFolder}/documents
 */
class GetPortalDocumentsInFolderRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Folder::class;
    public string $resultKey = 'folders';

    public function __construct(
        protected int $selectedFolder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/documents/folders/'.rawurlencode((string) $this->selectedFolder).'/documents';
    }
}
