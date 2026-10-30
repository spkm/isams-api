<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Contacts;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Data\Students\StudentsContact;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all current students' contacts.
 *
 * GET /api/students/contacts
 */
class GetAllStudentContactsRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentsContact::class;
    public string $resultKey = 'contacts';

    public function __construct(
        protected ?int $page = null,
        protected ?int $pageSize = null,
        protected ?string $expand = null,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/contacts';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'pageSize' => $this->pageSize,
            'expand' => $this->expand,
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
