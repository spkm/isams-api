<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources\Enums;

enum EmployeeTeachingProhibitionCheckForUpdateStatus: string
{
    case NotStarted = 'NotStarted';
    case InProgress = 'InProgress';
    case Passed = 'Passed';
    case Failed = 'Failed';
}
