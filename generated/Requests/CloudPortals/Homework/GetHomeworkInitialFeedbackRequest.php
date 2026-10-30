<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Homework;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Homework\SubmissionFeedback;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves feedback entry for a student's submitted homework
 *
 * GET /api/portal/homework/{homeworkId}/feedback/{schoolId}
 */
class GetHomeworkInitialFeedbackRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = SubmissionFeedback::class;
    public string $resultKey = 'submissionFeedback';

    public function __construct(
        protected int $homeworkId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portal/homework/'.rawurlencode((string) $this->homeworkId).'/feedback/'.rawurlencode((string) $this->schoolId);
    }
}
