<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Homework\Enums;

enum StudentHomeworkSubmissionStatus: string
{
    case Pending = 'Pending';
    case Submitted = 'Submitted';
    case Completed = 'Completed';
}
