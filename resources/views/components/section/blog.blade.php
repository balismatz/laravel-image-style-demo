@props([
    'section',
    'posts',
])

<section {{ $attributes->class(['py-24', 'sm:py-32']) }}>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div>
            <h2 class="text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl">
                {{ $section->title }}
            </h2>

            <p class="mt-2 text-lg/8 text-gray-600">
                {{ $section->content }}
            </p>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-12 sm:pt-12 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-post.card :$post class="lg:last:hidden" />
            @endforeach
        </div>
    </div>
</section>
