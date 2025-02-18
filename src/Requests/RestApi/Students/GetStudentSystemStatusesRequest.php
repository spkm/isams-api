<?php

namespace spkm\IsamsApi\Requests\RestApi\Students;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'systemStatuses' property is an array of StudentSystemStatus objects.
 */
class GetStudentSystemStatusesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/students/systemstatuses';
    }
}
