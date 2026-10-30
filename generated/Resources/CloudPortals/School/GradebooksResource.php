<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookMarkbooksWithPublishedColumnsForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookMarkbooksWithPublishedColumnsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnCommentsForMarkbookForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnCommentsForMarkbookRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnDetailForMarkbookForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnDetailForMarkbookRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnsForMarkbookForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnsForMarkbookRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class GradebooksResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookMarkbooksWithPublishedColumnsRequest
     */
    public function getMarkbooksWithPublishedColumns(string $schoolId): mixed
    {
        return $this->fetch(new GetGradebookMarkbooksWithPublishedColumnsRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookMarkbooksWithPublishedColumnsForParentUserRequest
     */
    public function getMarkbooksWithPublishedColumnsForParentUser(string $schoolId, string $viewedAsUserCode): mixed
    {
        return $this->fetch(new GetGradebookMarkbooksWithPublishedColumnsForParentUserRequest(schoolId: $schoolId, viewedAsUserCode: $viewedAsUserCode));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnCommentsForMarkbookRequest
     */
    public function getPublishedColumnCommentsForMarkbook(int $markbookId, string $schoolId, int $columnId): mixed
    {
        return $this->fetch(new GetGradebookPublishedColumnCommentsForMarkbookRequest(markbookId: $markbookId, schoolId: $schoolId, columnId: $columnId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnCommentsForMarkbookForParentUserRequest
     */
    public function getPublishedColumnCommentsForMarkbookForParentUser(
        int $markbookId,
        string $schoolId,
        string $viewedAsUserCode,
        int $columnId,
    ): mixed {
        return $this->fetch(new GetGradebookPublishedColumnCommentsForMarkbookForParentUserRequest(markbookId: $markbookId, schoolId: $schoolId, viewedAsUserCode: $viewedAsUserCode, columnId: $columnId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnDetailForMarkbookRequest
     */
    public function getPublishedColumnDetailForMarkbook(int $markbookId, string $schoolId, int $columnId): mixed
    {
        return $this->fetch(new GetGradebookPublishedColumnDetailForMarkbookRequest(markbookId: $markbookId, schoolId: $schoolId, columnId: $columnId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnDetailForMarkbookForParentUserRequest
     */
    public function getPublishedColumnDetailForMarkbookForParentUser(
        int $markbookId,
        string $schoolId,
        string $viewedAsUserCode,
        int $columnId,
    ): mixed {
        return $this->fetch(new GetGradebookPublishedColumnDetailForMarkbookForParentUserRequest(markbookId: $markbookId, schoolId: $schoolId, viewedAsUserCode: $viewedAsUserCode, columnId: $columnId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnsForMarkbookRequest
     */
    public function getPublishedColumnsForMarkbook(int $markbookId, string $schoolId): mixed
    {
        return $this->fetch(new GetGradebookPublishedColumnsForMarkbookRequest(markbookId: $markbookId, schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks\GetGradebookPublishedColumnsForMarkbookForParentUserRequest
     */
    public function getPublishedColumnsForMarkbookForParentUser(
        int $markbookId,
        string $schoolId,
        string $viewedAsUserCode,
    ): mixed {
        return $this->fetch(new GetGradebookPublishedColumnsForMarkbookForParentUserRequest(markbookId: $markbookId, schoolId: $schoolId, viewedAsUserCode: $viewedAsUserCode));
    }
}
