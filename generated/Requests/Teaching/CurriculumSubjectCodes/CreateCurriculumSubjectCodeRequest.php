<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Teaching\GlobalListItemForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a curriculum subject code.
 *
 * POST /api/teaching/curriculumsubjectcodes
 */
class CreateCurriculumSubjectCodeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function __construct(
        protected GlobalListItemForCreate|array $listItem,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/teaching/curriculumsubjectcodes';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->listItem instanceof Data ? $this->listItem->toArray() : $this->listItem;
    }
}
