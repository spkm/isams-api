<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernDocument;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all documents associated with a concern.
 *
 * GET /api/wellbeing/students/{schoolId}/concerns/{concernId}/documents
 */
class GetConcernDocumentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConcernDocument::class;
    public string $resultKey = 'documents';

    public function __construct(
        protected string $schoolId,
        protected int $concernId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/documents';
    }
}
