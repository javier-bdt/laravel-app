<x-layouts.layout>
    <x-slot:heading>
        {{ $job->title }}
    </x-slot:heading>
    <p>This Job has a salary of {{ $job->salary }} per year</p>
    <p>Created at: {{ $job->created_at->diffForHumans() }}</p>
    <p>Updated at: {{ $job->updated_at->diffForHumans() }}</p>
    <p class="mt-3"><x-button href="/jobs/{{ $job->id }}/edit">Edit</x-button></p>
</x-layouts.layout>
