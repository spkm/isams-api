<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Flag;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\PastoralFlagForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a pastoral flag for a student.
 *
 * POST /api/wellbeing/students/{schoolId}/flag
 */
class CreateStudentFlagRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\PastoralFlagForCreate|array<string, mixed>  $pastoralFlag
     */
    public function __construct(
        protected string $schoolId,
        protected PastoralFlagForCreate|array $pastoralFlag,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/flag';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->pastoralFlag instanceof Data ? $this->pastoralFlag->toArray() : $this->pastoralFlag;
    }
}
