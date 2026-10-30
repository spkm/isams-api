<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalDocumentSource;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all medical document sources.
 *
 * GET /api/portals/list/medicaldocumentsources
 */
class GetListMedicalDocumentSourcesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicalDocumentSource::class;
    public string $resultKey = 'medicalDocumentSources';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/medicaldocumentsources';
    }
}
