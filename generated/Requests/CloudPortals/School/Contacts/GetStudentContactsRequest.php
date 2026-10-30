<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Contacts;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\PortalStudentContact;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/account/students/{schoolId}/contacts
 */
class GetStudentContactsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PortalStudentContact::class;
    public string $resultKey = 'contacts';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/students/'.rawurlencode((string) $this->schoolId).'/contacts';
    }
}
