@props([
    'heading',
    'subheading' => null,
])

<div {{ $attributes->class('layout-container') }}>
    <h1 class="text-3xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-4xl">
        {{ $heading }}
    </h1>

    @if ($subheading)
        <div class="mt-3 border-b border-gray-200 pb-5 text-gray-600">
            <p class="max-w-2xl">{{ $subheading }}</p>
        </div>
    @endif
</div>

