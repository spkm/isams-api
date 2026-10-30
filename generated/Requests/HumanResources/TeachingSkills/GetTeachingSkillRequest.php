<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\TeachingSkills;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\HumanResources\TeachingSkill;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a teaching skill by id.
 *
 * GET /api/humanresources/teachingskills/{id}
 */
#[Beta]
class GetTeachingSkillRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = TeachingSkill::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/teachingskills/'.rawurlencode((string) $this->id);
    }
}
