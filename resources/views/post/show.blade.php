@use("App\ImageStyles\Post\Show\{Lg, Show, Thumbnail}")

@props([
    'post',
    'category',
])

<x-layout :title="$post->title">
    <div class="mx-auto max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-8 lg:px-8">
        <x-styled-image-example.first
            :style="Lg::class"
            :path="$post->images->last()->path"
            class="row-span-2 aspect-3/4 size-full rounded-lg object-cover max-lg:hidden"
            :alt="$post->title.' 4'" />

        @foreach ($post->images->reverse()->slice(1, 2) as $key => $image)
            <x-styled-image-example.second
                :image="imageStyle()->imageInformation(Thumbnail::class, $image->path)"
                @class([
                    'col-start-2',
                    'row-start-2' => $key === 1,
                    'aspect-3/2',
                    'size-full',
                    'rounded-lg',
                    'object-cover',
                    'max-lg:hidden',
                ])
                :alt="$post->title.' '.($key + 1)" />
        @endforeach

        <div class="row-span-2 aspect-4/5 size-full overflow-hidden object-cover sm:rounded-lg lg:aspect-3/4">
            <x-styled-image-example.responsive.first
                :styles="[
                    '(width >= 1024px)' => Lg::class,
                    '(width >= 0px)' => Show::class,
                ]"
                :path="$post->images->first()->path"
                :fallback-image-style="Show::class"
                :alt="$post->title.' 1'" />
        </div>
    </div>

    <div class="mx-auto max-w-2xl px-4 pt-10 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto_auto_1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                {{ $post->title }}
            </h1>
        </div>

        <div class="mt-4 lg:row-span-3 lg:mt-0">
            <h2 class="sr-only">Post information</h2>

            <x-post.meta :$post :$category />

            <x-user.card :user="$post->user" class="mt-7" />
        </div>

        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pt-6 lg:pr-8 lg:pb-16">
            <h3 class="sr-only">Description</h3>

            <div class="space-y-6 text-base">
                <p class="text-gray-900">
                    {{ $post->excerpt }}
                </p>
            </div>

            <div class="mt-6 space-y-4 text-gray-500">
                {!! $post->content !!}
            </div>
        </div>
    </div>
</x-layout>
