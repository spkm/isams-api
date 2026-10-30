<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\MedicalCentre\Document\GetMedicalDocumentCategoriesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DocumentResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\DocumentCategory>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Document\GetMedicalDocumentCategoriesRequest
     */
    public function getCategories(): Collection
    {
        return $this->fetch(new GetMedicalDocumentCategoriesRequest());
    }
}
