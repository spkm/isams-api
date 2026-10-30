<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaDocumentForCreate;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\CreateApplicantVisaDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\DeleteApplicantVisaDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\DownloadApplicantVisaDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\GetApplicantVisaDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\GetApplicantVisaDocumentsRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\PatchApplicantVisaDocumentRequest;
use spkm\IsamsApi\Support\JsonPatch;

class VisaDocumentsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaDocumentForCreate|array<string, mixed>  $data
     */
    public function createApplicantVisaDocument(
        string $schoolId,
        int $visaId,
        MultipartValue $binary,
        ApplicantVisaDocumentForCreate|array $data,
    ): Response {
        return $this->connector->send(new CreateApplicantVisaDocumentRequest($schoolId, $visaId, $binary, $data));
    }

    public function deleteApplicantVisaDocument(string $schoolId, int $visaId, int $documentId): Response
    {
        return $this->connector->send(new DeleteApplicantVisaDocumentRequest($schoolId, $visaId, $documentId));
    }

    public function downloadApplicantVisaDocument(string $schoolId, int $visaId, int $documentId): Response
    {
        return $this->connector->send(new DownloadApplicantVisaDocumentRequest($schoolId, $visaId, $documentId));
    }

    public function getApplicantVisaDocument(string $schoolId, int $visaId, int $documentId): Response
    {
        return $this->connector->send(new GetApplicantVisaDocumentRequest($schoolId, $visaId, $documentId));
    }

    public function getApplicantVisaDocuments(string $schoolId, int $visaId): Response
    {
        return $this->connector->send(new GetApplicantVisaDocumentsRequest($schoolId, $visaId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchApplicantVisaDocument(
        string $schoolId,
        int $visaId,
        int $documentId,
        JsonPatch|array $patch,
    ): Response {
        return $this->connector->send(new PatchApplicantVisaDocumentRequest($schoolId, $visaId, $documentId, $patch));
    }
}
