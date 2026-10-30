<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\RewardsAndConduct;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\RewardsAndConduct\Enums\ModuleTypeConfiguration;

readonly class ModuleType extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?IActivityPermission $activityPermissions = null,
        public ?bool $allowArea = null,
        public ?bool $allowDepartment = null,
        public ?bool $allowDescription = null,
        public ?bool $allowGrid = null,
        public ?bool $allowReason = null,
        public ?bool $allowSubject = null,
        public ?string $code = null,
        public ?string $configuration = null,
        public ?bool $departmentRequired = null,
        public ?string $description = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $name = null,
        public ?int $ordinal = null,
        public ?string $singularName = null,
        public ?bool $subjectRequired = null,
        public ?bool $useFields = null,
        public ?bool $useResolved = null,
        public ?bool $useWizard = null,
        public ?string $wizardBarText = null,
    ) {
    }

    public function configurationEnum(): ?ModuleTypeConfiguration
    {
        return ModuleTypeConfiguration::tryFrom((string) $this->configuration);
    }
}
