<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Students\DocumentCategory\GetStudentDocumentCategoriesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DocumentCategoryResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\DocumentCategory>
     * @see \spkm\IsamsApi\Requests\Students\DocumentCategory\GetStudentDocumentCategoriesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetStudentDocumentCategoriesRequest());
    }
}
