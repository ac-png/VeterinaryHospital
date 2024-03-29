<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Hospitals') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <x-alert-failure>
                {{ session('failure') }}
            </x-alert-failure>
            <a href="{{ route('admin.hospitals.create') }}" class="btn-link btn-lg mb-2">+ New Hospital</a>
            @forelse ($hospitals as $hospital)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        <a href="{{ route('admin.hospitals.show', $hospital->uuid) }}">{{ $hospital->name }}</a>
                    </h2>
                    <p class="mt-2">Address: 
                        {{ Str::limit($hospital->address) }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $hospital->updated_at->diffForHumans() }}</span>
                </div>
            @empty
            <p>You have no hospitals yet.</p>
            @endforelse
            {{$hospitals->links()}}
        </div>
    </div>
</x-app-layout>
