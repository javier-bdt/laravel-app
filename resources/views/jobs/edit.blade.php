<x-layouts.layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>
    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 sm:max-w-md">
                                <input type="text" name="title" id="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Fullstack developer" value="{{ $job->title }}" required>
                            </div>
                            @error('title')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input type="text" name="salary" id="salary"
                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="38.000 USD" value="{{ $job->salary }}" required>
                        </div>
                        @error('salary')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
            </div>
        </div>


        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <x-form-button form="delete-form" class="bg-red-700 hover:text-red-700 hover:bg-white">
                    Delete Job
                </x-form-button>
            </div>
            <div class="flex items-center gap-6">
                <a href="/jobs/{{ $job->id }}" class="font-semibold mb-3 text-gray-900">Cancel</a>
                <x-form-button type="submit">Update</x-form-button>
            </div>
        </div>
    </form>
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layouts.layout>
