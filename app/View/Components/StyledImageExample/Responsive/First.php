<?php

namespace App\View\Components\StyledImageExample\Responsive;

use BalisMatz\ImageStyle\ImageStyle;
use BalisMatz\ImageStyle\Information\ImageStyleImageInformation;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class First extends Component
{
    /**
     * The attributes of each picture source.
     *
     * @var \Illuminate\Support\Collection<string, \Illuminate\View\ComponentAttributeBag>
     */
    public Collection $sourcesAttributes;

    /**
     * The default attributes of the picture fallback image.
     */
    public array $fallbackAttributeDefaults;

    /**
     * Create a new component instance.
     *
     * @param  array|\Illuminate\Support\Collection<string, string>  $styles
     *                                                                        The image styles, keyed by media query.
     */
    public function __construct(
        protected ImageStyle $imageStyle,
        public array|Collection $styles,
        public string $path,
        public array $styleParameters = [],
        public bool $recreate = false,
        public ?string $fallbackImageStyle = null,
    ) {
        $this->styles = collect($styles);

        $this->setSourcesAttributes()->setFallbackAttributeDefaults();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.styled-image-example.responsive.first');
    }

    /**
     * Set the attributes of each picture source.
     */
    protected function setSourcesAttributes(): static
    {
        $this->sourcesAttributes = $this->imageStyle
            ->imagesInformation(
                $this->styles->values()->toArray(),
                $this->path,
                $this->styleParameters,
                $this->styles->keys()->toArray(),
                recreate: $this->recreate
            )
            ->filter()
            ->map(function (ImageStyleImageInformation $imageInformation): ComponentAttributeBag {
                return new ComponentAttributeBag([
                    'srcset' => $imageInformation->url,
                    'media' => $imageInformation->parameters,
                    'height' => $imageInformation->height,
                    'width' => $imageInformation->width,
                    'type' => $imageInformation->mimetype,
                ]);
            });

        return $this;
    }

    /**
     * Set the default attributes of the picture fallback image.
     */
    protected function setFallbackAttributeDefaults(): static
    {
        $fallbackImageStyle = $this->fallbackImageStyle ?: $this->styles->first();

        $fallbackImageInformation = filled($fallbackImageStyle) ? $this->imageStyle->imageInformation(
            $fallbackImageStyle,
            $this->path,
            $this->styleParameters,
            recreate: $this->recreate
        ) : null;

        $this->fallbackAttributeDefaults = match (true) {
            $fallbackImageInformation instanceof ImageStyleImageInformation => [
                'src' => $fallbackImageInformation->url,
                'height' => $fallbackImageInformation->height,
                'width' => $fallbackImageInformation->width,
                'loading' => $fallbackImageInformation->height && $fallbackImageInformation->width ?
                    'lazy' : null,
            ],
            // In some cases, the image information may be null
            // (check the "fallback_url" image style configuration).
            default => [],
        };

        return $this;
    }
}
