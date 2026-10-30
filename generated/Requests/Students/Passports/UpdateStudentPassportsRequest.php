<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Passports;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates student passports.
 *
 * PUT /api/students/{schoolId}/passports
 */
class UpdateStudentPassportsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  array<int, \spkm\IsamsApi\Data\Students\StudentPassportForUpdate|array<string, mixed>>  $studentPassports
     */
    public function __construct(
        protected string $schoolId,
        protected array $studentPassports,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/passports';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return array_values(array_map(fn (mixed $item) => $item instanceof Data ? $item->toArray() : $item, $this->studentPassports));
    }
}
