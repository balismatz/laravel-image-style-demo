<?php

namespace App\ImageStyles\Section\Banner;

use BalisMatz\ImageStyle\ImageStyleBase;

abstract class BannerBase extends ImageStyleBase
{
    /**
     * {@inheritDoc}
     */
    public function quality(array $parameters): int
    {
        return 50;
    }
}
