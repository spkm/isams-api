<?php

namespace spkm\IsamsApi\Requests\Students\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'customFields' property is an array of CustomField objects.
 */
class GetCustomFieldsBySchoolidRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/students/{$this->schoolId}/customFields";
    }

    /**
     * @param  string  $schoolId  The unique identifier of a student to retrieve the custom fields for.
     * @param  null|mixed  $filter  The filter to be applied to result set, in the style of OData V3.
     */
    public function __construct(
        protected string $schoolId,
        protected mixed $filter = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['$filter' => $this->filter]);
    }
}
