<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Permission') }}
            </h2>
            <a href="{{ route('permissions.index') }}"
                class="py-2 px-3 bg-gray-400 hover:bg-gray-500 text-white rounded-lg transition">
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="p-6 text-gray-900 dark:text-gray-100">

        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-lg font-medium w-full mb-1">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $permission->name) }}"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body"
                    placeholder="Enter Permission Name">

                @error('name')
                    <span class="text-sm text-red-400 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition">
                    Update Permission
                </button>
                <a href="{{ route('permissions.index') }}"
                    class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Cancel</a>
            </div>
        </form>

    </div>
</x-app-layout>
