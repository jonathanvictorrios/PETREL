{{-- <h1>Lista de Programas Locales</h1>
<table>
    <thead>
        <tr>
            <th>ID Programa</th>
            <th>Url Programa</th>
        </tr>
    </thead>
    <a href=" {{ route('programaLocal.create') }} ">Crear</a>
    <tbody>
        @foreach ($colProgramasLocales as $programa)
            <tr>
                <td>{{ $programa->id_programa_local}}</td>
                <td>{{ $programa->url_programas}}</td>
                <td><a href="{{ $programa->url_programas }}">ir</a></td>
                <td><a href="{{ route('programaLocal.show', $programa->id_programa_local) }}">Ver</a></td>
            </tr>
        @endforeach
    </tbody>
</table> --}}