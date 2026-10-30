<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\RecordCollection;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes a record from a record collection.
 *
 * DELETE /api/registers/{registerId}/students/{schoolId}/recordcollections/{recordCollectionId}/records/{recordId}
 */
class DeleteRecordCollectionRecordRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $registerId,
        protected string $schoolId,
        protected int $recordCollectionId,
        protected int $recordId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/recordcollections/'.rawurlencode((string) $this->recordCollectionId).'/records/'.rawurlencode((string) $this->recordId);
    }
}
