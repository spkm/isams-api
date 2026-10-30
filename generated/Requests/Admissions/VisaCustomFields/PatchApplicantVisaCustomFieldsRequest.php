<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\VisaCustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates the value of a custom field associated with an applicant visa.
 *
 * PATCH /api/admissions/applicants/{schoolId}/customfields/visa/{visaId}
 */
#[Beta]
class PatchApplicantVisaCustomFieldsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $listCustomField
     */
    public function __construct(
        protected string $schoolId,
        protected int $visaId,
        protected array $listCustomField,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/customfields/visa/'.rawurlencode((string) $this->visaId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return array_map(fn (mixed $item) => $item instanceof Data ? $item->toArray() : $item, $this->listCustomField);
    }
}
