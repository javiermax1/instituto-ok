
<x-layouts.layout>

    <a href="{{route("students.create")}}" class="btn btn-success p-4">Añadir estudiante</a>
    {{--  div para centra tabla  --}}
    <div class="flex justify-center">
        <div class="overflow-x-auto h-120">
            <table class="table table-xs table-pin-rows table-pin-cols">
                <thead>
                <tr class="lg:text-2xl">
                    {{--<th class="hidden sm:flex">Item</th>--}}
                    <th class="text-accent-content/30">Nombre</th>
                    <th class="text-accent-content/30">Edad</th>
                    <th class="text-accent-content/30">Email</th>
                    <th class="text-accent-content/30">DNI</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr class="lg:text-sm">
                        <td>{{$student->name}}</td>
                        <td>{{$student->age}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->dni}}</td>
                        {{--Botón de eliminar item--}}
                        <td>
                            <form action="{{route("students.destroy", $student->id)}}" method="POST">
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

