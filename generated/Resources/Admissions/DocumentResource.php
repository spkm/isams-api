<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Admissions\ApplicantDocumentForCreate;
use spkm\IsamsApi\Requests\Admissions\Document\CreateApplicantDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\Document\GetApplicantDocumentsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DocumentResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\ApplicantDocument>
     * @see \spkm\IsamsApi\Requests\Admissions\Document\GetApplicantDocumentsRequest
     */
    public function all(string $schoolId): Collection
    {
        return $this->fetch(new GetApplicantDocumentsRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantDocumentForCreate|array<string, mixed>  $data
     * @see \spkm\IsamsApi\Requests\Admissions\Document\CreateApplicantDocumentRequest
     */
    public function create(string $schoolId, MultipartValue $binary, ApplicantDocumentForCreate|array $data): bool
    {
        $this->fetch(new CreateApplicantDocumentRequest(schoolId: $schoolId, binary: $binary, data: $data));

        return true;
    }
}
