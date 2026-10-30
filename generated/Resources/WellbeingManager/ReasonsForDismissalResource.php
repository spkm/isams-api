<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ReasonForDismissal;
use spkm\IsamsApi\Data\WellbeingManager\ReasonForDismissalForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\CreateReasonForDismissalRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\DeleteReasonForDismissalRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\GetReasonForDismissalRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\GetReasonsForDismissalRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\PatchReasonForDismissalRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ReasonsForDismissalResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ReasonForDismissal>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\GetReasonsForDismissalRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetReasonsForDismissalRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ReasonForDismissalForCreate|array<string, mixed>  $reasonForDismissal
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\CreateReasonForDismissalRequest
     */
    public function create(ReasonForDismissalForCreate|array $reasonForDismissal): Created
    {
        return $this->fetch(new CreateReasonForDismissalRequest(reasonForDismissal: $reasonForDismissal));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\DeleteReasonForDismissalRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteReasonForDismissalRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\GetReasonForDismissalRequest
     */
    public function get(int $id): ReasonForDismissal
    {
        return $this->fetch(new GetReasonForDismissalRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal\PatchReasonForDismissalRequest
     */
    public function patch(int $id, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchReasonForDismissalRequest(id: $id, patch: $patch));
    }
}
