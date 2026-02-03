<x-guest-layout>
    <div class="py-4 mx-auto sm:px-6 lg:px-8">
        <div class="w-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="max-w-2xl m-auto">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <button type="submit" class="py-2 bg-green-400 rounded-md mt-8 w-full">Login</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
