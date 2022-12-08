<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Animal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.animals.store') }}" method="post">
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="type"
                        field="type"
                        placeholder="Type"
                        class="w-full mt-6"
                        :value="@old('type')"></x-text-input>
                        
                    <div class="w-full mt-6">
                        <label for="hospital">Hospital: </label>
                        <select name="hospital_id">
                            @foreach ($hospitals as $hospital)
                            <option value="{{$hospital->id}}" {{(old('hospital_id') == $hospital->id) ? "selected" : ""}}>
                                {{$hospital->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="w-full mt-6">
                        <label for="veterinarians">Veterinarian: </label>
                        @foreach ($veterinarians as $veterinarian)
                            <input type="checkbox", value="if in">
                           {{$veterinarian->name}}
                        @endforeach
                    </div>

                    <x-textarea
                        name="notes"
                        rows="10"
                        field="notes"
                        placeholder="Notes..."
                        class="w-full mt-6"
                        :value="@old('notes')"></x-textarea>

                    <x-primary-button class="mt-6">Save Animal</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>