<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Registration\StudentSelfRegistrationRegisterPeriod;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/attendance/self/periods
 */
class GetSelfRegistrationRegisterPeriodsByDateRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentSelfRegistrationRegisterPeriod::class;
    public string $resultKey = 'periods';

    public function __construct(
        protected \DateTimeInterface|string $date,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/attendance/self/periods';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return [
            'date' => $this->date instanceof \DateTimeInterface ? $this->date->format('Y-m-d\TH:i:s') : $this->date,
        ];
    }
}
