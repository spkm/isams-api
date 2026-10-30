<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StylingDesignConfiguration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\StylingDesign;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all styling designs.
 *
 * GET /api/gradebooks/configuration/stylingdesigns
 */
#[Beta]
class GetStylingDesignConfigurationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StylingDesign::class;
    public string $resultKey = 'styleDesigns';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/stylingdesigns';
    }
}
