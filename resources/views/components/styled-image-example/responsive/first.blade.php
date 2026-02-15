{{-- @see \App\View\Components\StyledImageExample\Responsive\First --}}

{{--
    Although the @props directive here is redundant, it is included to document
    the properties that can be passed to and used within the component.
--}}
@props([
    'styles',
    'path',
    'styleParameters' => [],
    'recreate' => false,
    'fallbackImageStyle' => null,
])

<picture>
    @foreach ($sourcesAttributes as $sourceAttributes)
        <source {{ $sourceAttributes }} />
    @endforeach

    {{-- Any attribute, such as "loading", can still be overridden. --}}
    <img {{ $attributes->merge($fallbackAttributeDefaults) }} />
</picture>
