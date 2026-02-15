<footer {{ $attributes->class(['bg-gray-900', 'text-white', 'text-sm', 'font-bold', 'px-3', 'py-4']) }}>
    <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-center sm:justify-end">
        <p class="text-sm/6 font-medium">
            {{ config('app.name') }}
        </p>

        <a href="https://github.com/balismatz/laravel-image-style-demo" class="flex-none rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" target="_blank" rel="noopener noreferrer">
            More information <span aria-hidden="true">&rarr;</span>
        </a>
    </div>
</footer>
