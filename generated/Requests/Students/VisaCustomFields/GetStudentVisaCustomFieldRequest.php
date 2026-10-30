<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\VisaCustomFields;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Students\CustomField;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a single custom field for a student visa by custom field id.
 *
 * GET /api/students/{schoolId}/customfields/visa/{visaId}/{customFieldId}
 */
#[Beta]
class GetStudentVisaCustomFieldRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = CustomField::class;
    public string $resultKey = 'customFields';

    public function __construct(
        protected string $schoolId,
        protected int $visaId,
        protected int $customFieldId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/customfields/visa/'.rawurlencode((string) $this->visaId).'/'.rawurlencode((string) $this->customFieldId);
    }
}
