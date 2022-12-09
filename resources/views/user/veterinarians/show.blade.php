<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created: </strong> {{ $veterinarian->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong> {{ $veterinarian->updated_at->diffForHumans() }}
                </p>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{ $veterinarian->name }}
                </h2>
                <p class="mt-6 whitespace-">Address: {{ $veterinarian->address }}</p>
                <p class="mt-6 whitespace-">Bio: {{ $veterinarian->bio }}</p>
            </div>
        </div>
    </div>
</x-app-layout>