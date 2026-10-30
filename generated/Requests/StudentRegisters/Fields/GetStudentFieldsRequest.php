<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\Fields;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\StudentRegisters\FieldCollection;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Returns field values for a register and student.
 *
 * GET /api/registers/{registerId}/students/{schoolId}/fields
 */
class GetStudentFieldsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = FieldCollection::class;

    public function __construct(
        protected int $registerId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/fields';
    }
}
