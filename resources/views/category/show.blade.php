@props([
    'category',
    'posts',
])

<x-layout :title="$category->title" :heading="$category->title" :subheading="$category->subtitle">
    <div class="layout-container mt-14 mb-20">
        @if ($posts->isNotEmpty())
            <div class="grid grid-cols-1 gap-x-8 gap-y-16 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <x-post.card :$post :$category :category_hidden="true" />
                @endforeach
            </div>

            @if ($posts->hasPages())
                <div class="mt-16">
                    {{ $posts->links() }}
                </div>
            @endif
        @else
            <div>Sorry, there are no posts yet.</div>
        @endif
    </div>
</x-layout>
