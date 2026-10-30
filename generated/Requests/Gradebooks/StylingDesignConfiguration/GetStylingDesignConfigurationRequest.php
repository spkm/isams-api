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
 * Retrieve a styling design.
 *
 * GET /api/gradebooks/configuration/stylingdesigns/{stylingDesignId}
 */
#[Beta]
class GetStylingDesignConfigurationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = StylingDesign::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $stylingDesignId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/stylingdesigns/'.rawurlencode((string) $this->stylingDesignId);
    }
}
