<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\Characteristics;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates characteristics for a Gradebook.
 *
 * POST /api/gradebooks/{gradebookId}/characteristics
 */
#[Beta]
class CreateGradebookCharacteristicsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<mixed>  $characteristics
     */
    public function __construct(
        protected int $gradebookId,
        protected array $characteristics,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/characteristics';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->characteristics;
    }
}
