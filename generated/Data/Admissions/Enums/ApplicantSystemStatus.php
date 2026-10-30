<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions\Enums;

enum ApplicantSystemStatus: string
{
    case Former = 'Former';
    case Applicant = 'Applicant';
    case Current = 'Current';
    case ExternalExamCandidate = 'ExternalExamCandidate';
    case BlankPupil = 'BlankPupil';
    case ReAdmission = 'ReAdmission';
}
