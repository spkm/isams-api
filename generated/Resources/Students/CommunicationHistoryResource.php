<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Students\StudentCommunicationHistoryForCreate;
use spkm\IsamsApi\Requests\Students\CommunicationHistory\CreateStudentCommunicationHistoryAttachmentsRequest;
use spkm\IsamsApi\Requests\Students\CommunicationHistory\CreateStudentCommunicationHistoryRequest;

class CommunicationHistoryResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentCommunicationHistoryForCreate|array<string, mixed>  $communicationHistory
     */
    public function createStudentCommunicationHistory(
        string $schoolId,
        StudentCommunicationHistoryForCreate|array $communicationHistory,
    ): Response {
        return $this->connector->send(new CreateStudentCommunicationHistoryRequest($schoolId, $communicationHistory));
    }

    public function createStudentCommunicationHistoryAttachments(
        int $id,
        string $schoolId,
        MultipartValue $attachment,
    ): Response {
        return $this->connector->send(new CreateStudentCommunicationHistoryAttachmentsRequest($id, $schoolId, $attachment));
    }
}
