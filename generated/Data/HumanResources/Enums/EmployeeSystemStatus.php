<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources\Enums;

enum EmployeeSystemStatus: string
{
    case Former = 'Former';
    case Applicant = 'Applicant';
    case Current = 'Current';
    case Agency = 'Agency';
}
