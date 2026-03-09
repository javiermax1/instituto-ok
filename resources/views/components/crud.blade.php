<x-layouts.layout>
{{--Props es Opcional:--}}
@props([
    'recurso'=>"", 'campos'=>[], 'filas'=>[]
])
    <a href="{{route("$recurso.index")}}" class="btn btn-success p-4">Añadir {{strtoupper($recurso}}</a>
    {{--  div para centra tabla  --}}
    <div class="flex justify-center">
        <div class="overflow-x-auto h-120">
            <table class="table table-xs table-pin-rows table-pin-cols">
                <thead>
                <tr class="lg:text-2xl">
                    @foreach($campos as $campo)
                        <th>{{$campo}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($filas as $fila)
                    <tr class="lg:text-sm">
                        @foreach($fila as $valor)
                            <td>{{$valor}}</td>
                        @endforeach
                        {{--Botón de eliminar item--}}
                        <td>
{{--                            TODO <form action="//{{$valor->id)}}" method="POST">--}}
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Borrar" class="btn btn-secondary"
                                       onclick="return confirm('¿Seguro que quieres borrar?')"
                                >
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-warning">Editar</button>
                            <a haref="{{route('')}}" class="btn btn-warning">Editar</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.layout>

