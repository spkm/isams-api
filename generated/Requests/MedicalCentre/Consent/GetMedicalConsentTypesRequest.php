<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Consent;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\ConsentType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Consent Types.
 *
 * GET /api/medical/consenttypes
 */
class GetMedicalConsentTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConsentType::class;
    public string $resultKey = 'consentTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/consenttypes';
    }
}
