<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks\Enums;

enum CalculationColumnStructureCalculationRoundingType: string
{
    case ToGivenDecimal = 'ToGivenDecimal';
    case ToGivenMultiple = 'ToGivenMultiple';
    case TruncatedToGivenDecimal = 'TruncatedToGivenDecimal';
}
