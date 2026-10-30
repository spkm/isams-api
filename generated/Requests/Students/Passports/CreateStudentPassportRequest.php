<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Passports;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\StudentPassportForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a student passport.
 *
 * POST /api/students/{schoolId}/passports
 */
class CreateStudentPassportRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportForCreate|array<string, mixed>  $passport
     */
    public function __construct(
        protected string $schoolId,
        protected StudentPassportForCreate|array $passport,
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
        return $this->passport instanceof Data ? $this->passport->toArray() : $this->passport;
    }
}
