<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\PortalsForms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\Form;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/school/forms
 */
class GetPortalsFormsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Form::class;
    public string $resultKey = 'forms';

    public function resolveEndpoint(): string
    {
        return '/api/portals/school/forms';
    }
}
