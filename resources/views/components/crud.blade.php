@props([
    'resource'=>"",
    'campos'=>[], //Array asociativo con nombre_campos => titulo para la tabla ("start_date"=>"Fecha de comienzo")
    'filas'=>[],//Un array de objetos
    //Recogemos el valor de la pagina de la que venimos:
    'page'=>request()->get('page'),
    'page'=>$_GET['page']??1
])


<a href="{{route("$resource.create")}}" class="btn btn-primary">Añadir {{strtoupper($resource)}}</a>
<div class="flex justify-center">
    <div class="overflow-x-auto h-96 ">
        <table class="table table-xs table-pin-rows table-pin-cols">
            <thead>
            <tr class="lg:text-2xl">
                @foreach($campos as $campo)
                    <th>{{$campo}}</th>
                @endforeach
                <th colspan="3">Acciones</th>

            </tr>
            </thead>
            <tbody>

            @foreach($filas as $fila)
                <tr class="lg:text-sm">


                    @foreach($campos as $atributo => $valor)
                        <td>{{$fila->{$atributo} }}</td>
                    @endforeach
                    <td>
                        <form action="{{route("$resource.destroy",$fila->id)}}?page={{request()->get('page')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="button" value="Borrar" class="btn btn-warning"
{{--                                   onclick="return confirm('Seguro que quiers borrar')"--}}
                                onclick="confirmarDelete(this)"
                            >
                        </form>
                    </td>
{{--                    <td>--}}
{{--                       <a href="{{route("$resource.edit", $fila->id)}}?page={{$page}}" class="btn btn-primary">Editar</a>--}}
{{--                        <a href="{{route("$resource.edit", $fila->id)}}?page={{request()->get('page')}}" class="btn btn-primary">Editar</a>--}}
{{--                    </td>--}}

                        <td>
                            <button class="btn btn-primary" onclick="confirmarEditar('{{ route("$resource.edit", $fila->id) }}?page={{ request()->get('page') }}')">
                                Editar
                            </button>
                        </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{$filas->links()}}
    </div>
</div>

{{--SweetAlert: input button para BORRAR--}}
<script>
    function confirmarDelete(button){
        Swal.fire({
            title: "Seguro que quieres borrar??",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Borrado definitivo"
        }).then( (result)=>{
            if(result.isConfirmed)
                button.closest('form').submit()
            }
        );
    }
</script>

{{--SweetAlert: EDITAR--}}
<script>
    function confirmarEditar(url){
        Swal.fire({
            title: "¿Quieres editar este registro?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Sí, editar"
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = url
            }
        });
    }
</script>

