<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\Gradebook;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Gradebook.
 *
 * GET /api/gradebooks/{gradebookId}
 */
#[Beta]
class GetGradebookRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Gradebook::class;

    public function __construct(
        protected int $gradebookId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId);
    }
}
