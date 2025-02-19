<?php

namespace spkm\IsamsApi\Requests\Rest\Students\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'contacts' property is an array of StudentContact objects.
 */
class GetContactsBySchoolidRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/students/{$this->schoolId}/contacts";
    }

    /**
     * @param  string  $schoolId  The unique identifier of a student to retrieve the contacts for.
     * @param  bool  $includeDeceased  Specifies if deceased contacts should be included.
     * @param  null|mixed  $expand  Possible values:
     *
     * `customFields` - include student contact's custom fields.
     * @param  null|mixed  $filter  The filter to be applied to result set, in the style of OData V3.
     */
    public function __construct(
        protected string $schoolId,
        protected bool $includeDeceased = false,
        protected mixed $expand = null,
        protected mixed $filter = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['includeDeceased' => $this->includeDeceased, 'expand' => $this->expand, '$filter' => $this->filter]);
    }
}
