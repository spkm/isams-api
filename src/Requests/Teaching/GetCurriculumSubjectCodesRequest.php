<?php

namespace spkm\IsamsApi\Requests\Teaching;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'items' property is an array of GlobalListItem objects.
 */
class GetCurriculumSubjectCodesRequest extends Request
{
    protected Method $method = Method::GET;
    public string $resultKey = 'items';


    public function resolveEndpoint(): string
    {
        return '/api/teaching/curriculumsubjectcodes';
    }
}
