<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration\Enums;

enum StudentSelfRegistrationRegisterPeriodStatus: string
{
    case AvailableToRegister = 'AvailableToRegister';
    case NotAvailableToRegister = 'NotAvailableToRegister';
    case MarkedByTeacher = 'MarkedByTeacher';
    case MarkedByStudent = 'MarkedByStudent';
    case Absent = 'Absent';
}
