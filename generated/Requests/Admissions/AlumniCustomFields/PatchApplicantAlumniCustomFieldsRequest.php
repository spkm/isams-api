<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\AlumniCustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates the values of custom fields associated with an alumni.
 *
 * PATCH /api/admissions/applicants/alumni/{schoolId}/customFields
 */
#[Beta]
class PatchApplicantAlumniCustomFieldsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function __construct(
        protected string $schoolId,
        protected array $customFields,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/alumni/'.rawurlencode((string) $this->schoolId).'/customFields';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return array_map(fn (mixed $item) => $item instanceof Data ? $item->toArray() : $item, $this->customFields);
    }
}
