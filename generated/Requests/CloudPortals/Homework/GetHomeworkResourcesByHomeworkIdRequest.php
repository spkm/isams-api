<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Homework;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Homework\Resource;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves collection of homework resources by homework Id.
 *
 * GET /api/portal/homework/{homeworkId}/resources
 */
class GetHomeworkResourcesByHomeworkIdRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Resource::class;
    public string $resultKey = 'resources';

    public function __construct(
        protected int $homeworkId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portal/homework/'.rawurlencode((string) $this->homeworkId).'/resources';
    }
}
