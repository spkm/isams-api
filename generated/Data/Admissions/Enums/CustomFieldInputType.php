<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Admissions\Enums;

enum CustomFieldInputType: string
{
    case Unspecified = 'Unspecified';
    case Boolean = 'Boolean';
    case Date = 'Date';
    case List = 'List';
    case Multiple = 'Multiple';
    case Text = 'Text';
    case TextArea = 'TextArea';
}
