<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals\GetGradebooksPortalMarkbooksWithPublishedColumnsForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals\GetGradebooksPortalMarkbooksWithPublishedColumnsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals\GetGradebooksPortalPublishedColumnCommentsForMarkbookForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals\GetGradebooksPortalPublishedColumnCommentsForMarkbookRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals\GetGradebooksPortalPublishedColumnDetailForMarkbookForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals\GetGradebooksPortalPublishedColumnDetailForMarkbookRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals\GetGradebooksPortalPublishedColumnsForMarkbookForParentUserRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals\GetGradebooksPortalPublishedColumnsForMarkbookRequest;

class SchoolGradebooksPortalsResource extends BaseResource
{
    public function getGradebooksPortalMarkbooksWithPublishedColumns(string $schoolId): Response
    {
        return $this->connector->send(new GetGradebooksPortalMarkbooksWithPublishedColumnsRequest($schoolId));
    }

    public function getGradebooksPortalMarkbooksWithPublishedColumnsForParentUser(
        string $schoolId,
        string $viewedAsUserCode,
    ): Response {
        return $this->connector->send(new GetGradebooksPortalMarkbooksWithPublishedColumnsForParentUserRequest($schoolId, $viewedAsUserCode));
    }

    public function getGradebooksPortalPublishedColumnCommentsForMarkbook(
        string $schoolId,
        int $markbookId,
        int $columnId,
    ): Response {
        return $this->connector->send(new GetGradebooksPortalPublishedColumnCommentsForMarkbookRequest($schoolId, $markbookId, $columnId));
    }

    public function getGradebooksPortalPublishedColumnCommentsForMarkbookForParentUser(
        string $schoolId,
        int $markbookId,
        string $viewedAsUserCode,
        int $columnId,
    ): Response {
        return $this->connector->send(new GetGradebooksPortalPublishedColumnCommentsForMarkbookForParentUserRequest($schoolId, $markbookId, $viewedAsUserCode, $columnId));
    }

    public function getGradebooksPortalPublishedColumnDetailForMarkbook(
        string $schoolId,
        int $markbookId,
        int $columnId,
    ): Response {
        return $this->connector->send(new GetGradebooksPortalPublishedColumnDetailForMarkbookRequest($schoolId, $markbookId, $columnId));
    }

    public function getGradebooksPortalPublishedColumnDetailForMarkbookForParentUser(
        string $schoolId,
        int $markbookId,
        string $viewedAsUserCode,
        int $columnId,
    ): Response {
        return $this->connector->send(new GetGradebooksPortalPublishedColumnDetailForMarkbookForParentUserRequest($schoolId, $markbookId, $viewedAsUserCode, $columnId));
    }

    public function getGradebooksPortalPublishedColumnsForMarkbook(string $schoolId, int $markbookId): Response
    {
        return $this->connector->send(new GetGradebooksPortalPublishedColumnsForMarkbookRequest($schoolId, $markbookId));
    }

    public function getGradebooksPortalPublishedColumnsForMarkbookForParentUser(
        string $schoolId,
        int $markbookId,
        string $viewedAsUserCode,
    ): Response {
        return $this->connector->send(new GetGradebooksPortalPublishedColumnsForMarkbookForParentUserRequest($schoolId, $markbookId, $viewedAsUserCode));
    }
}
