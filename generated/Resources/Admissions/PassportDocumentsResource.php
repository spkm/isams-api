<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportDocumentForCreate;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\CreateApplicantPassportDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\DeleteApplicantPassportDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\DownloadApplicantPassportDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\GetApplicantPassportDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\GetApplicantPassportDocumentsRequest;
use spkm\IsamsApi\Requests\Admissions\PassportDocuments\PatchApplicantPassportDocumentRequest;
use spkm\IsamsApi\Support\JsonPatch;

class PassportDocumentsResource extends BaseResource
{
    public function all(string $schoolId, int $passportId): Response
    {
        return $this->connector->send(new GetApplicantPassportDocumentsRequest($schoolId, $passportId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportDocumentForCreate|array<string, mixed>  $data
     */
    public function create(
        string $schoolId,
        int $passportId,
        MultipartValue $binary,
        ApplicantPassportDocumentForCreate|array $data,
    ): Response {
        return $this->connector->send(new CreateApplicantPassportDocumentRequest($schoolId, $passportId, $binary, $data));
    }

    public function delete(string $schoolId, int $passportId, int $documentId): Response
    {
        return $this->connector->send(new DeleteApplicantPassportDocumentRequest($schoolId, $passportId, $documentId));
    }

    public function download(string $schoolId, int $passportId, int $documentId): Response
    {
        return $this->connector->send(new DownloadApplicantPassportDocumentRequest($schoolId, $passportId, $documentId));
    }

    public function get(string $schoolId, int $passportId, int $documentId): Response
    {
        return $this->connector->send(new GetApplicantPassportDocumentRequest($schoolId, $passportId, $documentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, int $passportId, int $documentId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchApplicantPassportDocumentRequest($schoolId, $passportId, $documentId, $patch));
    }
}
