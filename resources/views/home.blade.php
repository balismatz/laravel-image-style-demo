<x-layout>
    @if ($section = $sections->get('hero'))
        <x-section.hero :$section />
    @endif

    @if ($posts->isNotEmpty() && $section = $sections->get('blog'))
        <x-section.blog :$section :$posts />
    @endif

    @if ($section = $sections->get('banner'))
        <x-section.banner :$section />
    @endif

    @if ($users->isNotEmpty() && $section = $sections->get('team'))
        <x-section.team :$section :$users />
    @endif
</x-layout>
