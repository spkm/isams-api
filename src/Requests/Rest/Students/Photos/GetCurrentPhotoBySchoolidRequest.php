<?php

namespace spkm\IsamsApi\Requests\Rest\Students\Photos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetCurrentPhotoBySchoolidRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/students/{$this->schoolId}/photos/current";
    }

    /**
     * @param  string  $schoolId  The unique identifier of a student to retrieve the photo for.
     */
    public function __construct(
        protected string $schoolId,
    ) {}
}
