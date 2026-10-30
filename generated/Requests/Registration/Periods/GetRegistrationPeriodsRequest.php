<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\Periods;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Registration\RegistrationPeriod;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all registration periods.
 *
 * GET /api/registration/periods
 */
class GetRegistrationPeriodsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = RegistrationPeriod::class;
    public string $resultKey = 'registrationPeriods';
    protected bool $cacheable = true;

    public function __construct(
        protected \DateTimeInterface|string|null $endDate = null,
        protected \DateTimeInterface|string|null $startDate = null,
        protected ?int $divisionId = null,
        protected ?string $userCode = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/periods';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'endDate' => $this->endDate instanceof \DateTimeInterface ? $this->endDate->format('Y-m-d\TH:i:s') : $this->endDate,
            'startDate' => $this->startDate instanceof \DateTimeInterface ? $this->startDate->format('Y-m-d\TH:i:s') : $this->startDate,
            'divisionId' => $this->divisionId,
            'userCode' => $this->userCode,
        ], fn (mixed $value) => $value !== null);
    }
}
