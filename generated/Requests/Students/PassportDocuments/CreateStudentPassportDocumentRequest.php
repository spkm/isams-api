<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\PassportDocuments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\StudentPassportDocumentForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Uploads a student passport document.
 *
 * POST /api/students/{schoolId}/passport/{passportId}/documents
 */
#[Beta]
class CreateStudentPassportDocumentRequest extends IsamsRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportDocumentForCreate|array<string, mixed>|null  $data
     */
    public function __construct(
        protected string $schoolId,
        protected int $passportId,
        protected MultipartValue $binary,
        protected StudentPassportDocumentForCreate|array|null $data = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/passport/'.rawurlencode((string) $this->passportId).'/documents';
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
