<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalDocument;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\Document;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Searches documents by search term
 *
 * GET /api/portals/documents/search
 */
class SearchPortalDocumentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Document::class;
    public string $resultKey = 'documents';

    public function __construct(
        protected string $searchTerm,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/documents/search';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return [
            'searchTerm' => $this->searchTerm,
        ];
    }
}
