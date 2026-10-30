<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters\Enums;

enum RegisterWorkflow: string
{
    case None = 'None';
    case Register = 'Register';
    case RegisterWithRanges = 'RegisterWithRanges';
}
