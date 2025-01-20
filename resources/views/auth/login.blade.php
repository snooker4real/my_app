<x-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
            <!-- Title -->
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Welcome Back</h1>

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="post" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="text"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 ring-red-500 @enderror"
                        placeholder="Enter your email">
                    @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 ring-red-500 @enderror"
                        placeholder="Enter your password">
                    @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 text-sm text-gray-700">Remember me</label>
                </div>

                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-300">
                    Login
                </button>
            </form>
        </div>
    </div>
</x-layout>
