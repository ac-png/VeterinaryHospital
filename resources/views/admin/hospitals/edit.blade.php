<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Hospital') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.hospitals.update', $hospital) }}" method="post">
                    @method('put')
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name', $hospital->name)"></x-text-input>

                    <x-textarea
                        name="address"
                        rows="5"
                        field="address"
                        placeholder="Address..."
                        class="w-full mt-6"
                        :value="@old('address', $hospital->address)"></x-textarea>

                    <x-primary-button class="mt-6">Save Hospital</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>