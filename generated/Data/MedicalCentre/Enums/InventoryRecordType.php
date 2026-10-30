<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre\Enums;

enum InventoryRecordType: string
{
    case BMI = 'BMI';
    case Condition = 'Condition';
    case Visit = 'Visit';
    case Note = 'Note';
    case Consent = 'Consent';
    case Document = 'Document';
    case Medication = 'Medication';
    case Vaccination = 'Vaccination';
    case Inventory = 'Inventory';
}
