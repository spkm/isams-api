<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\List\Universities;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\SystemConfiguration\UniversityForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a university.
 *
 * POST /api/systemconfiguration/list/universities
 */
class CreateUniversityRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\UniversityForCreate|array<string, mixed>  $university
     */
    public function __construct(
        protected UniversityForCreate|array $university,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/list/universities';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->university instanceof Data ? $this->university->toArray() : $this->university;
    }
}
