<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Teaching;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Teaching\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Teaching\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\CreateCurriculumSubjectCodeRequest;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\DeleteCurriculumSubjectCodeRequest;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\GetCurriculumSubjectCodesRequest;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\UpdateCurriculumSubjectCodeRequest;

class CurriculumSubjectCodesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetCurriculumSubjectCodesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateCurriculumSubjectCodeRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteCurriculumSubjectCodeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateCurriculumSubjectCodeRequest($id, $listItem));
    }
}
