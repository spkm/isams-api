<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Admissions\DocumentCategory\GetApplicantDocumentCategoriesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DocumentCategoryResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\DocumentCategory>
     * @see \spkm\IsamsApi\Requests\Admissions\DocumentCategory\GetApplicantDocumentCategoriesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetApplicantDocumentCategoriesRequest());
    }
}
