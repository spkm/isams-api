<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\TransposeConfiguration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\Transpose;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all transpose configurations.
 *
 * GET /api/gradebooks/configuration/transpose
 */
#[Beta]
class GetTransposeConfigurationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Transpose::class;
    public string $resultKey = 'transpose';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/transpose';
    }
}
