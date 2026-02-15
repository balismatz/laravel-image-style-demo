@props([
    'links',
])

@aware([
    'isCurrentUrl' => null,
])

@php
    $contactUrl = route('contact');

    $contactUrlIsCurrentUrl = $isCurrentUrl ? $isCurrentUrl($contactUrl) : false;
@endphp

<header {{ $attributes->class(['relative', 'z-10']) }}>
    <nav aria-label="Global" class="layout-container flex items-center justify-between py-6">
        <div class="flex lg:flex-1">
            <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                <span class="sr-only">{{ config('app.name') }}</span>
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="{{ config('app.name') }}" class="h-8 w-auto" />
            </a>
        </div>

        <div class="flex lg:hidden">
            <button type="button" command="show-modal" commandfor="mobile-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>

        <div class="hidden lg:flex lg:gap-x-12">
            @foreach ($links as $link)
                <a
                    href="{{ $link->get('url') }}"
                    @class([
                        'text-sm/6',
                        'font-semibold',
                        'text-gray-900' => ! $link->get('current'),
                        'text-indigo-600' => $link->get('current'),
                        'hover:text-indigo-500' => ! $link->get('current'),
                    ])
                >
                    {{ $link->get('text') }}
                </a>
            @endforeach
        </div>

        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a
                href="{{ $contactUrl }}"
                @class([
                    'block',
                    'rounded-md',
                    'bg-indigo-600' => ! $contactUrlIsCurrentUrl,
                    'bg-indigo-500' => $contactUrlIsCurrentUrl,
                    'px-3.5',
                    'py-2.5',
                    'text-center',
                    'text-sm',
                    'font-semibold',
                    'text-white',
                    'shadow-xs',
                    'hover:bg-indigo-500',
                    'focus-visible:outline-2',
                    'focus-visible:outline-offset-2',
                    'focus-visible:outline-indigo-600',
                ])
            >
                Contact
            </a>
        </div>
    </nav>

    <el-dialog>
        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
            <div tabindex="0" class="fixed inset-0 focus:outline-none">
                <el-dialog-panel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                            <span class="sr-only">{{ config('app.name') }}</span>
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="{{ config('app.name') }}" class="h-8 w-auto" />
                        </a>

                        <button type="button" command="close" commandfor="mobile-menu" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-6 flow-root">
                        <div class="-my-6">
                            <div class="space-y-2 py-6">
                                @foreach ($links as $link)
                                    <a
                                        href="{{ $link->get('url') }}"
                                        @class([
                                            '-mx-3',
                                            'block',
                                            'rounded-lg',
                                            'px-3',
                                            'py-2',
                                            'text-base/7',
                                            'font-semibold',
                                            'text-gray-900' => ! $link->get('current'),
                                            'text-indigo-600' => $link->get('current'),
                                            'hover:bg-indigo-100/50',
                                        ])
                                    >
                                        {{ $link->get('text') }}
                                    </a>
                                @endforeach
                            </div>

                            <div class="py-6">
                                <a
                                    href="{{ $contactUrl }}"
                                    @class([
                                        '-mx-3',
                                        'block',
                                        'rounded-md',
                                        'bg-indigo-600' => ! $contactUrlIsCurrentUrl,
                                        'bg-indigo-500' => $contactUrlIsCurrentUrl,
                                        'px-3.5',
                                        'py-2.5',
                                        'text-center',
                                        'text-sm',
                                        'font-semibold',
                                        'text-white',
                                        'shadow-xs',
                                        'hover:bg-indigo-500',
                                        'focus-visible:outline-2',
                                        'focus-visible:outline-offset-2',
                                        'focus-visible:outline-indigo-600',
                                    ])
                                >
                                    Contact
                                </a>
                            </div>
                        </div>
                    </div>
                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>
</header>
