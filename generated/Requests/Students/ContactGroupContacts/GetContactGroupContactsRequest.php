<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\ContactGroupContacts;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\ContactGroupContact;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all contacts associated with a contact group.
 *
 * GET /api/students/contactgroups/{contactGroupId}/contacts
 */
class GetContactGroupContactsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ContactGroupContact::class;
    public string $resultKey = 'contacts';

    public function __construct(
        protected int $contactGroupId,
        protected ?bool $includeDeceased = null,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/contactgroups/'.rawurlencode((string) $this->contactGroupId).'/contacts';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'includeDeceased' => $this->includeDeceased === null ? null : ($this->includeDeceased ? 'true' : 'false'),
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
