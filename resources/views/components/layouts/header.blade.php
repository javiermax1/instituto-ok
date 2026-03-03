{{--Diseño pantalla grande no móvil--}}
<header class="hidden lg:flex flex-row justify-between items-center p-3
h-header bg-header
">
    <a href="{{ route('main') }}" class="max-h-full">
        <img class="h-8 sm:h-10 md:h-16 w-auto" src="{{ asset('images/logo.png') }}" alt="logo">
    </a>


    <h1 class=" text-3xl xl:text-5xl text-titulo">{{__("GESTION DE INSTITUTO")}}</h1>
    <div class="space-x-2">
        <form action="{{route("set_lang")}}" method="POST" class="mt-6 bg-gray-100">
            @csrf
            <select name="lang" id="lang"
                    onchange="this.form.submit()">
                {{--            HAcer que el option sea un submit--}}
                <option selected disabled>{{__("Selecciona idioma")}}</option>
                @foreach(config("langs") as $lang => $detail)
                    <option value="{{$lang}}">{{$detail['name']}} &nbsp&nbsp&nbsp {{$detail['flag']}}  </option>
                @endforeach
            </select>
        </form>
        @guest

            <a href="{{route("login")}}">
                <button class="btn btn-sm btn-primary">{{__("Login")}}</button>
            </a>
            <a href="{{route("register")}}">
                <button class="btn btn-sm btn-primary">{{__("Register")}}</button>
            </a>
        @endguest

        @auth


            <span class="text-green-800 text-2xl">{{auth()->user()->name}}
            <form action="{{route("logout")}}" method="POST" class="mb-6">
                @csrf
                <button class="btn btn-primary" type="submit">Logout</button>
            </form>

        @endauth

    </div>

</header>

{{--Diseño pantalla móvil--}}
<header class="lg:hidden flex flex-row justify-center items-center p-5 space-x-5
 bg-header
">
    <img class="max-h-full w-48 " src="{{asset("/images/logo.png")}}" alt="logo">

    <div class=" flex flex-col space-y-3 ">

        @guest
            <div class="relative">

                <input type="checkbox" class="peer sr-only" id="menu_login">
                <label for="menu_login">
                    <img class="w-6 h-6 " src="{{asset("/images/burger.png")}}" alt="burguer button">
                </label>
                <label for="menu_login" class="fixed inset-0 bg-black/40
                            opacity-0 pointer-events-none
                            peer-checked:opacity-100
                            peer-checked:pointer-events-auto
                            transition-opacity duration-300
                    "></label>

                <div class="hidden peer-checked:flex  flex-col  absolute left-8 ">
                    <a href="{{route("login")}}">
                        <button class="btn btn-sm btn-primary">{{__("Login")}}</button>
                    </a>
                    <a href="{{route("register")}}">
                        <button class="btn btn-sm btn-primary">{{__("Register")}}</button>
                    </a>
                </div>
            </div>
        @endguest


        @auth
            <div class="relative">
                <input type="checkbox" id="logout" class="peer hidden sr-only">
                <label for="logout" class="flex flex-row bg-gray-100 p-1 cursor-pointer">
                    <span class="text-green-800 text-2xl ">{{auth()->user()->name}}</span>
                    <img src="/images/arrow_down.webp" alt="flecha-icono" class="w-10">
                </label>
                <form action="{{route("logout")}}" method="POST" class=" p-2 hidden peer-checked:flex absolute left-8">
                    @csrf
                    <button class="btn btn-primary" type="submit">Logout</button>
                </form>
            </div>

        @endauth


        <div class="relative">
            <label for="menu_lang">
                <img class="w-6 h-6 " src="{{asset("/images/language.png")}}" alt="burguer button">
            </label>
            <input type="checkbox" class="peer sr-only" id="menu_lang">

            <form action="{{route("set_lang")}}" method="POST" class="hidden peer-checked:flex flex-col absolute left-6 top-0 bg-white p-2">
                @csrf
                @foreach(config("langs") as $lang => $detail)
                    <button type="submit" name="lang" value="{{$lang}}">{{$detail['flag']}}</button>
                    @endforeach
                    </select>
            </form>
        </div>

</header>
