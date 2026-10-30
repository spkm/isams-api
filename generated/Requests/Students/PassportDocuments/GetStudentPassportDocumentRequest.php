<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\PassportDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Students\StudentPassportDocument;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a single document for a student passport by document id.
 *
 * GET /api/students/{schoolId}/passport/{passportId}/documents/{documentId}
 */
#[Beta]
class GetStudentPassportDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = StudentPassportDocument::class;

    public function __construct(
        protected string $schoolId,
        protected int $passportId,
        protected int $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/passport/'.rawurlencode((string) $this->passportId).'/documents/'.rawurlencode((string) $this->documentId);
    }
}
