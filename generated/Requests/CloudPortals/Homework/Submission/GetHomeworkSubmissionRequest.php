<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Homework\Submission;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Homework\Submission;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Gets a student's homework submission entry status.
 *
 * GET /api/portal/homework/{homeworkId}/students/{schoolId}/submission
 */
class GetHomeworkSubmissionRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Submission::class;

    public function __construct(
        protected int $homeworkId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portal/homework/'.rawurlencode((string) $this->homeworkId).'/students/'.rawurlencode((string) $this->schoolId).'/submission';
    }
}
