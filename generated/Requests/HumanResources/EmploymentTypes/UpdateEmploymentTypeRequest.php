<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmploymentTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates an employment type.
 *
 * PUT /api/humanresources/employmenttypes/{id}
 */
class UpdateEmploymentTypeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function __construct(
        protected int $id,
        protected GlobalListItemForUpdate|array $listItem,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employmenttypes/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->listItem instanceof Data ? $this->listItem->toArray() : $this->listItem;
    }
}
