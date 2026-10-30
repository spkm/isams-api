<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Contacts;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Admissions\Contact;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all contacts associated with an applicant.
 *
 * GET /api/admissions/applicants/{schoolId}/contacts
 */
class GetApplicantContactsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Contact::class;
    public string $resultKey = 'contacts';

    public function __construct(
        protected string $schoolId,
        protected ?bool $includeDeceased = null,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/contacts';
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
