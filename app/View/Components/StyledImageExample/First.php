<?php

namespace App\View\Components\StyledImageExample;

use BalisMatz\ImageStyle\ImageStyle;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class First extends Component
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
        protected ImageStyle $imageStyle,
        public string $style,
        public string $path,
        public array $styleParameters = [],
        public bool $recreate = false,
    ) {
        $this->setAttributeDefaults();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.styled-image-example.first');
    }

    /**
     * Set the default attributes.
     */
    protected function setAttributeDefaults(): void
    {
        // In some cases, the image information may be null
        // (check the "fallback_url" image style configuration).
        if (! $imageInformation = $this->imageStyle->imageInformation($this->style, $this->path, $this->styleParameters, recreate: $this->recreate)) {
            return;
        }

        $this->attributeDefaults = array_filter([
            'src' => $imageInformation->url,
            'height' => $imageInformation->height,
            'width' => $imageInformation->width,
            'loading' => $imageInformation->height && $imageInformation->width ?
                'lazy' : null,
        ]);
    }
}
