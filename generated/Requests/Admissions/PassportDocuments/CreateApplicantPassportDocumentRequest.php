<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\PassportDocuments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportDocumentForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Uploads an applicant passport document.
 *
 * POST /api/admissions/applicants/{schoolId}/passport/{passportId}/documents
 */
#[Beta]
class CreateApplicantPassportDocumentRequest extends IsamsRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportDocumentForCreate|array<string, mixed>  $data
     */
    public function __construct(
        protected string $schoolId,
        protected int $passportId,
        protected MultipartValue $binary,
        protected ApplicantPassportDocumentForCreate|array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/passport/'.rawurlencode((string) $this->passportId).'/documents';
    }

    /**
     * @return list<MultipartValue>
     */
    protected function defaultBody(): array
    {
        return [$this->binary, new MultipartValue('data', (string) json_encode($this->data instanceof Data ? $this->data->toArray() : $this->data))];
    }
}
