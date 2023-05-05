@extends('layouts.plantilla')

@section('titulo', 'Formulario de Nota')

@section('contenido')

<br><br>
<h1><center>EDITAR NOTA</center></h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="post" action="{{ route('nota.update', ['id'=>$notas->id]) }}">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="texto">Texto</label>
        <input type="text" class="form-control" name="texto"  id="texto" placeholder="Escriba un Texto" value="{{ $notas->texto }}">
      </div>
      <br>
      <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="datetime-local" class="form-control" name="fecha"  id="fecha" placeholder="Fecha de la Nota" value="{{ $notas->fecha }}">
      </div>
      <br>
      <div class="form-group">
        <label for="idC">Id del Contacto</label>
        <input type="number" class="form-control" name="idC"  id="idC" placeholder="Id de quien pertenece el Evento" value="{{ $notas->contacto_id }}">
      </div>

      <br>
      <button class="btn btn-primary" type="submit">Guardar</button>
      <input class="btn btn-danger" type="reset" value="Borrar">

</form>
@endsection