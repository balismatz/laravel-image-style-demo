@use('App\ImageStyles\User\ThumbnailCompact')

@props([
    'user',
])

<div {{ $attributes->class(['relative', 'flex', 'items-center', 'gap-x-4', 'justify-self-end']) }}>
    <x-styled-image-example.second
        :image="imageStyle()->imageInformation(ThumbnailCompact::class, $user->image->path)"
        :alt="$user->name"
        class="size-10 rounded-full bg-gray-50" />

    <div class="text-sm/6">
        <p class="font-semibold text-gray-900">
            {{ $user->name }}
        </p>

        <p class="text-gray-600">
            {{ $user->job_title }}
        </p>
    </div>
</div>
