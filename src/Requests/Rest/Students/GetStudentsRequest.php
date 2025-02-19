<?php

namespace spkm\IsamsApi\Requests\Rest\Students;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * The 'students' property is an array of Student objects.
 */
class GetStudentsRequest extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/students';
    }

    /**
     * @param  null|mixed  $page  Page number.
     * @param  null|mixed  $pageSize  Page size.
     * @param  null|mixed  $expand  Possible values:
     *
     * `customFields` - include student's custom fields.
     *
     * `languageIsoMappings` - include iso mappings for languages.
     *
     * `nationalityIsoMappings` - include iso mappings for nationalities.
     * @param  null|mixed  $filter  The filter to be applied to result set, in the style of OData V3.
     */
    public function __construct(
        protected mixed $page = null,
        protected mixed $pageSize = null,
        protected mixed $expand = null,
        protected mixed $filter = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page, 'pageSize' => $this->pageSize, 'expand' => $this->expand, '$filter' => $this->filter,
        ]);
    }
}
