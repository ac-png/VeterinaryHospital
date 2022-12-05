<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Animals') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <a href="{{ route('admin.animals.create') }}" class="btn-link btn-lg mb-2">Add a Animal</a>
            @forelse ($animals as $animal)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('admin.animals.show', $note->animal) }}"> <strong>{{ $animal->name }}</strong></a>
                    </h2>
                    <p class="mt-2">

                        <h3 class="font-bold text-1xl"> <strong>Hospital Name </strong>
                        {{$animal->hospital->name}} </h3>
                        {{$animal->notes}}

                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $animal->updated_at->diffForHumans() }}</span>

                </div>
            @empty
            <p>No animals</p>
            @endforelse
            {{-- {{$animals->links()}} --}}
        </div>
    </div>
</x-app-layout>
