<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Homework;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Downloads a homework document resource.
 *
 * GET /api/portal/homework/{homeworkId}/resources/{resourceId}/document
 */
class DownloadHomeworkRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected int $homeworkId,
        protected int $resourceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portal/homework/'.rawurlencode((string) $this->homeworkId).'/resources/'.rawurlencode((string) $this->resourceId).'/document';
    }
}
