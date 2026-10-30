<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\List\Universities;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\University;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a university.
 *
 * GET /api/systemconfiguration/list/universities/{id}
 */
class GetUniversityRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = University::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/list/universities/'.rawurlencode((string) $this->id);
    }
}
