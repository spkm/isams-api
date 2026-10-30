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
 * Retrieve a transpose configuration.
 *
 * GET /api/gradebooks/configuration/transpose/{transposeId}
 */
#[Beta]
class GetTransposeConfigurationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Transpose::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $transposeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/transpose/'.rawurlencode((string) $this->transposeId);
    }
}
