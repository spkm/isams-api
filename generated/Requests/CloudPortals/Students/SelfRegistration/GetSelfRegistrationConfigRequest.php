<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Registration\StudentSelfRegistrationConfiguration;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/attendance/self/configuration
 */
class GetSelfRegistrationConfigRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = StudentSelfRegistrationConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/attendance/self/configuration';
    }
}
