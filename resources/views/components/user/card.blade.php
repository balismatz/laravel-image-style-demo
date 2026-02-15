@use('App\ImageStyles\User\Thumbnail')

@props([
    'user',
])

<div {{ $attributes->class(['flex', 'items-center', 'gap-x-6']) }}>
    <x-styled-image-example.first
        :style="Thumbnail::class"
        :path="$user->image->path"
        :alt="$user->name"
        class="rounded-full outline-1 -outline-offset-1 outline-black/5" />

    <div>
        <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">
            {{ $user->name }}
        </h3>

        <p class="text-sm/6 font-semibold text-indigo-600">
            {{ $user->job_title }}
        </p>
    </div>
</div>
