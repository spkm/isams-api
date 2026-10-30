<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\MedicalCentre\Note\GetMedicalNoteTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class NoteResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\NoteType>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Note\GetMedicalNoteTypesRequest
     */
    public function getTypes(): Collection
    {
        return $this->fetch(new GetMedicalNoteTypesRequest());
    }
}
