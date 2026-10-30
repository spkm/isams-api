<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasStringBody;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * POST /api/portals/leaverequests/{id}/commands/cancel
 */
class CancelLeaveRequestRequest extends IsamsRequest implements HasBody
{
    use HasStringBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected int $id,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/leaverequests/'.rawurlencode((string) $this->id).'/commands/cancel';
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return ['Content-Type' => 'application/json'];
    }

    protected function defaultBody(): string
    {
        return (string) json_encode($this->schoolId);
    }
}
