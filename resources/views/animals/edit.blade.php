<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Animal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('animals.update', $animal) }}" method="post">
                    @method('put')
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name', $animal->name)"></x-text-input>

                    <x-text-input
                        type="text"
                        name="type"
                        field="type"
                        placeholder="Type..."
                        class="w-full mt-6"
                        :value="@old('type', $animal->type)"></x-text-input>

                    <x-text-input
                        type="text"
                        name="veterinarian"
                        field="veterinarian"
                        placeholder="Veterinarian..."
                        class="w-full mt-6"
                        :value="@old('veterinarian', $animal->veterinarian)"></x-text-input>

                    <x-textarea
                        name="notes"
                        rows="10"
                        field="notes"
                        placeholder="Notes..."
                        class="w-full mt-6"
                        :value="@old('notes', $animal->notes)"></x-textarea>

                    <x-primary-button class="mt-6">Save Note</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>