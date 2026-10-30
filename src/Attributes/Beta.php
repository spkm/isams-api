<?php

namespace spkm\IsamsApi\Attributes;

use Attribute;

/**
 * iSAMS marks this endpoint as Beta, so it may change without notice.
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class Beta {}
