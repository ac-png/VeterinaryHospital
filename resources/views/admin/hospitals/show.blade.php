<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created: </strong> {{ $hospital->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong> {{ $hospital->updated_at->diffForHumans() }}
                </p>
                <a href="{{ route('admin.hospitals.edit', $hospital) }}" class="btn-link ml-auto">Edit Hospital</a>
                <form action="{{ route('admin.hospitals.destroy', $hospital) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to move this to trash?')">Move to Trash</button>
                </form>
            </div>
        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <h2 class="font-bold text-4xl">
                {{ $hospital->name }}
            </h2>
            <p class="mt-6 whitespace-">{{$hospital->address}}</p>
        </div>
    </div>
</x-app-layout>