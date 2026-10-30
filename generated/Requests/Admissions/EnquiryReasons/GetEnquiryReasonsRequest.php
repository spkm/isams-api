<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\EnquiryReasons;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Admissions\GlobalListItem;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all enquiry reasons.
 *
 * GET /api/admissions/enquiryreasons
 */
class GetEnquiryReasonsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = GlobalListItem::class;
    public string $resultKey = 'items';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/admissions/enquiryreasons';
    }
}
