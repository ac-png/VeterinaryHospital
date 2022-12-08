<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created: </strong> {{ $animal->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong> {{ $animal->updated_at->diffForHumans() }}
                </p>
                <a href="{{ route('admin.animals.edit', $animal) }}" class="btn-link ml-auto">Edit Note</a>
                <form action="{{ route('admin.animals.destroy', $animal) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to move this to trash?')">Move to Trash</button>
                </form>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{ $animal->name }}
                </h2>
                <p class="mt-6 whitespace-">Type: {{ $animal->type }}</p>
                <p class="mt-6 whitespace-">Veterinarian: {{ $animal->veterinarian }}</p>
                <p class="mt-6 whitespace-">Notes: {{ $animal->notes }}</p>
                <p class="mt-6 whitespace-">Hospital Name: {{ $animal->hospital->name }}</p>
                <p class="mt-6 whitespace-">Hospital Address: {{ $animal->hospital->address }}</p>
                <p class="mt-6 whitespace-">Veterinarian:
                    @foreach ($animal->veterinarians as $veterinarian)
                        {{$veterinarian->name}}
                     @endforeach
                </p>
            </div>
        </div>
    </div>
</x-app-layout>