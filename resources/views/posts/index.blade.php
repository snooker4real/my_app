<x-layout>
    <div class="min-h-screen bg-gray-100 py-8">
        <!-- Page Title -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Latest Posts</h1>

        <!-- Posts Container -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <!-- Post Card -->
                <x-postCard :post="$post" />
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->onEachSide(1)->links('pagination::tailwind') }}
        </div>
    </div>
</x-layout>
