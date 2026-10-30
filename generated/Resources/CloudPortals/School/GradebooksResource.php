<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookMarkbooksWithPublishedColumnsForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookMarkbooksWithPublishedColumnsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnCommentsForMarkbookForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnCommentsForMarkbookRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnDetailForMarkbookForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnDetailForMarkbookRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnsForMarkbookForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnsForMarkbookRequest;

class GradebooksResource extends BaseResource
{
    public function getMarkbooksWithPublishedColumns(string $schoolId): Response
    {
        return $this->connector->send(new GetGradebookMarkbooksWithPublishedColumnsRequest($schoolId));
    }

    public function getMarkbooksWithPublishedColumnsForParentUser(
        string $schoolId,
        string $viewedAsUserCode,
    ): Response {
        return $this->connector->send(new GetGradebookMarkbooksWithPublishedColumnsForParentUserRequest($schoolId, $viewedAsUserCode));
    }

    public function getPublishedColumnCommentsForMarkbook(int $markbookId, string $schoolId, int $columnId): Response
    {
        return $this->connector->send(new GetGradebookPublishedColumnCommentsForMarkbookRequest($markbookId, $schoolId, $columnId));
    }

    public function getPublishedColumnCommentsForMarkbookForParentUser(
        int $markbookId,
        string $schoolId,
        string $viewedAsUserCode,
        int $columnId,
    ): Response {
        return $this->connector->send(new GetGradebookPublishedColumnCommentsForMarkbookForParentUserRequest($markbookId, $schoolId, $viewedAsUserCode, $columnId));
    }

    public function getPublishedColumnDetailForMarkbook(int $markbookId, string $schoolId, int $columnId): Response
    {
        return $this->connector->send(new GetGradebookPublishedColumnDetailForMarkbookRequest($markbookId, $schoolId, $columnId));
    }

    public function getPublishedColumnDetailForMarkbookForParentUser(
        int $markbookId,
        string $schoolId,
        string $viewedAsUserCode,
        int $columnId,
    ): Response {
        return $this->connector->send(new GetGradebookPublishedColumnDetailForMarkbookForParentUserRequest($markbookId, $schoolId, $viewedAsUserCode, $columnId));
    }

    public function getPublishedColumnsForMarkbook(int $markbookId, string $schoolId): Response
    {
        return $this->connector->send(new GetGradebookPublishedColumnsForMarkbookRequest($markbookId, $schoolId));
    }

    public function getPublishedColumnsForMarkbookForParentUser(
        int $markbookId,
        string $schoolId,
        string $viewedAsUserCode,
    ): Response {
        return $this->connector->send(new GetGradebookPublishedColumnsForMarkbookForParentUserRequest($markbookId, $schoolId, $viewedAsUserCode));
    }
}
