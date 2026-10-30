<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\DismissIndicatorsCollectionForUpdate;
use spkm\IsamsApi\Data\WellbeingManager\Indicator;
use spkm\IsamsApi\Data\WellbeingManager\IndicatorForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\CreateIndicatorRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\DeleteIndicatorRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\DeleteIndicatorsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\DismissIndicatorsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\GetIndicatorRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\PatchIndicatorRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class IndicatorsResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\IndicatorForCreate|array<string, mixed>  $indicator
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Indicators\CreateIndicatorRequest
     */
    public function create(string $schoolId, IndicatorForCreate|array $indicator): Created
    {
        return $this->fetch(new CreateIndicatorRequest(schoolId: $schoolId, indicator: $indicator));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Indicators\DeleteIndicatorRequest
     */
    public function delete(string $schoolId, int $id): void
    {
        $this->fetch(new DeleteIndicatorRequest(schoolId: $schoolId, id: $id));
    }

    /**
     * @param  array<mixed>  $ids
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Indicators\DeleteIndicatorsRequest
     */
    public function deleteMany(array $ids): Created
    {
        return $this->fetch(new DeleteIndicatorsRequest(ids: $ids));
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\DismissIndicatorsCollectionForUpdate|array<string, mixed>  $dismissIndicatorsCollection
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Indicators\DismissIndicatorsRequest
     */
    public function dismiss(DismissIndicatorsCollectionForUpdate|array $dismissIndicatorsCollection): void
    {
        $this->fetch(new DismissIndicatorsRequest(dismissIndicatorsCollection: $dismissIndicatorsCollection));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Indicators\GetIndicatorRequest
     */
    public function get(string $schoolId, int $id): Indicator
    {
        return $this->fetch(new GetIndicatorRequest(schoolId: $schoolId, id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Indicators\PatchIndicatorRequest
     */
    public function patch(string $schoolId, int $id, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchIndicatorRequest(schoolId: $schoolId, id: $id, patch: $patch));
    }
}
