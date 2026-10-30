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
 * Retrieves all Gradesets.
 *
 * GET /api/gradebooks/configuration/gradesets
 */
#[Beta]
class GetGradesetConfigurationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Gradeset::class;
    public string $resultKey = 'gradesets';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/gradesets';
    }
}
