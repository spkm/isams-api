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
     * @param  \spkm\IsamsApi\Data\Students\StudentCommunicationHistoryForCreate|array<string, mixed>  $studentCommunicationHistory
     */
    public function create(
        string $schoolId,
        StudentCommunicationHistoryForCreate|array $studentCommunicationHistory,
    ): Response {
        return $this->connector->send(new CreateStudentCommunicationHistoryRequest($schoolId, $studentCommunicationHistory));
    }

    public function createAttachments(string $schoolId, int $id, MultipartValue $attachment): Response
    {
        return $this->connector->send(new CreateStudentCommunicationHistoryAttachmentsRequest($schoolId, $id, $attachment));
    }
}
