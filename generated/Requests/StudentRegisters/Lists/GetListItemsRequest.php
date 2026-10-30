<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\Lists;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\StudentRegisters\ListItem;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Returns the items in a private or shared list
 *
 * GET /api/registers/lists/{listId}/items
 */
class GetListItemsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ListItem::class;
    public string $resultKey = 'items';
    protected bool $cacheable = true;

    public function __construct(
        protected int $listId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/lists/'.rawurlencode((string) $this->listId).'/items';
    }
}
