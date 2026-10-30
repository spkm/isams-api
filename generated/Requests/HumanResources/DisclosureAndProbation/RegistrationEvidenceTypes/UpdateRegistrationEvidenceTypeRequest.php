<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a registration evidence type.
 *
 * PUT /api/humanresources/disclosureandprobation/registrationevidencetypes/{id}
 */
class UpdateRegistrationEvidenceTypeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function __construct(
        protected int $id,
        protected GlobalListItemForUpdate|array $globalListItem,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/disclosureandprobation/registrationevidencetypes/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->globalListItem instanceof Data ? $this->globalListItem->toArray() : $this->globalListItem;
    }
}
