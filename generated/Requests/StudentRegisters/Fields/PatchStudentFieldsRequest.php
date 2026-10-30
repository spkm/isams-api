<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\Fields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates field values for a register and student.
 *
 * PATCH /api/registers/{registerId}/students/{schoolId}/fields
 */
class PatchStudentFieldsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>  $values
     */
    public function __construct(
        protected int $registerId,
        protected string $schoolId,
        protected array $values,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/fields';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->values;
    }
}
