<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\Status;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Data\Registration\RegistrationStatus;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all student registration statuses for a registration period.
 *
 * GET /api/registration/register/{registrationPeriodId}
 */
class GetRegistrationStatusesRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = RegistrationStatus::class;
    public string $resultKey = 'registrationStatuses';

    public function __construct(
        protected int $registrationPeriodId,
        protected ?int $page = null,
        protected ?int $pageSize = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/register/'.rawurlencode((string) $this->registrationPeriodId);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'pageSize' => $this->pageSize,
        ], fn (mixed $value) => $value !== null);
    }
}
