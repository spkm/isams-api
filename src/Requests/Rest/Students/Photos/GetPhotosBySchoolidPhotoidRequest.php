<?php

namespace spkm\IsamsApi\Requests\Rest\Students\Photos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPhotosBySchoolidPhotoidRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/students/{$this->schoolId}/photos/{$this->photoId}";
    }

    /**
     * @param  string  $schoolId  The unique identifier of a student to retrieve the photo for.
     * @param  int  $photoId  The unique identifier of a student photo to retrieve.
     */
    public function __construct(
        protected string $schoolId,
        protected int $photoId,
    ) {}
}
