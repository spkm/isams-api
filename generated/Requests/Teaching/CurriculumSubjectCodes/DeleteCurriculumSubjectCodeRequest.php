<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a curriculum subject code.
 *
 * DELETE /api/teaching/curriculumsubjectcodes/{id}
 */
class DeleteCurriculumSubjectCodeRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/teaching/curriculumsubjectcodes/'.rawurlencode((string) $this->id);
    }
}
