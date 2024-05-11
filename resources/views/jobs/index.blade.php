<x-layouts.layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <!-- Jobs list in cards responsibe style -->
    <!-- main container -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($jobs as $job)
            <!-- card container -->
            <a
                href="/jobs/{{ $job->id }}"class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $job->title }}</h5>
                <p class="text-sm font-normal text-gray-700 dark:text-gray-400">{{ $job->employer->name }}</p>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $job->salary }}</p>
            </a>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $jobs->links() }}
    </div>
</x-layouts.layout>
