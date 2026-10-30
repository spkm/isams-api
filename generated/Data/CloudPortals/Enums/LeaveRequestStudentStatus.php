<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals\Enums;

enum LeaveRequestStudentStatus: string
{
    case Pending = 'Pending';
    case Rejected = 'Rejected';
    case Accepted = 'Accepted';
    case Cancelled = 'Cancelled';
    case AwaitingCancelation = 'AwaitingCancelation';
}
