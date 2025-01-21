<x-layout>
    <div class="min-h-screen bg-gray-100 py-8">
        <!-- Welcome Section -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-gray-800">Hello, {{ auth()->user()->username }} 👋</h1>
            <p class="text-gray-600 mt-2">Welcome back to your dashboard! Manage your posts effortlessly.</p>
        </div>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="max-w-4xl mx-auto mb-6">
                <x-flashMsg msg="{{ session('success') }}" />
            </div>
        @endif

        <!-- Create Post Section -->
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8 mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create a New Post</h2>
            <form action="{{ route('posts.store') }}" method="post" class="space-y-4">
                @csrf

                <!-- Post Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 ring-red-500 @enderror"
                        placeholder="Enter your title">
                    @error('title')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Post Body -->
                <div>
                    <label for="body" class="block text-sm font-medium text-gray-700">Post Body</label>
                    <textarea
                        name="body"
                        id="body"
                        rows="5"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('body') border-red-500 ring-red-500 @enderror"
                        placeholder="Write your post here...">{{ old('body') }}</textarea>
                    @error('body')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="text-right">
                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Publish Post
                    </button>
                </div>
            </form>
        </div>

        <!-- User Posts Section -->
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Your Latest Posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
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
                                <a href="#" class="text-blue-500 hover:underline font-medium">{{ $post->author->name ?? 'Unknown' }}</a>
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
                @endforeach
            </div>
        </div>

        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
