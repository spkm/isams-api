<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentNotes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalNote;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a medical note for a student.
 *
 * GET /api/medical/students/{schoolId}/notes/{noteId}
 */
class GetStudentNoteRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = MedicalNote::class;

    public function __construct(
        protected string $schoolId,
        protected string $noteId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/notes/'.rawurlencode((string) $this->noteId);
    }
}
