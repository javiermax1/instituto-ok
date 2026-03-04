<x-layouts.layout>

    <a href="{{route("projects.create")}}" class="btn btn-success p-4">Añadir proyecto</a>
{{--  div para centra tabla  --}}
    <div class="flex justify-center">
    <div class="overflow-x-auto h-120">
    <table class="table table-xs table-pin-rows table-pin-cols">
        <thead>
        <tr class="lg:text-2xl">
        {{--<th class="hidden sm:flex">Item</th>--}}
            <th class="text-accent-content/30">Nombre</th>
            <th class="text-accent-content/30">Descripción</th>
            <th class="text-accent-content/30">Hora</th>
            <th class="text-accent-content/30">Fecha comienzo</th>
            <th class="text-accent-content/30">Acción 1</th>
            <th class="text-accent-content/30">Acción 2</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr class="lg:text-sm">
                <td>{{$project->name}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->hours}}</td>
                <td>{{$project->start_date}}</td>
                {{--Botón de eliminar item--}}
                <td>
                    <form action="{{route("projects.destroy", $project->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Borrar" class="btn btn-secondary"
                        onclick="return confirm('¿Seguro que quieres borrar?')"
                        >
                    </form>
                </td>
                <td>
                    <button class="btn btn-warning">Editar</button>
                {{--<a haref="{{route('')}}" class="btn btn-warning">Editar</a>--}}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
</x-layouts.layout>
