<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Students\StudentCommunicationHistoryForCreate;
use spkm\IsamsApi\Requests\Students\CommunicationHistory\CreateStudentCommunicationHistoryAttachmentsRequest;
use spkm\IsamsApi\Requests\Students\CommunicationHistory\CreateStudentCommunicationHistoryRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CommunicationHistoryResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentCommunicationHistoryForCreate|array<string, mixed>  $studentCommunicationHistory
     * @see \spkm\IsamsApi\Requests\Students\CommunicationHistory\CreateStudentCommunicationHistoryRequest
     */
    public function create(
        string $schoolId,
        StudentCommunicationHistoryForCreate|array $studentCommunicationHistory,
    ): Created {
        return $this->fetch(new CreateStudentCommunicationHistoryRequest(schoolId: $schoolId, studentCommunicationHistory: $studentCommunicationHistory));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\CommunicationHistory\CreateStudentCommunicationHistoryAttachmentsRequest
     */
    public function createAttachments(string $schoolId, int $id, MultipartValue $attachment): Created
    {
        return $this->fetch(new CreateStudentCommunicationHistoryAttachmentsRequest(schoolId: $schoolId, id: $id, attachment: $attachment));
    }
}
