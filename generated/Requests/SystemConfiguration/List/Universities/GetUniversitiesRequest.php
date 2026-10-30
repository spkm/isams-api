<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\List\Universities;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\University;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all universities.
 *
 * GET /api/systemconfiguration/list/universities
 */
class GetUniversitiesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = University::class;
    public string $resultKey = 'universities';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/list/universities';
    }
}
