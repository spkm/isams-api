<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\Marks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\MarkCollectionForPatch;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Used to bulk update student marks against a Gradebook.
 *
 * PATCH /api/gradebooks/{gradebookId}/marks
 */
#[Beta]
class UpdateGradebookMarksRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\MarkCollectionForPatch|array<string, mixed>  $markCollection
     */
    public function __construct(
        protected int $gradebookId,
        protected MarkCollectionForPatch|array $markCollection,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/marks';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->markCollection instanceof Data ? $this->markCollection->toArray() : $this->markCollection;
    }
}
