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
 * Updates a record collection record.
 *
 * PATCH /api/registers/{registerId}/students/{schoolId}/recordcollections/{recordCollectionId}/records/{recordId}
 */
class PatchRecordCollectionRecordRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>  $values
     */
    public function __construct(
        protected int $registerId,
        protected string $schoolId,
        protected int $recordCollectionId,
        protected int $recordId,
        protected array $values,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/recordcollections/'.rawurlencode((string) $this->recordCollectionId).'/records/'.rawurlencode((string) $this->recordId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->values;
    }
}
