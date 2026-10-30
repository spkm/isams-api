<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks\Enums;

enum CalculationColumnStructureForCreateShareable: string
{
    case NotShared = 'NotShared';
    case SharedAsEditable = 'SharedAsEditable';
    case SharedAsReadOnly = 'SharedAsReadOnly';
}
