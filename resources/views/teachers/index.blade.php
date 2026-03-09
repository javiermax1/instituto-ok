<x-layouts.layout>

    <a href="{{route("student.create")}}" class="btn btn-success p-4">Añadir Estudiante</a>
    {{--  div para centra tabla  --}}
    <div class="flex justify-center">
        <div class="overflow-x-auto h-120">
            <table class="table table-xs table-pin-rows table-pin-cols">
                <thead>
                <tr class="lg:text-2xl">
                    {{--<th class="hidden sm:flex">Item</th>--}}
                    <th class="text-accent-content/30">Nombre</th>
                    <th class="text-accent-content/30">Departamento</th>
                    <th class="text-accent-content/30">Email</th>
                    <th class="text-accent-content/30">Teléfono</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr class="lg:text-sm">
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->department}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->phone}}</td>
                        {{--Botón de eliminar item--}}
                        <td>
                            <form action="{{route("teachers.destroy", $teacher->id)}}" method="POST">
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

