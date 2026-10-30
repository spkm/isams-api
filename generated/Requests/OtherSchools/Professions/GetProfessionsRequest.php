<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\OtherSchools\Professions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\OtherSchools\Profession;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all professions.
 *
 * GET /api/otherschools/professions
 */
class GetProfessionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Profession::class;
    public string $resultKey = 'professions';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/otherschools/professions';
    }
}
