<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Passports;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\StudentPassportForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a student passport.
 *
 * PUT /api/students/{schoolId}/passports/{id}
 */
class UpdateStudentPassportRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportForUpdate|array<string, mixed>  $studentPassport
     */
    public function __construct(
        protected string $schoolId,
        protected int $id,
        protected StudentPassportForUpdate|array $studentPassport,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/passports/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->studentPassport instanceof Data ? $this->studentPassport->toArray() : $this->studentPassport;
    }
}
