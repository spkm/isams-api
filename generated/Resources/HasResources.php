<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

trait HasResources
{
    public function estates(): EstatesResource
    {
        return new EstatesResource($this);
    }

    public function school(): SchoolResource
    {
        return new SchoolResource($this);
    }

    public function students(): StudentsResource
    {
        return new StudentsResource($this);
    }

    public function teaching(): TeachingResource
    {
        return new TeachingResource($this);
    }

    public function timetable(): TimetableResource
    {
        return new TimetableResource($this);
    }
}
