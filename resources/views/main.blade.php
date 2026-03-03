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
                <p class="mb-5">
                    {{date("H:m:s")}}

                    Usuario conectado {{$nombre}}
                    <h2>Número generado <span class="text-3xl text-red-100  ">{{$numero}}</h2>
                </p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>
    @endguest
        @auth
            @php
                $cantidad = 8; // cambia a 6 si quieres
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 my-9 mx-9">
                @for ($i = 1; $i <= $cantidad; $i++)
                    <div class="card bg-base-100 image-full w-70 shadow-sm min-w-full ">
                        <figure>
                            <img
                                src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                                alt="Imagen {{ $i }}" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">Tarjeta {{ $i }}</h2>
                            <p>Contenido de la tarjeta número {{ $i }}.</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">Acción</button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        @endauth

</x-layouts.layout>
