{{-- <h1>Listado de rendimientos académicos</h1>
<table>
    <thead>
        <tr>
            <th>Solicitud N°</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colRendimientosAcademicos as $rendimientoAcademico)
            <tr>
                <td>{{ $rendimientoAcademico->hoja_resumen->id_solicitud_cert_prog }}</td>
                <td><a href="{{ url('http://localhost/archivos/'.$rendimientoAcademico->url_rendimiento_academico) }}">Ver online</a></td>
            </tr>
        @endforeach
    </tbody>
</table> --}}