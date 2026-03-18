<x-layouts.layout>
    @guest
    <div
        class="hero min-h-full"
        style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);"
    >
        <div class="hero-overlay"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>
    @endguest
        @auth
            <div class="lg:h-main bg-base-200
                        grid
                     grid-cols-1
                     sm:grid-cols-2
                     lg:grid-cols-3
                     gap-6 p-6
                     items-start
                     overflow-y-auto">


{{--TARJETAS--}}
{{--@dd(config('resource'))--}}
            @foreach (config("resources") as $resource =>$data)
                <x-card :label='__("Ver $resource")'
                        :img='asset("/images/$resource.jpeg")'
                        title="Gestión de {{$resource}}"
                        description="Vamos a ver un Crud de {{$resource}}"
                        ref="{{route('crud.index', $resource)}}">
                </x-card>
            @endforeach
        @endauth

            </div>
</x-layouts.layout>
