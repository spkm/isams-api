<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Billing\StatementOfAccounts;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Integrations\Statement;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/statements
 */
class GetStatementOfAccountsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Statement::class;

    public function __construct(
        protected \DateTimeInterface|string|null $startDate = null,
        protected \DateTimeInterface|string|null $endDate = null,
        protected ?string $studentName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/statements';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'startDate' => $this->startDate instanceof \DateTimeInterface ? $this->startDate->format('Y-m-d\TH:i:s') : $this->startDate,
            'endDate' => $this->endDate instanceof \DateTimeInterface ? $this->endDate->format('Y-m-d\TH:i:s') : $this->endDate,
            'studentName' => $this->studentName,
        ], fn (mixed $value) => $value !== null);
    }
}
