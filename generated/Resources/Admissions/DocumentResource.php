<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\ApplicantDocumentForCreate;
use spkm\IsamsApi\Requests\Admissions\Document\CreateApplicantDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\Document\GetApplicantDocumentsRequest;

class DocumentResource extends BaseResource
{
    public function all(string $schoolId): Response
    {
        return $this->connector->send(new GetApplicantDocumentsRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantDocumentForCreate|array<string, mixed>  $data
     */
    public function create(string $schoolId, MultipartValue $binary, ApplicantDocumentForCreate|array $data): Response
    {
        return $this->connector->send(new CreateApplicantDocumentRequest($schoolId, $binary, $data));
    }
}
