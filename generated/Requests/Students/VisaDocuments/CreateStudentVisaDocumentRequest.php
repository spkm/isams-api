<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\VisaDocuments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\StudentVisaDocumentForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Uploads a student visa document.
 *
 * POST /api/students/{schoolId}/visa/{visaId}/documents
 */
#[Beta]
class CreateStudentVisaDocumentRequest extends IsamsRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaDocumentForCreate|array<string, mixed>|null  $data
     */
    public function __construct(
        protected string $schoolId,
        protected int $visaId,
        protected MultipartValue $binary,
        protected StudentVisaDocumentForCreate|array|null $data = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/visa/'.rawurlencode((string) $this->visaId).'/documents';
    }

    /**
     * @return list<MultipartValue>
     */
    protected function defaultBody(): array
    {
        $parts = [$this->binary];

        if ($this->data !== null) {
            $parts[] = new MultipartValue('data', (string) json_encode($this->data instanceof Data ? $this->data->toArray() : $this->data));
        }

        return $parts;
    }
}
