<x-layouts.layout>

    <div class="flex justify-center items-center min-h-full bg-gray-200">

        <form method="POST" action="{{ route('projects.update',$project->id) }}?page={{request()->get('page')}}" class="bg-white p-4 rounded-2xl">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Title')" />
                <x-text-input
                    id="title"
                    class="block mt-1 w-full"
                    type="text"
                    name="title"
                    value="{{$project->title}}"
                    required
                />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <textarea
                    id="description"
                    name="description"
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    rows="3"

                >{{$project->description}}</textarea>
            </div>

            <!-- Hours -->
            <div class="mt-4">
                <x-input-label for="hours" :value="__('Hours')" />
                <x-text-input
                    id="hours"
                    class="block mt-1 w-full"
                    type="number"
                    name="hours"
                    min="0"
                    value="{{$project->hours}}"
                />
                @error("hours")
                <div class="text-xm text-red-200"> {{$message}}</div>
                @enderror
            </div>

            <!-- Start Date -->
            <div class="mt-4">
                <x-input-label for="start_date" :value="__('Start date')" />
                <x-text-input
                    id="start_date"
                    class="block mt-1 w-full"
                    type="date"
                    name="start_date"
                    value="{{$project->start_date}}"
                />
            </div>

            <div class="flex justify-end mt-6">
                <x-primary-button>
                    {{ __('Update Project') }}
                </x-primary-button>
            </div>

        </form>

    </div>

</x-layouts.layout>
