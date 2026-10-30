<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Registration\SelfRegistrationRegistersForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * PUT /api/portals/students/attendance/self/periods
 */
class UpdateSelfRegistrationRegisterPeriodsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Registration\SelfRegistrationRegistersForUpdate|array<string, mixed>  $selfRegistrationRegisters
     */
    public function __construct(
        protected SelfRegistrationRegistersForUpdate|array $selfRegistrationRegisters,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/attendance/self/periods';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->selfRegistrationRegisters instanceof Data ? $this->selfRegistrationRegisters->toArray() : $this->selfRegistrationRegisters;
    }
}
