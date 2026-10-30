<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Teaching\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a curriculum subject code.
 *
 * PUT /api/teaching/curriculumsubjectcodes/{id}
 */
class UpdateCurriculumSubjectCodeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function __construct(
        protected int $id,
        protected GlobalListItemForUpdate|array $listItem,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/teaching/curriculumsubjectcodes/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->listItem instanceof Data ? $this->listItem->toArray() : $this->listItem;
    }
}
