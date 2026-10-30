<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\YearGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\YearGroup;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a year group.
 *
 * GET /api/school/yeargroups/{id}
 */
class GetYearGroupRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = YearGroup::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/yeargroups/'.rawurlencode((string) $this->id);
    }
}
