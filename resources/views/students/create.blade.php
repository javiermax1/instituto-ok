<x-layouts.layout>

    <div class="flex justify-center items-center min-h-full bg-gray-200">

        <form method="POST" action="{{ route('students.store') }}" class="bg-white p-4 rounded-2xl">
@csrf


<!-- Name -->
<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input
        id="name"
        class="block mt-1 w-full"
        type="text"
        name="name"
        value="{{$student->name}}"
        :value="$student->name"
        required
    />
</div>

<!-- Age -->
<div class="mt-4">
    <x-input-label for="age" :value="__('Age')" />
    <x-text-input
        id="age"
        class="block mt-1 w-full"
        type="text"
        name="age"
        value="{{$student->age}}"
        :value="$student->age"
        required
    />
</div>

<!-- email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="text"
                    name="email"
                    value="{{$student->email}}"
                    :value="$student->email"
                />
            </div>

<!-- DNI -->
<div class="mt-4">
    <x-input-label for="email" :value="__('DNI')" />
    <x-text-input
        id="dni"
        class="block mt-1 w-full"
        type="text"
        name="dni"
        :value="$student->dni"
    />
</div>

<div class="flex justify-end mt-6">
    <x-primary-button>
        {{ __('Create Student') }}
    </x-primary-button>
</div>

</form>

</div>

</x-layouts.layout>
