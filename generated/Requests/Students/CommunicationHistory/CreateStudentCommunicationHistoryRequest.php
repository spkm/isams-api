<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\CommunicationHistory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\StudentCommunicationHistoryForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a new communications history entry for the specified student.
 *
 * POST /api/students/{schoolId}/communicationshistory
 */
class CreateStudentCommunicationHistoryRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentCommunicationHistoryForCreate|array<string, mixed>  $communicationHistory
     */
    public function __construct(
        protected string $schoolId,
        protected StudentCommunicationHistoryForCreate|array $communicationHistory,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/communicationshistory';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->communicationHistory instanceof Data ? $this->communicationHistory->toArray() : $this->communicationHistory;
    }
}
