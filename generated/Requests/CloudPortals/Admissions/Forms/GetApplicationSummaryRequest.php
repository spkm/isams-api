<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a summary of the requested form
 *
 * GET /api/portals/admissions/forms/application/summary
 */
class GetApplicationSummaryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    /**
     * @param  array<mixed>  $codes
     */
    public function __construct(
        protected array $codes,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/forms/application/summary';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return [
            'codes' => $this->codes,
        ];
    }
}
