<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\StudentRegisters\FieldCollection;
use spkm\IsamsApi\Data\StudentRegisters\StudentFields;
use spkm\IsamsApi\Requests\StudentRegisters\Fields\GetFieldsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\Fields\GetStudentFieldsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\Fields\PatchStudentFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class FieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\StudentRegisters\StudentFields>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\Fields\GetFieldsRequest
     */
    public function all(int $registerId, ?string $systemStatus = null): LazyCollection
    {
        return $this->each(new GetFieldsRequest(registerId: $registerId, systemStatus: $systemStatus), StudentFields::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\StudentRegisters\Fields\GetStudentFieldsRequest
     */
    public function forStudent(int $registerId, string $schoolId): ?FieldCollection
    {
        return $this->fetch(new GetStudentFieldsRequest(registerId: $registerId, schoolId: $schoolId));
    }

    /**
     * @param  array<mixed>  $values
     * @see \spkm\IsamsApi\Requests\StudentRegisters\Fields\PatchStudentFieldsRequest
     */
    public function patchMany(int $registerId, string $schoolId, array $values): bool
    {
        $this->fetch(new PatchStudentFieldsRequest(registerId: $registerId, schoolId: $schoolId, values: $values));

        return true;
    }
}
