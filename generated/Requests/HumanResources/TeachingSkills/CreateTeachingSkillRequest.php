<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\TeachingSkills;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\TeachingSkillForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a teaching skill.
 *
 * POST /api/humanresources/teachingskills
 */
#[Beta]
class CreateTeachingSkillRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\TeachingSkillForCreate|array<string, mixed>  $teachingSkill
     */
    public function __construct(
        protected TeachingSkillForCreate|array $teachingSkill,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/teachingskills';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->teachingSkill instanceof Data ? $this->teachingSkill->toArray() : $this->teachingSkill;
    }
}
