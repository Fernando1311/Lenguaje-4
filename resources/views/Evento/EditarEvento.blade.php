@extends('layouts.plantilla')

@section('titulo', 'Formulario de Evento')

@section('contenido')

<br><br>
<h1><center>EDITAR EVENTO</center></h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="post" action="{{ route('evento.update', ['id'=>$evento->id]) }}">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" name="titulo"  id="titulo" placeholder="Titulo del Evento" value="{{ $evento->titulo }}">
      </div>
      <br>
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcion"  id="descripcion" placeholder="Descripcion del Evento" value="{{ $evento->descripcion }}">
      </div>
      <br>
      <div class="form-group">
        <label for="fechaI">Fecha de Iniciacion</label>
        <input type="datetime-local" class="form-control" name="fechaI"  id="fechaI" placeholder="Fecha Cuando Inicia el Evento" value="{{ $evento->fecha_inicio }}">
      </div>
      <br>
      <div class="form-group">
        <label for="fechaF">Fecha de Finalizacion</label>
        <input type="datetime-local" class="form-control" name="fechaF"  id="fechaF" placeholder="Fecha Cuando Finaliza el Evento" value="{{ $evento->fecha_fin }}">
      </div>
      <br>
      <div class="form-group">
        <label for="idC">Id del Contacto</label>
        <input type="text" class="form-control" name="idC"  id="idC" placeholder="Id de quien pertenece el Evento" value="{{ $evento->contacto_id }}">
      </div>

      <br>
      <button class="btn btn-primary" type="submit">Guardar</button>
      <input class="btn btn-danger" type="reset" value="Borrar">

</form>
@endsection