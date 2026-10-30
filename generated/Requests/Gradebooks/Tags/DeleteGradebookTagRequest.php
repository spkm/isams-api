<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\Tags;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Remove a tag from a Gradebook.
 *
 * DELETE /api/gradebooks/{gradebookId}/tags/categories/{categoryId}/entities/{categoryEntityId}
 */
#[Beta]
class DeleteGradebookTagRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $gradebookId,
        protected int $categoryId,
        protected int $categoryEntityId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/tags/categories/'.rawurlencode((string) $this->categoryId).'/entities/'.rawurlencode((string) $this->categoryEntityId);
    }
}
