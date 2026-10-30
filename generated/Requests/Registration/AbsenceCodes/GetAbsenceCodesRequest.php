<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\AbsenceCodes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Registration\AbsenceCode;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all non-archived absence codes.
 *
 * GET /api/registration/absencecodes
 */
class GetAbsenceCodesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = AbsenceCode::class;
    public string $resultKey = 'absenceCodes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/registration/absencecodes';
    }
}
