<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\SystemStatuses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\StudentSystemStatus;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all student system statuses.
 *
 * GET /api/students/systemstatuses
 */
class GetStudentSystemStatusesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentSystemStatus::class;
    public string $resultKey = 'systemStatuses';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/students/systemstatuses';
    }
}
