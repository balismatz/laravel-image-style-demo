@use('App\ImageStyles\Section\Banner\{Banner, Lg, Md, Sm, UltraWide, Wide, Xl}')

@props([
    'section',
])

<section {{ $attributes->class(['relative', 'isolate', 'overflow-hidden', 'bg-gray-900', 'py-24', 'sm:py-32']) }}>
    <x-styled-image-example.responsive.first
        :styles="[
            '(width >= 1921px)' => UltraWide::class,
            '(width >= 1536px)' => Wide::class,
            '(width >= 1280px)' => Xl::class,
            '(width >= 1024px)' => Lg::class,
            '(width >= 768px)' => Md::class,
            '(width >= 640px)' => Sm::class,
            '(width >= 0px)' => Banner::class,
        ]"
        :path="$section->images->first()->path"
        :alt="$section->title"
        class="absolute inset-0 -z-10 size-full object-cover object-right md:object-center" />

    <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
    </div>

    <div aria-hidden="true" class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:-top-112 sm:ml-16 sm:translate-x-0">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
    </div>

    <div class="layout-container">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">
                {{ $section->title }}
            </h2>

            <p class="mt-8 text-lg font-medium text-pretty text-gray-300 sm:text-xl/8">
                {{ $section->content }}
            </p>
        </div>
    </div>
</section>
