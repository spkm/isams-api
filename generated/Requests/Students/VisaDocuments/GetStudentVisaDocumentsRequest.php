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
 * Retrieves all documents associated with a student visa.
 *
 * GET /api/students/{schoolId}/visa/{visaId}/documents
 */
#[Beta]
class GetStudentVisaDocumentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentVisaDocument::class;
    public string $resultKey = 'visaDocuments';

    public function __construct(
        protected string $schoolId,
        protected int $visaId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/visa/'.rawurlencode((string) $this->visaId).'/documents';
    }
}
