@props(['post'])

<!-- Post Card -->
<div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col">
    <!-- Image -->
    <img src="https://picsum.photos/id/{{ rand(1, 100) }}/400/200" alt="{{ $post->title }}"
         class="w-full h-40 object-cover">

    <!-- Card Content -->
    <div class="p-6 flex-grow">
        <h2 class="font-bold text-xl text-gray-900 mb-2">{{ $post->title }}</h2>
        <div class="text-xs text-gray-500 font-light mb-4">
            <span>Posted <time>{{ $post->created_at->diffForHumans() }}</time> by</span>
            <a href="{{ route('posts.user', $post->user) }}" class="text-blue-500 hover:underline font-medium">{{ $post->user->username ?? 'Unknown' }}</a>
        </div>
        <div class="text-sm text-gray-700 leading-relaxed mb-4">
            <p>{{ Str::limit($post->body, 100) }}</p>
        </div>
    </div>

    <!-- Read More Button -->
    <div class="px-6 pb-6 mt-auto">
        <a href="{{ route('posts.show', $post->id) }}"
           class="inline-block bg-blue-600 text-white hover:bg-blue-700 font-medium text-sm py-2 px-4 rounded-md shadow transition duration-300">
            Read more
        </a>
    </div>
</div>
