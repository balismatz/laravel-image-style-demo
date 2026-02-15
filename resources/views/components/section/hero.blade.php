@use('App\ImageStyles\Section\Hero\Thumbnail')

@props([
    'section',
])

<section {{ $attributes->class(['relative', 'overflow-hidden', 'bg-indigo-50']) }}>
    <div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
        <div class="layout-container relative">
            <div class="sm:max-w-lg">
                <h1 class="text-3xl leading-tight font-bold text-gray-900 sm:text-6xl">
                    {{ $section->title }}
                </h1>

                <p class="mt-5 space-y-2.5 text-xl leading-normal text-gray-500">
                    {{ $section->content }}
                </p>
            </div>

            <div>
                <div class="mt-10">
                    <!-- Decorative image grid -->
                    <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                        <div class="absolute transform sm:top-0 sm:left-1/2 sm:translate-x-8 lg:top-1/2 lg:left-1/2 lg:translate-x-8 lg:-translate-y-1/2">
                            <div class="flex items-center space-x-6 lg:space-x-8">
                                <div class="grid shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                    @foreach ($section->images->slice(0, 2) as $key => $image)
                                        <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                                            <x-styled-image-example.first
                                                :style="Thumbnail::class"
                                                :path="$image->path"
                                                alt="Hero image {{ $key + 1 }}"
                                                class="size-full object-cover" />
                                        </div>
                                    @endforeach
                                </div>

                                <div class="grid shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                    @foreach ($section->images->slice(2, 3) as $key => $image)
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <x-styled-image-example.second
                                                :image="imageStyle()->imageInformation(Thumbnail::class, $image->path)"
                                                alt="Hero image {{ $key + 1 }}"
                                                class="size-full object-cover" />
                                        </div>
                                    @endforeach
                                </div>

                                <div class="grid shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                    @foreach ($section->images->slice(5, 2) as $key => $image)
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <x-styled-image-example.second
                                                :image="imageStyle()->url(Thumbnail::class, $image->path)"
                                                alt="Hero image {{ $key + 1 }}"
                                                class="size-full object-cover" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <a
                        href="https://github.com/balismatz/laravel-image-style-demo"
                        class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-center font-medium text-white hover:bg-indigo-700"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        More Information
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
