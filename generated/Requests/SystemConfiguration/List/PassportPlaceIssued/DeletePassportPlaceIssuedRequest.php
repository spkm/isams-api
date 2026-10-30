<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a passport place of issue.
 *
 * DELETE /api/systemconfiguration/list/passportplaceissued/{id}
 */
class DeletePassportPlaceIssuedRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/list/passportplaceissued/'.rawurlencode((string) $this->id);
    }
}
