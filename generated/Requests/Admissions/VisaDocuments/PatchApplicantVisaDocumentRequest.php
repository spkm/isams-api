<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\VisaDocuments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;
use spkm\IsamsApi\Support\JsonPatch;

/**
 * Updates an applicant visa document.
 *
 * PATCH /api/admissions/applicants/{schoolId}/visa/{visaId}/documents/{documentId}
 */
#[Beta]
class PatchApplicantVisaDocumentRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function __construct(
        protected string $schoolId,
        protected int $visaId,
        protected int $documentId,
        protected JsonPatch|array $patch,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/visa/'.rawurlencode((string) $this->visaId).'/documents/'.rawurlencode((string) $this->documentId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->patch instanceof JsonPatch ? $this->patch->toArray() : $this->patch;
    }
}
