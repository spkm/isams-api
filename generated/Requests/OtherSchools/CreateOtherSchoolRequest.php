<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\OtherSchools;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\OtherSchools\OtherSchoolForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a school .
 *
 * POST /api/otherschools
 */
class CreateOtherSchoolRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\OtherSchools\OtherSchoolForCreate|array<string, mixed>  $otherSchool
     */
    public function __construct(
        protected OtherSchoolForCreate|array $otherSchool,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/otherschools';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->otherSchool instanceof Data ? $this->otherSchool->toArray() : $this->otherSchool;
    }
}
