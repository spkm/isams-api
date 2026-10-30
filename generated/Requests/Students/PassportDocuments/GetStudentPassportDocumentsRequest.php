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
 * Retrieves all documents associated with a student passport.
 *
 * GET /api/students/{schoolId}/passport/{passportId}/documents
 */
#[Beta]
class GetStudentPassportDocumentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentPassportDocument::class;
    public string $resultKey = 'passportDocuments';

    public function __construct(
        protected string $schoolId,
        protected int $passportId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/passport/'.rawurlencode((string) $this->passportId).'/documents';
    }
}
