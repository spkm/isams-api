<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentConditions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Condition;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student's medical conditions.
 *
 * GET /api/medical/students/{schoolId}/conditions
 */
class GetStudentConditionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Condition::class;
    public string $resultKey = 'conditions';

    public function __construct(
        protected string $schoolId,
        protected ?bool $includeArchive = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/conditions';
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
