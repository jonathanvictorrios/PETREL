{{-- <h1>Listado de carreras</h1>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colCarpetasCarrera as $carrera)
            <tr>
                <td>{{ $carrera->carrera->carrera }}</td>
                <td>
                    <a href="{{ route('carrera.show', $carrera->id_carpeta_carrera) }}">Editar</a>
                </td>
                <td>
                    <a href=" {{ route('verProgramas',$carrera->id_carpeta_carrera) }} ">Ver programas</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> --}}
