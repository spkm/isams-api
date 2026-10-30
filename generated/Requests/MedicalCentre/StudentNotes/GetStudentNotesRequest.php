<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentNotes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\IMedicalNote;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student's medical notes.
 *
 * GET /api/medical/students/{schoolId}/notes
 */
class GetStudentNotesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = IMedicalNote::class;
    public string $resultKey = 'notes';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/notes';
    }
}
