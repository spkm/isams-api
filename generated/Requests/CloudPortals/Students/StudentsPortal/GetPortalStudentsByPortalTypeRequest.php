<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Students\StudentsPortal;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\PrivateStudent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/portal/{portalType}/{divisionIdsCommaSeparated}
 */
class GetPortalStudentsByPortalTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PrivateStudent::class;
    public string $resultKey = 'students';

    public function __construct(
        protected string $portalType,
        protected string $divisionIdsCommaSeparated,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/portal/'.rawurlencode((string) $this->portalType).'/'.rawurlencode((string) $this->divisionIdsCommaSeparated);
    }
}
