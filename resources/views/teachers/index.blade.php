<x-layouts.layout>
    <x-crud
        resource="teachers"
        :filas="$teachers"
        :campos="$campos" />
</x-layouts.layout>
<table>
    <tr>
        <th>Nombre</th>
        .....
    </tr>
    @foreach($teachers as $teacher)
        <tr>
            <td>{{$teacher->name}}</td>
            ....
        </tr>

    @endforeach
</table>
