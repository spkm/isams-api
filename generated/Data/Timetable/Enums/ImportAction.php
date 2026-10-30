<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable\Enums;

enum ImportAction: string
{
    case New = 'New';
    case Merge = 'Merge';
    case Overwrite = 'Overwrite';
}
