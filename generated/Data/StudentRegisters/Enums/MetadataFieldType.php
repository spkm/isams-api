<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\StudentRegisters\Enums;

enum MetadataFieldType: string
{
    case TextboxField = 'TextboxField';
    case DropdownField = 'DropdownField';
    case ListboxField = 'ListboxField';
    case NumericField = 'NumericField';
    case CheckboxField = 'CheckboxField';
    case CurrencyField = 'CurrencyField';
    case DateTimeField = 'DateTimeField';
    case ImageListField = 'ImageListField';
    case FileStoreField = 'FileStoreField';
    case ExternalComponent = 'ExternalComponent';
    case FieldGroup = 'FieldGroup';
    case RecordCollection = 'RecordCollection';
}
