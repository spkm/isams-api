<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\QualificationSubjects;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a qualification subject.
 *
 * POST /api/humanresources/qualificationsubjects
 */
class CreateQualificationSubjectRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function __construct(
        protected GlobalListItemForCreate|array $globalListItem,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/qualificationsubjects';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->globalListItem instanceof Data ? $this->globalListItem->toArray() : $this->globalListItem;
    }
}
