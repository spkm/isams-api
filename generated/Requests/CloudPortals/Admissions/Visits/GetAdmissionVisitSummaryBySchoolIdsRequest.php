<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\Visits;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Admissions\AdmissionsVisitSummary;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves current visits.
 *
 * GET /api/portals/admissions/visits/GetAdmissionVisitSummaryBySchoolIds
 */
class GetAdmissionVisitSummaryBySchoolIdsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = AdmissionsVisitSummary::class;

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function __construct(
        protected ?array $schoolIds = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/visits/GetAdmissionVisitSummaryBySchoolIds';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'schoolIds' => $this->schoolIds,
        ], fn (mixed $value) => $value !== null);
    }
}
