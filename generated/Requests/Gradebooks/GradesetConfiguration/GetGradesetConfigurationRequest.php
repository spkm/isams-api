<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\GradesetConfiguration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\Gradeset;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve a Gradeset.
 *
 * GET /api/gradebooks/configuration/gradesets/{gradesetId}
 */
#[Beta]
class GetGradesetConfigurationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Gradeset::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $gradesetId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/gradesets/'.rawurlencode((string) $this->gradesetId);
    }
}
