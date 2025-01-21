<x-layout>
    <h1 class="title">{{ $user->username }}'s Posts &#9830; {{ $posts->total() }}</h1>

    {{--    User's posts--}}
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

</x-layout>
