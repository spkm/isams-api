<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Teaching\GlobalListItem;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all curriculum subject codes.
 *
 * GET /api/teaching/curriculumsubjectcodes
 */
class GetCurriculumSubjectCodesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = GlobalListItem::class;
    public string $resultKey = 'items';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/teaching/curriculumsubjectcodes';
    }
}
