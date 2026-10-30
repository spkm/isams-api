<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\Forms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\Form;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all forms.
 *
 * GET /api/school/forms
 */
class GetFormsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Form::class;
    public string $resultKey = 'forms';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/school/forms';
    }
}
