<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\Configuration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\SchoolDetails;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/school/details
 */
class GetSchoolDetailsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = SchoolDetails::class;
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/school/details';
    }
}
