<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4 sm:flex-wrap">
                        <div class="flex items-center mb-4 sm:w-full">
                            <div class="sm:w-3/4">
                                <input type="text" class="w-full rounded-md border border-gray-300 px-4 py-2"
                                    placeholder="Search Category">
                            </div>
                            <div class="sm:w-1/4">
                                <x-secondary-button class="ml-3">
                                    {{ __('Serach') }}
                                </x-secondary-button>
                            </div>
                        </div>
                        <div class="flex items-center justify-end sm:w-full">
                            <a href="/admin/category/create" class="ml-auto">
                                <x-primary-button>
                                    {{ __('Add category') }}
                                </x-primary-button>
                            </a>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-3 gap-6 sm:grid-cols-3 lg:grid-cols-3">
                        @foreach ($categories->chunk(9) as $chunkOfCategories)
                            @foreach ($chunkOfCategories as $category)
                                <div class="group relative">
                                    <div class="h-40 w-40 rounded-md">
                                        <h3 class="text-sm text-gray-700">
                                            {{ $category->name }}
                                            <p class="mt-1 text-sm text-gray-500">{{ $category->description }}</p>
                                        </h3>
                                    </div>
                                    <div class="flex justify-between mt-1">
                                        <a href="">
                                            <x-primary-button class="w-full">
                                                {{ __('See Products') }}
                                            </x-primary-button>
                                        </a>
                                    </div>
                                    <div class="flex justify-between mt-1">
                                        <a href="">
                                            <x-secondary-button class="w-full">
                                                {{ __('Update Category') }}
                                            </x-secondary-button>
                                        </a>
                                    </div>
                                    <div class="flex justify-between mt-1">
                                        <form action="admin/" method="post">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button class="w-full" onclick="return confirm('Are you sure you want to delete this category?')">
                                                {{ __('Delete Category') }}
                                            </x-danger-button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    <div class="mt-3">

                        {{ $categories->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
