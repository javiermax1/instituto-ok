<x-layouts.layout>

    <div class="flex justify-center items-center min-h-full bg-gray-200">

        <form method="POST" action="{{ route('students.update',$student->id) }}?page={{request()->get('page')}}" class="bg-white p-4 rounded-2xl">
            @method('PATCH')
@csrf

<!-- Name -->
<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input
        id="name"
        class="block mt-1 w-full"
        type="text"
        name="name"
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
        :value="$student->age"
        required
    />
</div>

<!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="text"
                    name="email"
                    :value="$student->email"
                    required
                />
            </div>

<!-- DNI-->
<div class="mt-4">
    <x-input-label for="dni" :value="__('Dni')" />
    <x-text-input
        id="dni"
        class="block mt-1 w-full"
        type="text"
        name="dni"
        :value="$student->dni"
        required
    />
</div>

<div class="flex justify-end mt-6">
    <x-primary-button>
        {{ __('Edit Student') }}
    </x-primary-button>
</div>

</form>

</div>

</x-layouts.layout>
