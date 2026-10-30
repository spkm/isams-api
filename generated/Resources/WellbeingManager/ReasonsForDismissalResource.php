<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ReasonForDismissalForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\CreateReasonForDismissalRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\DeleteReasonForDismissalRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\GetReasonForDismissalRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\GetReasonsForDismissalRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\PatchReasonForDismissalRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ReasonsForDismissalResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetReasonsForDismissalRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ReasonForDismissalForCreate|array<string, mixed>  $reasonForDismissal
     */
    public function create(ReasonForDismissalForCreate|array $reasonForDismissal): Response
    {
        return $this->connector->send(new CreateReasonForDismissalRequest($reasonForDismissal));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteReasonForDismissalRequest($id));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetReasonForDismissalRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchReasonForDismissalRequest($id, $patch));
    }
}
