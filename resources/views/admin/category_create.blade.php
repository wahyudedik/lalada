<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.category.store') }}" method="get">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">
                                Name
                            </label>
                            <input type="text" name="name" id="name" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">
                                Description
                            </label>
                            <textarea name="description" id="description" cols="30" rows="10" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"></textarea>
                        </div>
                        <div class="mb-4">
                            <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Save
                            </x-primary-button>
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
