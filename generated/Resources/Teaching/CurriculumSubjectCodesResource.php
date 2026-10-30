<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Teaching;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Teaching\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Teaching\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\CreateCurriculumSubjectCodeRequest;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\DeleteCurriculumSubjectCodeRequest;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\GetCurriculumSubjectCodesRequest;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\UpdateCurriculumSubjectCodeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CurriculumSubjectCodesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Teaching\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\GetCurriculumSubjectCodesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetCurriculumSubjectCodesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\CreateCurriculumSubjectCodeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateCurriculumSubjectCodeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\DeleteCurriculumSubjectCodeRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteCurriculumSubjectCodeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\UpdateCurriculumSubjectCodeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateCurriculumSubjectCodeRequest(id: $id, listItem: $listItem));
    }
}
