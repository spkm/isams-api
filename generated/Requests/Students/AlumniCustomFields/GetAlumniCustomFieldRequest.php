<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\AlumniCustomFields;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Students\CustomField;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a single custom field for an alumni by custom field id.
 *
 * GET /api/alumni/{schoolId}/customFields/{customFieldId}
 */
#[Beta]
class GetAlumniCustomFieldRequest extends IsamsRequest
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
        return '/api/alumni/'.rawurlencode((string) $this->schoolId).'/customFields/'.rawurlencode((string) $this->customFieldId);
    }
}
