<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\GradebookForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a Gradebook.
 *
 * POST /api/gradebooks
 */
#[Beta]
class CreateGradebookRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\GradebookForCreate|array<string, mixed>  $gradebook
     */
    public function __construct(
        protected GradebookForCreate|array $gradebook,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->gradebook instanceof Data ? $this->gradebook->toArray() : $this->gradebook;
    }
}
