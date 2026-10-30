<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Document;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\StudentDocumentForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Uploads a student document.
 *
 * POST /api/students/{schoolId}/documents
 */
class CreateStudentDocumentRequest extends IsamsRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentDocumentForCreate|array<string, mixed>  $data
     */
    public function __construct(
        protected string $schoolId,
        protected MultipartValue $binary,
        protected StudentDocumentForCreate|array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/documents';
    }

    /**
     * @return list<MultipartValue>
     */
    protected function defaultBody(): array
    {
        return [new MultipartValue('binary', $this->binary->value, $this->binary->filename, $this->binary->headers), new MultipartValue('data', (string) json_encode($this->data instanceof Data ? $this->data->toArray() : $this->data))];
    }
}
