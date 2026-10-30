<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeePhotos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Uploads a new photo for an employee.
 *
 * POST /api/humanresources/employees/{employeeId}/photos
 */
class CreateEmployeePhotoRequest extends IsamsRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected int $employeeId,
        protected MultipartValue $photo,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/photos';
    }

    /**
     * @return list<MultipartValue>
     */
    protected function defaultBody(): array
    {
        return [new MultipartValue('photo', $this->photo->value, $this->photo->filename, $this->photo->headers)];
    }
}
