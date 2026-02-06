<x-app-layout>
    <div class="text-gray-900 dark:text-gray-100">
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Create Role
                </h2>
                <a href="{{ route('roles.index') }}" class="py-2 px-3 bg-gray-400 text-white rounded-lg">
                    Role List
                </a>
            </div>
        </x-slot>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="text-gray-900 dark:text-gray-100">

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf

                        <!-- Role Name -->
                        <div class="mb-6">
                            <label for="name" class="block text-lg font-medium mb-1">
                                Role Name
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body"
                                placeholder="Enter role name">

                            @error('name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Submit -->
                        <button type="submit"
                            class="py-2 px-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            Save Role
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
