<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/admissions/forms/submissions
 */
class GetPortalsAdmissionsFormSubmissionsByUserCodeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected ?string $type = null,
        protected ?string $tempGuestUser = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/forms/submissions';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'type' => $this->type,
            'tempGuestUser' => $this->tempGuestUser,
        ], fn (mixed $value) => $value !== null);
    }
}
