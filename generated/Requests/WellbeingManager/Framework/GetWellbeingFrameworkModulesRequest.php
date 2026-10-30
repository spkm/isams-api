<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Framework;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\Module;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all modules.
 *
 * GET /api/wellbeing/framework/modules
 */
class GetWellbeingFrameworkModulesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Module::class;
    public string $resultKey = 'modules';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/framework/modules';
    }
}
