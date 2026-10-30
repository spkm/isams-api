<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\RecordCollection;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Data\StudentRegisters\StudentRecords;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the specified record collection for all students.
 *
 * GET /api/registers/{registerId}/students/recordcollections/{recordCollectionId}/records
 */
class GetRecordCollectionRecordsRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentRecords::class;
    public string $resultKey = 'students';

    public function __construct(
        protected int $registerId,
        protected int $recordCollectionId,
        protected ?string $systemStatus = null,
        protected ?int $page = null,
        protected ?int $pageSize = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/recordcollections/'.rawurlencode((string) $this->recordCollectionId).'/records';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'systemStatus' => $this->systemStatus,
            'page' => $this->page,
            'pageSize' => $this->pageSize,
        ], fn (mixed $value) => $value !== null);
    }
}
