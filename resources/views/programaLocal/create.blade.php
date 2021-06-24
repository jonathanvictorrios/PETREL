@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('programaLocal.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>Seleccionar programas</h1>
    <input type="hidden" id="idSolicitud" name="idSolicitud" value="{{$idSolicitud}}">
    <h3>encontrados</h3>
    @foreach ($colProgramasEncontrados as $programa)
        <input type="checkbox" name="urls[]" value="{{$programa->url_programa}}">
        <label>{{$programa->nombre_programa}}</label>
        <br>
    @endforeach
    <br>
    <h3>sugerencias</h3>
    @foreach ($colProgramasSugerencias as $colPrograma)
    <input type="checkbox" name="urls[]" id="{{($colPrograma[0])->nombre_programa}}" value="">
    <label>{{($colPrograma[0])->nombre_programa}}</label><br>
        @foreach ($colPrograma as $programa)
        {{-- cuando elige el radio, se carga la url en el checkbox, myfuncion(nombreprograma,urlDelPdfElegido) --}}
            <input type="radio" onclick="myFuncion('{{$programa->nombre_programa}}','{{$programa->url_programa}}')">
            <label>{{$programa->carpeta_carrera->carpeta_anio->numero_anio}}</label>
            <br>
        @endforeach
    @endforeach
    <br>
    <h3>No encontradas</h3>
    @foreach ($colProgramasNoEncontrados as $programa)
        <label>{{$programa['Programa'].' '. $programa['Anio'] }}</label>
        <br>
    @endforeach
    <input type="submit" value="enviar">
</form>
    
<script>
    function myFuncion(cbox,urlRadio) {
        alert('cbox'+cbox + '  radio: ' + urlRadio);
        var el_checkbox = document.getElementById(cbox);
        el_checkbox.checked = true;
        el_checkbox.value=urlRadio;}
</script>
@endsection