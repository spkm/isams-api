<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\VisaDocuments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaDocumentForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Uploads an applicant visa document.
 *
 * POST /api/admissions/applicants/{schoolId}/visa/{visaId}/documents
 */
#[Beta]
class CreateApplicantVisaDocumentRequest extends IsamsRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaDocumentForCreate|array<string, mixed>  $data
     */
    public function __construct(
        protected string $schoolId,
        protected int $visaId,
        protected MultipartValue $binary,
        protected ApplicantVisaDocumentForCreate|array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/visa/'.rawurlencode((string) $this->visaId).'/documents';
    }

    /**
     * @return list<MultipartValue>
     */
    protected function defaultBody(): array
    {
        return [new MultipartValue('binary', $this->binary->value, $this->binary->filename, $this->binary->headers), new MultipartValue('data', (string) json_encode($this->data instanceof Data ? $this->data->toArray() : $this->data))];
    }
}
