{{-- @see \App\View\Components\StyledImageExample\Second --}}

{{--
    Although the @props directive here is redundant, it is included to document
    the properties that can be passed to and used within the component.
--}}
@props([
    'image',
])

{{-- Any attribute, such as "loading", can still be overridden. --}}
<img {{ $attributes->merge($attributeDefaults) }} />
