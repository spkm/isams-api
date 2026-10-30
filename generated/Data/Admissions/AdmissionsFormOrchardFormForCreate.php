<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class AdmissionsFormOrchardFormForCreate extends Data
{
    protected const LISTS = ['fields' => AdmissionsFormOrchardFormFormDataForCreate::class];

    /**
     * @param  Collection<int, AdmissionsFormOrchardFormFormDataForCreate>|null  $fields
     */
    public function __construct(
        public ?string $captchaToken = null,
        public ?bool $cloudPortals = null,
        public ?Collection $fields = null,
        public ?string $form = null,
        public ?int $formInstanceType = null,
        public ?bool $guestUser = null,
        public ?string $processId = null,
        public ?string $studentId = null,
        public ?int $workflowId = null,
    ) {
    }
}
