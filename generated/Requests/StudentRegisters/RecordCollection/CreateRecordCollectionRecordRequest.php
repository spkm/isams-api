<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\RecordCollection;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Adds a record to a record collection.
 *
 * POST /api/registers/{registerId}/students/{schoolId}/recordcollections/{recordCollectionId}/records
 */
class CreateRecordCollectionRecordRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<mixed>  $values
     */
    public function __construct(
        protected int $registerId,
        protected string $schoolId,
        protected int $recordCollectionId,
        protected array $values,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/recordcollections/'.rawurlencode((string) $this->recordCollectionId).'/records';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->values;
    }
}
