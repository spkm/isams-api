<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\QualificationTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a qualification type.
 *
 * POST /api/humanresources/qualificationtypes
 */
class CreateQualificationTypeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function __construct(
        protected GlobalListItemForCreate|array $listItem,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/qualificationtypes';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->listItem instanceof Data ? $this->listItem->toArray() : $this->listItem;
    }
}
