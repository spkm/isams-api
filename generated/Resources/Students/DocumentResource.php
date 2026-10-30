<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Students\StudentDocumentForCreate;
use spkm\IsamsApi\Requests\Students\Document\CreateStudentDocumentRequest;
use spkm\IsamsApi\Requests\Students\Document\GetStudentDocumentsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DocumentResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\StudentDocument>
     * @see \spkm\IsamsApi\Requests\Students\Document\GetStudentDocumentsRequest
     */
    public function all(string $schoolId): Collection
    {
        return $this->fetch(new GetStudentDocumentsRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentDocumentForCreate|array<string, mixed>  $data
     * @see \spkm\IsamsApi\Requests\Students\Document\CreateStudentDocumentRequest
     */
    public function create(string $schoolId, MultipartValue $binary, StudentDocumentForCreate|array $data): void
    {
        $this->fetch(new CreateStudentDocumentRequest(schoolId: $schoolId, binary: $binary, data: $data));
    }
}
