<?php

namespace App\ImageStyles\User;

use BalisMatz\ImageStyle\Attributes\ImageStyle;
use BalisMatz\ImageStyle\ImageStyleBase;
use Intervention\Image\Interfaces\EncodedImageInterface;
use Intervention\Image\Interfaces\ImageInterface;

#[ImageStyle(help: 'Used in the user compact card component.')]
class ThumbnailCompact extends ImageStyleBase
{
    /**
     * {@inheritDoc}
     */
    public function modifications(ImageInterface $image, array $parameters): ImageInterface|EncodedImageInterface
    {
        return $image
            ->cover(40, 40)
            ->greyscale();
    }
}
