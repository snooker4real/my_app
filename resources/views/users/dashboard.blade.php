<x-layout>
    <div class="min-h-screen bg-gray-100 py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Hello, {{ auth()->user()->username }}</h1>

        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
            <!-- Create Post Form -->
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Create a New Post</h2>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf

                <!-- Post Title -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 ring-red-500 @enderror"
                        placeholder="Enter your title">
                    @error('title')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Post Body -->
                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium text-gray-700">Post Body</label>
                    <textarea
                        name="body"
                        id="body"
                        rows="5"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('body') border-red-500 ring-red-500 @enderror"
                        placeholder="Write your post here...">{{ old('body') }}</textarea>
                    @error('body')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button
                        type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-300">
                        Publish Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
