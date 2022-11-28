<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($animals as $animal)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text 2xl">
                        {{-- $animal-> uuid passes the uuid instead of the whole object into route --}}
                        <a href="{{ route('user.animals.show', $animal->uuid) }}">{{ $animal->name }}</a>
                    </h2>
                    <p class="mt-2">
                        Type: {{ $animal->type }}
                    </p>
                    <p class="mt-2">
                        Veterinarian: {{ $animal->veterinarian }}
                    </p>
                    <p class="mt-2">
                        Notes: {{ Str::limit($animal->notes, 200) }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $animal->updated_at->diffForHumans() }}</span>
                </div>
            @empty
                <p>You have no notes</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
