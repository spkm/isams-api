<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Integrations\Enums;

enum DocumentSignerSigningTabType: string
{
    case Signature = 'Signature';
    case Date = 'Date';
    case Initials = 'Initials';
}
