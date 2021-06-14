<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('archivos.create') }}" class="btn btn-primary">Agregar nuevo archivo</a>
                    <br> <br>
                    <table class="table">
                        <tr>
                            <th>LINK</th>
                        </tr>
                        @forelse ($archivos as $archivo)
                        <tr>
                            <td><a
                                    href="{{ route('archivos.download', $archivo->id_usuario) }}">{{ $archivo->id_usuario }}</a>
                            </td>
                            <td><a href="{{ route('archivos.show', $archivo->id_usuario) }}"><button
                                        class="btn btn-primary" target="_blank">VER ONLINE</button></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No hay archivos</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>