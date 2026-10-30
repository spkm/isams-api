<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\OtherSchools;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\OtherSchools\OtherSchool;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a school.
 *
 * GET /api/otherschools/{id}
 */
class GetOtherSchoolRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = OtherSchool::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/otherschools/'.rawurlencode((string) $this->id);
    }
}
