<?php

namespace App\ImageStyles\Post\Card;

use BalisMatz\ImageStyle\Attributes\ImageStyle;
use BalisMatz\ImageStyle\ImageStyleBase;
use Intervention\Image\Interfaces\EncodedImageInterface;
use Intervention\Image\Interfaces\ImageInterface;

#[ImageStyle(help: 'Used in the post card component.')]
class Sm extends ImageStyleBase
{
    /**
     * {@inheritDoc}
     */
    public function modifications(ImageInterface $image, array $parameters): ImageInterface|EncodedImageInterface
    {
        return $image
            ->cover(720, 870);
    }
}
