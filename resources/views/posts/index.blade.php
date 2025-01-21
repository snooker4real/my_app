<x-layout>
    <div class="min-h-screen bg-gray-100 py-8">
        <!-- Page Title -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Latest Posts</h1>

        <!-- Posts Container -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <!-- Post Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col">
                    <!-- Image (optional) -->
                    <img src="https://picsum.photos/id/{{ rand(1, 100) }}/400/200" alt="{{ $post->title }}"
                         class="w-full h-40 object-cover">

                    <!-- Card Content -->
                    <div class="p-6 flex-grow">
                        <!-- Title -->
                        <h2 class="font-bold text-xl text-gray-900 mb-2">{{ $post->title }}</h2>

                        <!-- Author and Date -->
                        <div class="text-xs text-gray-500 font-light mb-4">
                            <span>Posted <time>{{ $post->created_at->diffForHumans() }}</time> by</span>
                            <a href="#" class="text-blue-500 hover:underline font-medium">{{ $post->author->name ?? 'Unknown' }}</a>
                        </div>

                        <!-- Body Excerpt -->
                        <div class="text-sm text-gray-700 leading-relaxed mb-4">
                            <p>
                                {{ Str::limit($post->body, 100) }}
                            </p>
                        </div>
                    </div>

                    <!-- Read More Button -->
                    <div class="px-6 pb-6 mt-auto">
                        <a href="{{ route('posts.show', $post->id) }}"
                           class="inline-block bg-blue-500 text-white hover:bg-blue-600 font-medium text-sm py-2 px-4 rounded-md shadow transition duration-300">
                            Read more
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->onEachSide(1)->links('pagination::tailwind') }}
        </div>
    </div>
</x-layout>
