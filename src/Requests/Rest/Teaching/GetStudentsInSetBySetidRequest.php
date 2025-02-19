<?php

namespace spkm\IsamsApi\Requests\Rest\Teaching;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The 'students' property is an array of Student objects.
 */
class GetStudentsInSetBySetidRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/teaching/sets/{$this->setId}/setList";
    }

    /**
     * @param  int  $setId  The unique identifier of the teaching set to retrieve the student for.
     */
    public function __construct(
        protected int $setId,
    ) {}
}
