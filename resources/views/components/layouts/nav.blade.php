
<nav class="lg:h-nav bg-nav flex flex-col lg:flex-row
px-5 justify-start items-center lg:space-x-2">
    <a href="{{route("main")}}" class="btn btn-glass w-full lg:w-auto">Home</a>
    <a href="{{route("about")}}" class="btn btn-glass w-full lg:w-auto">About</a>
    <a href="{{route("noticias")}}" class="btn btn-glass w-full lg:w-auto">Noticias</a>
{{--    <a href="{{route("alumnos")}}" class="btn btn-glass w-full lg:w-auto">Alumnos</a>--}}
{{--    <a href="{{route("profesores")}}" class="btn btn-glass w-full lg:w-auto">Ver mejs</a>--}}


    @auth
        <a href="/projects" class="btn btn-primary w-full lg:w-auto">Proyectos</a>
        <a href="/students" class="btn btn-primary w-full lg:w-auto">Estudiantes</a>
        <a href="/teachers" class="btn btn-primary w-full lg:w-auto">Profesores</a>
    @endauth

</nav>






