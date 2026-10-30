<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Contacts;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\StudentContact;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all contacts associated with a student.
 *
 * GET /api/students/{schoolId}/contacts
 */
class GetStudentContactsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentContact::class;
    public string $resultKey = 'contacts';

    public function __construct(
        protected string $schoolId,
        protected ?bool $includeDeceased = null,
        protected ?string $expand = null,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/contacts';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'includeDeceased' => $this->includeDeceased === null ? null : ($this->includeDeceased ? 'true' : 'false'),
            'expand' => $this->expand,
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
