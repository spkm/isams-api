<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentNotes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\MedicalNoteForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a medical note for a student.
 *
 * POST /api/medical/students/{schoolId}/notes
 */
class CreateStudentNoteRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\MedicalNoteForCreate|array<string, mixed>  $medicalNote
     */
    public function __construct(
        protected string $schoolId,
        protected MedicalNoteForCreate|array $medicalNote,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/notes';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->medicalNote instanceof Data ? $this->medicalNote->toArray() : $this->medicalNote;
    }
}
