<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\ListGroup;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an item for a custom global list group.
 *
 * POST /api/systemconfiguration/listgroup/custom/{listType}
 */
class CreateCustomListGroupItemRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function __construct(
        protected string $listType,
        protected GlobalListItemForCreate|array $globalListItem,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/listgroup/custom/'.rawurlencode((string) $this->listType);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->globalListItem instanceof Data ? $this->globalListItem->toArray() : $this->globalListItem;
    }
}
