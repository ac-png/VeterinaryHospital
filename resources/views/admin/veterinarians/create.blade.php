<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Veterinarians') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.veterinarians.store') }}" method="post">
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')"></x-text-input>
                    
                    <x-textarea
                        name="address"
                        rows="5"
                        field="address"
                        placeholder="Address..."
                        class="w-full mt-6"
                        :value="@old('address')"></x-textarea>

                    <x-textarea
                        name="bio"
                        rows="5"
                        field="bio"
                        placeholder="Bio..."
                        class="w-full mt-6"
                        :value="@old('bio')"></x-textarea>

                    <x-primary-button class="mt-6">Save Animal</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>