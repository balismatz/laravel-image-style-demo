{{-- @see \App\View\Components\StyledImageExample\First --}}

{{--
    Although the @props directive here is redundant, it is included to document
    the properties that can be passed to and used within the component.
--}}
@props([
    'style',
    'path',
    'styleParameters' => [],
    'recreate' => false,
])

{{-- Any attribute, such as "loading", can still be overridden. --}}
<img {{ $attributes->merge($attributeDefaults) }} />
