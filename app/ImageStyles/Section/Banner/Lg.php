<?php

namespace App\ImageStyles\Section\Banner;

use BalisMatz\ImageStyle\Attributes\ImageStyle;
use Intervention\Image\Interfaces\EncodedImageInterface;
use Intervention\Image\Interfaces\ImageInterface;

#[ImageStyle(help: 'Used in the banner section component.')]
class Lg extends BannerBase
{
    /**
     * {@inheritDoc}
     */
    public function modifications(ImageInterface $image, array $parameters): ImageInterface|EncodedImageInterface
    {
        return $image
            ->cover(1279, 500);
    }
}
