@props([
    'section',
    'users',
])

<section {{ $attributes->class(['py-24', 'sm:py-32']) }}>
    <div class="mx-auto grid max-w-7xl gap-20 px-6 lg:px-8 xl:grid-cols-3">
        <div class="max-w-xl">
            <h2 class="text-3xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-4xl">
                {{ $section->title }}
            </h2>

            <p class="mt-6 text-lg/8 text-gray-600">
                {{ $section->content }}
            </p>
        </div>

        <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
            @foreach ($users as $user)
                <li>
                    <x-user.card :$user />
                </li>
            @endforeach
        </ul>
    </div>
</section>
