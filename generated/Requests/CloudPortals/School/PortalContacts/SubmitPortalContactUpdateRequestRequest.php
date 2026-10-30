<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\PortalContacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\PortalContactUpdateRequestForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * POST /api/portals/account/contacts
 */
class SubmitPortalContactUpdateRequestRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Students\PortalContactUpdateRequestForCreate|array<string, mixed>  $request
     */
    public function __construct(
        protected PortalContactUpdateRequestForCreate|array $request,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/contacts';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->request instanceof Data ? $this->request->toArray() : $this->request;
    }
}
