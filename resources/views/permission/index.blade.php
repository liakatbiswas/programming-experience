<x-app-layout>
    <div class="text-gray-900 dark:text-gray-100">
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Permissions
                </h2>
                <a href="{{ route('permissions.create') }}" class="py-2 px-4 bg-gray-400 rounded-lg">
                    Create Permissions
                </a>
            </div>
        </x-slot>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="min-w-full">
                        <div
                            class="border border-table-line rounded-lg overflow-x-auto [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb">

                            <table class="min-w-full divide-y divide-table-line">
                                <thead class="bg-muted">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-4 text-start text-xs font-medium text-muted-foreground-1 uppercase">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-start text-xs font-medium text-muted-foreground-1 uppercase">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-start text-xs font-medium text-muted-foreground-1 uppercase">
                                            Created
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-center text-xs font-medium text-muted-foreground-1 uppercase">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-table-line">

                                    @foreach ($permissions as $index => $permission)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">
                                                {{ $permission->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">
                                                {{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y') }}
                                            </td>
                                            <td class="px-6 py-2 text-center whitespace-nowrap text-sm font-medium">

                                                @if (strtolower($permission->name != 'user'))
                                                    <a href="{{ route('permissions.edit', $permission->id) }}"
                                                        class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                        method="POST"
                                                        class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button>Delete</button>
                                                    </form>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <div class="py-4 px-4">
                            {{ $permissions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
