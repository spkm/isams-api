<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\BoardingStatuses;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a boarding status.
 *
 * PUT /api/students/boardingstatuses/{id}
 */
class UpdateBoardingStatusRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Students\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function __construct(
        protected int $id,
        protected GlobalListItemForUpdate|array $globalListItem,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/boardingstatuses/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->globalListItem instanceof Data ? $this->globalListItem->toArray() : $this->globalListItem;
    }
}
