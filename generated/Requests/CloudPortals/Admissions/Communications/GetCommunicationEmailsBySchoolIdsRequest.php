<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\Communications;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Admissions\AdmissionsCommunicationMessage;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all email message history.
 *
 * GET /api/portals/admissions/communications/email
 */
class GetCommunicationEmailsBySchoolIdsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = AdmissionsCommunicationMessage::class;

    /**
     * @param  array<mixed>|null  $schoolIds
     */
    public function __construct(
        protected ?array $schoolIds = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/communications/email';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'schoolIds' => $this->schoolIds,
        ], fn (mixed $value) => $value !== null);
    }
}
