@props([
    'post',
    'category' => null,
])

<div {{ $attributes->class(['flex', 'items-center', 'gap-x-4', 'text-xs']) }}>
    <time datetime="{{ $post->created_at->format('Y-m-d') }}" class="text-gray-500">
        {{ $post->created_at->format('M d, Y') }}
    </time>

    @if ($category)
        <a href="{{ route('category.show', $category) }}" class="relative z-10 rounded-full bg-indigo-50 px-3 py-1.5 font-medium text-indigo-600 hover:bg-indigo-100">
            {{ $category->title }}
        </a>
    @endif
</div>
