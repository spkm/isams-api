<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\ListGroup;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListRuleForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a custom global list group.
 *
 * POST /api/systemconfiguration/listgroup/custom
 */
class CreateCustomListGroupRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListRuleForCreate|array<string, mixed>  $globalListGroup
     */
    public function __construct(
        protected GlobalListRuleForCreate|array $globalListGroup,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/listgroup/custom';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->globalListGroup instanceof Data ? $this->globalListGroup->toArray() : $this->globalListGroup;
    }
}
