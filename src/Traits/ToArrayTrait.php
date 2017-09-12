<?php

namespace Traits;

trait ToArrayTrait
{
    public function toArray()
    {
        return get_object_vars($this);
    }
}