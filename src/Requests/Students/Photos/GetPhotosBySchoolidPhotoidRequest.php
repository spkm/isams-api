<?php

namespace spkm\IsamsApi\Requests\Students\Photos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @deprecated Use \spkm\IsamsApi\Requests\Students\Photos\GetStudentPhotoRequest instead.
 */
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
