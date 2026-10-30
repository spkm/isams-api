<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\Divisions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\Division;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a division.
 *
 * GET /api/school/divisions/{code}
 */
class GetDivisionRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Division::class;
    protected bool $cacheable = true;

    public function __construct(
        protected string $code,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/divisions/'.rawurlencode((string) $this->code);
    }
}
