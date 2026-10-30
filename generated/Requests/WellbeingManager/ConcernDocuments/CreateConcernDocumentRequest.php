<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernDocumentForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Uploads a concern document.
 *
 * POST /api/wellbeing/students/{schoolId}/concerns/{concernId}/documents
 */
class CreateConcernDocumentRequest extends IsamsRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernDocumentForCreate|array<string, mixed>  $data
     */
    public function __construct(
        protected string $schoolId,
        protected int $concernId,
        protected MultipartValue $document,
        protected ConcernDocumentForCreate|array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/documents';
    }

    /**
     * @return list<MultipartValue>
     */
    protected function defaultBody(): array
    {
        return [$this->document, new MultipartValue('data', (string) json_encode($this->data instanceof Data ? $this->data->toArray() : $this->data))];
    }
}
