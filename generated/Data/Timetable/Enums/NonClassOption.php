<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable\Enums;

enum NonClassOption: string
{
    case DoNotImport = 'DoNotImport';
    case ImportAsSets = 'ImportAsSets';
    case ImportAsAvailability = 'ImportAsAvailability';
}
