<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernGirfecFormForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Create the GIRFEC form data.
 *
 * POST /api/wellbeing/students/{schoolId}/concerns/{concernId}/girfec
 */
class CreateConcernGirfecFormRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernGirfecFormForCreate|array<string, mixed>  $form
     */
    public function __construct(
        protected string $schoolId,
        protected int $concernId,
        protected ConcernGirfecFormForCreate|array $form,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/girfec';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->form instanceof Data ? $this->form->toArray() : $this->form;
    }
}
