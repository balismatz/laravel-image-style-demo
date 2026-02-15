<?php

namespace App\View\Components\StyledImageExample;

use BalisMatz\ImageStyle\Information\ImageStyleImageInformation;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Second extends Component
{
    /**
     * The default attributes.
     *
     * @var array<string, string|int>
     */
    public array $attributeDefaults = [];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ImageStyleImageInformation|string|null $image,
    ) {
        $this->setAttributeDefaults();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.styled-image-example.second');
    }

    /**
     * Set the default attributes.
     */
    protected function setAttributeDefaults(): void
    {
        $this->attributeDefaults = match (true) {
            $this->image instanceof ImageStyleImageInformation => array_filter([
                'src' => $this->image->url,
                'height' => $this->image->height,
                'width' => $this->image->width,
                'loading' => $this->image->height && $this->image->width ?
                    'lazy' : null,
            ]),
            filled($this->image) => [
                'src' => $this->image,
            ],
            // In some cases, the image information or URL may be null
            // (check the "fallback_url" image style configuration).
            default => []
        };
    }
}
