<form action="{{ route('hojaResumen.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    
    <input type="number" id="idSolicitud" name="idSolicitud">
    <input type="submit" value="enviar">
</form>

