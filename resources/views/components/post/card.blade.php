@use('App\ImageStyles\Post\Card\{Card, Lg, Md, Sm}')
@use('BalisMatz\ImageStyle\Information\ImageStyleImageInformation')

@props([
    'post',
    'category' => null,
    'category_hidden' => false,
])

@php
    $category = $category ?: $post->category;

    $featuredImageStyles = [
        '(width >= 1024px)' => Lg::class,
        '(width >= 768px)' => Md::class,
        '(width >= 640px)' => Sm::class,
        '(width >= 0px)' => Card::class,
    ];

    $featuredImages = imageStyle()->imagesInformation(
        array_values($featuredImageStyles),
        $post->featuredImage->path,
        informationParameters: array_keys($featuredImageStyles)
    );
@endphp

<article {{ $attributes }}>
    <div class="flex h-full flex-col items-start justify-between">
        <div class="group relative grow">
            <x-styled-image-example.responsive.second
                :images="$featuredImages"
                :fallback-image="$featuredImages->get(Sm::class)"
                :alt="$post->title"
                class="rounded-xl" />

            <x-post.meta
                :$post
                :category="$category_hidden ? null : $category"
                class="mt-4" />

            <div>
                <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-indigo-600">
                    <a href="{{ route('post.show', ['category' => $category, 'post' => $post]) }}">
                        <span class="absolute inset-0"></span>

                        {{ $post->title }}
                    </a>
                </h3>

                <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">
                    {{ $post->excerpt }}
                </p>
            </div>
        </div>

        <x-user.card-compact :user="$post->user" class="mt-5" />
    </div>
</article>
