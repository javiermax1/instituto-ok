<x-layouts.layout>
    <x-crud
        resource="students"
        :filas="$students"
        :campos="$campos" />
</x-layouts.layout>
{{--<table>--}}
{{--    <tr>--}}
{{--        <th>Nombre</th>--}}
{{--        .....--}}
{{--    </tr>--}}
{{--    @foreach($students as $student)--}}
{{--        <tr>--}}
{{--            <td>{{$student->name}}</td>--}}
{{--            ....--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--</table>--}}
