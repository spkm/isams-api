<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\NatureOfAbsence;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Registration\NatureOfAbsence;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get all registration nature of absences based on search parameters.
 *
 * GET /api/registration/natureofabsence
 */
#[Beta]
class GetRegistrationNatureOfAbsencesRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = NatureOfAbsence::class;
    public string $resultKey = 'natureOfAbsences';

    public function __construct(
        protected \DateTimeInterface|string|null $registrationFrom = null,
        protected \DateTimeInterface|string|null $registrationTo = null,
        protected ?string $code = null,
        protected ?bool $onlyEmptyNatureOfAbsence = null,
        protected ?string $orderBy = null,
        protected ?int $page = null,
        protected ?int $pageSize = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/natureofabsence';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'registrationFrom' => $this->registrationFrom instanceof \DateTimeInterface ? $this->registrationFrom->format('Y-m-d\TH:i:s') : $this->registrationFrom,
            'registrationTo' => $this->registrationTo instanceof \DateTimeInterface ? $this->registrationTo->format('Y-m-d\TH:i:s') : $this->registrationTo,
            'code' => $this->code,
            'onlyEmptyNatureOfAbsence' => $this->onlyEmptyNatureOfAbsence === null ? null : ($this->onlyEmptyNatureOfAbsence ? 'true' : 'false'),
            'orderBy' => $this->orderBy,
            'page' => $this->page,
            'pageSize' => $this->pageSize,
        ], fn (mixed $value) => $value !== null);
    }
}
