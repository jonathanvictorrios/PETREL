<form action="{{ route('descargarProgramas') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>Seleccionar programas</h1>
    @foreach ($colProgramas as $programa)
        <input type="checkbox" name="urls[]" value="{{$programa->url_programa}}" checked>
        <label>{{$programa->nombre_programa}}</label>
        <br>
    @endforeach
    <input type="submit" value="enviar">
</form>