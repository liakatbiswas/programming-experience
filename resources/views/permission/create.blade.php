<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Permissions
            </h2>
            <a href="{{ route('permissions.index') }}" class="py-2 px-3 bg-gray-400 rounded-lg">Create List</a>
        </div>
    </x-slot>


    <div class="p-6 text-gray-900 dark:text-gray-100">

        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="text-lg font-medium w-full">Name</label>
                <input type="text" name="name" id="name"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body"
                    placeholder="Enter Permission Name">
                @error('name')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="py-2 px-3 bg-gray-400 rounded-lg">Submit</button>
        </form>

    </div>
</x-app-layout>
