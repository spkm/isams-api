<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Homework;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Homework\Homework;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a homework record by id.
 *
 * GET /api/portal/homework/{id}
 */
class GetHomeworkByIdRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Homework::class;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portal/homework/'.rawurlencode((string) $this->id);
    }
}
