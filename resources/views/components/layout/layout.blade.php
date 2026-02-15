<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ collect([$title, config('app.name')])->filter()->join(' | ') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css'])
        @endif
    </head>
    <body class="flex h-dvh flex-col *:shrink-0">
        <x-layout.top-banner />

        <x-layout.header :links="$navigationLinks" />

        <main {{ $attributes->class('grow') }}>
            @if ($heading)
                <x-layout.heading-subheading :$heading :$subheading class="my-8" />
            @endif

            {{ $slot }}
        </main>

        <x-layout.footer />
    </body>
</html>
