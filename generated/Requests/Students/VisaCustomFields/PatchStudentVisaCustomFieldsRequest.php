<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\VisaCustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates the value of a custom field associated with a student visa.
 *
 * PATCH /api/students/{schoolId}/customfields/visa/{visaId}
 */
#[Beta]
class PatchStudentVisaCustomFieldsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  array<int, \spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function __construct(
        protected string $schoolId,
        protected int $visaId,
        protected array $customFields,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/customfields/visa/'.rawurlencode((string) $this->visaId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return array_values(array_map(fn (mixed $item) => $item instanceof Data ? $item->toArray() : $item, $this->customFields));
    }
}
