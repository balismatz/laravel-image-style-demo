<?php

namespace App\View\Components\StyledImageExample\Responsive;

use BalisMatz\ImageStyle\Information\ImageStyleImageInformation;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class Second extends Component
{
    /**
     * The attributes of each picture source.
     *
     * @var \Illuminate\Support\Collection<\Illuminate\View\ComponentAttributeBag>
     */
    public Collection $sourcesAttributes;

    /**
     * The default attributes of the picture fallback image.
     */
    public array $fallbackAttributeDefaults;

    /**
     * Create a new component instance.
     *
     * @param  array|\Illuminate\Support\Collection<\BalisMatz\ImageStyle\Information\ImageStyleImageInformation|string|null>  $images
     */
    public function __construct(
        public array|Collection $images,
        public ImageStyleImageInformation|string|null $fallbackImage = null,
    ) {
        $this->images = collect($images)->filter();

        $this->setSourcesAttributes()->setFallbackAttributeDefaults();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.styled-image-example.responsive.second');
    }

    /**
     * Set the attributes of each picture source.
     */
    protected function setSourcesAttributes(): static
    {
        $this->sourcesAttributes = $this->images
            ->map(function (ImageStyleImageInformation|string $image): ComponentAttributeBag {
                return new ComponentAttributeBag(match (true) {
                    $image instanceof ImageStyleImageInformation => [
                        'srcset' => $image->url,
                        'media' => $image->parameters,
                        'height' => $image->height,
                        'width' => $image->width,
                        'type' => $image->mimetype,
                    ],
                    default => [
                        'srcset' => $image,
                    ]
                });
            });

        return $this;
    }

    /**
     * Set the default attributes of the picture fallback image.
     */
    protected function setFallbackAttributeDefaults(): static
    {
        $fallbackImage = $this->fallbackImage ?: $this->images->first();

        $this->fallbackAttributeDefaults = match (true) {
            $fallbackImage instanceof ImageStyleImageInformation => [
                'src' => $fallbackImage->url,
                'height' => $fallbackImage->height,
                'width' => $fallbackImage->width,
                'loading' => $fallbackImage->height && $fallbackImage->width ?
                    'lazy' : null,
            ],
            filled($fallbackImage) => [
                'src' => $fallbackImage,
            ],
            // In some cases, the image information or URL may be null
            // (check the "fallback_url" image style configuration).
            default => []
        };

        return $this;
    }
}
