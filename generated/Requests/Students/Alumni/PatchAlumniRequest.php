<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Alumni;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;
use spkm\IsamsApi\Support\JsonPatch;

/**
 * Updates an alumnus/alumna.
 *
 * PATCH /api/alumni/{schoolId}
 */
class PatchAlumniRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function __construct(
        protected string $schoolId,
        protected JsonPatch|array $patch,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/alumni/'.rawurlencode((string) $this->schoolId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->patch instanceof JsonPatch ? $this->patch->toArray() : $this->patch;
    }
}
