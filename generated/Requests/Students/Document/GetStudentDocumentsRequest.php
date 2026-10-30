<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Document;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\StudentDocument;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the documents of a student.
 *
 * GET /api/students/{schoolId}/documents
 */
class GetStudentDocumentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentDocument::class;
    public string $resultKey = 'documents';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/documents';
    }
}
