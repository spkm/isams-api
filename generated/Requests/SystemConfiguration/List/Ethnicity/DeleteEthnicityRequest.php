<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes an ethnic group.
 *
 * DELETE /api/systemconfiguration/list/ethnicity/{id}
 */
class DeleteEthnicityRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/list/ethnicity/'.rawurlencode((string) $this->id);
    }
}
