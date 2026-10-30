<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Agent;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Agent\Agent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all agents.
 *
 * GET /api/agents
 */
class GetAgentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Agent::class;
    public string $resultKey = 'agents';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/agents';
    }
}
