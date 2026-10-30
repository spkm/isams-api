<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\List\Counties;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a county.
 *
 * DELETE /api/systemconfiguration/list/counties/{id}
 */
class DeleteCountyRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/list/counties/'.rawurlencode((string) $this->id);
    }
}
