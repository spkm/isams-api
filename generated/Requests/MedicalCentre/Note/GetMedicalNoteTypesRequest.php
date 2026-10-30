<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Note;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\NoteType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Note Types.
 *
 * GET /api/medical/notetypes
 */
class GetMedicalNoteTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = NoteType::class;
    public string $resultKey = 'noteTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/notetypes';
    }
}
