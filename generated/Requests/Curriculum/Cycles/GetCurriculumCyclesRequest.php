<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Curriculum\Cycles;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Curriculum\Cycle;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all Cycles.
 *
 * GET /api/curriculum/configuration/cycles
 */
#[Beta]
class GetCurriculumCyclesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Cycle::class;
    public string $resultKey = 'cycles';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/curriculum/configuration/cycles';
    }
}
