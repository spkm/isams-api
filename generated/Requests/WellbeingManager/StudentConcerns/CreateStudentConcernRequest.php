<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a concern.
 *
 * POST /api/wellbeing/students/{schoolId}/concerns
 */
class CreateStudentConcernRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernForCreate|array<string, mixed>  $concern
     */
    public function __construct(
        protected string $schoolId,
        protected ConcernForCreate|array $concern,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concern instanceof Data ? $this->concern->toArray() : $this->concern;
    }
}
