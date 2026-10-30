<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\DismissIndicatorsCollectionForUpdate;
use spkm\IsamsApi\Data\WellbeingManager\IndicatorForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\CreateIndicatorRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\DeleteIndicatorRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\DeleteIndicatorsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\DismissIndicatorsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\GetIndicatorRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\PatchIndicatorRequest;
use spkm\IsamsApi\Support\JsonPatch;

class IndicatorsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\IndicatorForCreate|array<string, mixed>  $indicator
     */
    public function createIndicator(string $schoolId, IndicatorForCreate|array $indicator): Response
    {
        return $this->connector->send(new CreateIndicatorRequest($schoolId, $indicator));
    }

    public function deleteIndicator(int $id, string $schoolId): Response
    {
        return $this->connector->send(new DeleteIndicatorRequest($id, $schoolId));
    }

    /**
     * @param  array<mixed>  $ids
     */
    public function deleteIndicators(array $ids): Response
    {
        return $this->connector->send(new DeleteIndicatorsRequest($ids));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\DismissIndicatorsCollectionForUpdate|array<string, mixed>  $indicators
     */
    public function dismissIndicators(DismissIndicatorsCollectionForUpdate|array $indicators): Response
    {
        return $this->connector->send(new DismissIndicatorsRequest($indicators));
    }

    public function getIndicator(string $schoolId, int $id): Response
    {
        return $this->connector->send(new GetIndicatorRequest($schoolId, $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchIndicator(string $schoolId, int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchIndicatorRequest($schoolId, $id, $patch));
    }
}
