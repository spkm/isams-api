<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Document;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a medical document for a student.
 *
 * GET /api/medical/students/{schoolId}/documents/{documentId}
 */
class GetStudentDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Document::class;

    public function __construct(
        protected string $schoolId,
        protected string $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/documents/'.rawurlencode((string) $this->documentId);
    }
}
