<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;
use spkm\IsamsApi\Support\JsonPatch;

/**
 * Updates the GIRFEC form data.
 *
 * PATCH /api/wellbeing/students/{schoolId}/concerns/{concernId}/girfec
 */
class PatchConcernGirfecFormRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function __construct(
        protected string $schoolId,
        protected int $concernId,
        protected JsonPatch|array $patch,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/girfec';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->patch instanceof JsonPatch ? $this->patch->toArray() : $this->patch;
    }
}
