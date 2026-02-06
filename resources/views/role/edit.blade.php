<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Edit Role
            </h2>
            <a href="{{ route('roles.index') }}" class="py-2 px-3 bg-gray-400 text-white rounded-lg">
                Role List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Role Name -->
                        <div class="mb-6">
                            <label for="name" class="block text-lg font-medium mb-1">
                                Role Name
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900"
                                placeholder="Enter role name">

                            @error('name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Permissions -->
                        <div class="mb-6">
                            <label class="block text-lg font-medium mb-2">
                                Assign Permissions
                            </label>

                            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-3">
                                @foreach ($permissions as $permission)
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm"
                                            {{ in_array($permission->name, old('permissions', $rolePermissions)) ? 'checked' : '' }}>
                                        <span>{{ $permission->name }}</span>
                                    </label>
                                @endforeach
                            </div>

                            @error('permissions')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            class="py-2 px-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            Update Role
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
