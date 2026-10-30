<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a concern document.
 *
 * DELETE /api/wellbeing/students/{schoolId}/concerns/{concernId}/documents/{id}
 */
class DeleteConcernDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
        protected int $concernId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/documents/'.rawurlencode((string) $this->id);
    }
}
