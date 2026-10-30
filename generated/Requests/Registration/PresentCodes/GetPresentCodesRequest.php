<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\PresentCodes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Registration\PresentCode;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all present codes.
 *
 * GET /api/registration/presentcodes
 */
class GetPresentCodesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PresentCode::class;
    public string $resultKey = 'presentCodes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/registration/presentcodes';
    }
}
