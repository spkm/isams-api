<?php

namespace spkm\IsamsApi\Requests\Rest\Students\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * The 'contacts' property is an array of StudentsContact objects.
 */
class GetContactsRequest extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/students/contacts';
    }

    /**
     * @param  null|mixed  $page  The page number.
     * @param  null|mixed  $pageSize  The page size.
     * @param  null|mixed  $expand  Possible values:
     *
     * `countryIsoMappings` - include iso mappings for country.
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
        return array_filter(['page' => $this->page, 'pageSize' => $this->pageSize, 'expand' => $this->expand, '$filter' => $this->filter]);
    }
}
