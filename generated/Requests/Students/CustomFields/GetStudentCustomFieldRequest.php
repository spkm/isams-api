<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\CustomFields;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\CustomField;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a single custom field for a student by custom field id.
 *
 * GET /api/students/{schoolId}/customFields/{customFieldId}
 */
class GetStudentCustomFieldRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = CustomField::class;
    public string $resultKey = 'customFields';

    public function __construct(
        protected string $schoolId,
        protected int $customFieldId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/customFields/'.rawurlencode((string) $this->customFieldId);
    }
}
