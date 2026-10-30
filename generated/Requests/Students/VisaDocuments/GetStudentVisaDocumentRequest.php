<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\VisaDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Students\StudentVisaDocument;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a single document for a student visa by document id.
 *
 * GET /api/students/{schoolId}/visa/{visaId}/documents/{documentId}
 */
#[Beta]
class GetStudentVisaDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = StudentVisaDocument::class;

    public function __construct(
        protected string $schoolId,
        protected int $visaId,
        protected int $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/visa/'.rawurlencode((string) $this->visaId).'/documents/'.rawurlencode((string) $this->documentId);
    }
}
