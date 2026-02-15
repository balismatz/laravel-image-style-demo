<?php

namespace App\ImageStyles\Post\Show;

use BalisMatz\ImageStyle\Attributes\ImageStyle;
use BalisMatz\ImageStyle\ImageStyleBase;
use Intervention\Image\Interfaces\EncodedImageInterface;
use Intervention\Image\Interfaces\ImageInterface;

#[ImageStyle(help: 'Used in the post show view.')]
class Lg extends ImageStyleBase
{
    /**
     * {@inheritDoc}
     */
    public function modifications(ImageInterface $image, array $parameters): ImageInterface|EncodedImageInterface
    {
        return $image
            ->cover(384, 544);
    }
}
