<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentBmi;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Bmi;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student's medical bmi.
 *
 * GET /api/medical/students/{schoolId}/bmi
 */
class GetStudentBmisRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Bmi::class;
    public string $resultKey = 'bmi';

    public function __construct(
        protected string $schoolId,
        protected ?bool $includeArchive = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/bmi';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'includeArchive' => $this->includeArchive === null ? null : ($this->includeArchive ? 'true' : 'false'),
        ], fn (mixed $value) => $value !== null);
    }
}
