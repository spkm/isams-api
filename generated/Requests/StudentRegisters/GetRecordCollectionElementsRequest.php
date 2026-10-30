<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\StudentRegisters\RecordCollectionElement;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all record collection elements for the specified register.
 *
 * GET /api/registers/{registerId}/recordCollections
 */
class GetRecordCollectionElementsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = RecordCollectionElement::class;
    public string $resultKey = 'recordCollections';
    protected bool $cacheable = true;

    public function __construct(
        protected int $registerId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/recordCollections';
    }
}
