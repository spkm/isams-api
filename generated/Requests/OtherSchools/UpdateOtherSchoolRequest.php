<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\OtherSchools;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\OtherSchools\OtherSchoolForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a school.
 *
 * PUT /api/otherschools/{id}
 */
class UpdateOtherSchoolRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\OtherSchools\OtherSchoolForUpdate|array<string, mixed>  $otherSchool
     */
    public function __construct(
        protected int $id,
        protected OtherSchoolForUpdate|array $otherSchool,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/otherschools/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->otherSchool instanceof Data ? $this->otherSchool->toArray() : $this->otherSchool;
    }
}
