<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources\Enums;

enum ExternalSystemIdEntityType: string
{
    case Class = 'Class';
    case Employee = 'Employee';
    case EmployeeAbsence = 'EmployeeAbsence';
    case GradebookColumn = 'GradebookColumn';
    case AssessmentComment = 'AssessmentComment';
    case GradebookStaff = 'GradebookStaff';
    case GradebookStudent = 'GradebookStudent';
    case GradebookAssessmentMark = 'GradebookAssessmentMark';
}
