<?php

namespace spkm\IsamsApi\Requests\Teaching;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetSubjectByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/teaching/subjects/{$this->id}";
    }

    /**
     * @param  int  $id  The unique identifier of a subject to retrieve.
     */
    public function __construct(
        protected int $id,
    ) {}
}
