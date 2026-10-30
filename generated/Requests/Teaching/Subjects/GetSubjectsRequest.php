<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\Subjects;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Teaching\Subject;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all subjects.
 *
 * GET /api/teaching/subjects
 */
class GetSubjectsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Subject::class;
    public string $resultKey = 'subjects';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/teaching/subjects';
    }
}
