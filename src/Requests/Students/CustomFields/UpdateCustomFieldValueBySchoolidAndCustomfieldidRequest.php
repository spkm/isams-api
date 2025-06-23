<?php

namespace spkm\IsamsApi\Requests\Students\CustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    /**
     * @param  string  $schoolId  The unique identifier of a student to retrieve the custom fields for.
     * @param  int  $customFieldId  The identifier of a custom field associated with a student.
     * @param  string  $customFieldValue  The value to set for the custom field.
     */
    public function __construct(
        protected string $schoolId,
        protected int $customFieldId,
        protected string $customFieldValue,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/api/students/{$this->schoolId}/customFields/{$this->customFieldId}";
    }

    public function defaultQuery(): array
    {
        return [];
    }

    public function defaultBody(): array
    {
        return [
            'customFieldValue' => $this->customFieldValue,
        ];
    }
}
