@extends('layouts.plantilla')

@section('titulo', 'Formulario de Eventos')

@section('contenido')

<br><br>
<h1><center>Crear Nuevo Evento</center></h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form   method="POST" action="{{ route("evento.guardar") }}">
        
    <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" name="titulo"  id="titulo" placeholder="Titulo del Evento">
      </div>
      <br>
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcion"  id="descripcion" placeholder="Descripcion del Evento">
      </div>
      <br>
      <div class="form-group">
        <label for="fechaI">Fecha de Iniciacion</label>
        <input type="datetime-local" class="form-control" name="fechaI"  id="fechaI" placeholder="Fecha Cuando Inicia el Evento">
      <br>
      <div class="form-group">
        <label for="fechaF">Fecha de Finalizacion</label>
        <input type="datetime-local" class="form-control" name="fechaF"  id="fechaF" placeholder="Fecha Cuando Finaliza el Evento">
      </div>
      <br>
      <div class="form-group">
        <label for="idC">Id del Contacto</label>
        <input type="number" class="form-control" name="idC"  id="idC" placeholder="Id de quien pertenece el Evento">
      </div>

      <br>
      <button class="btn btn-primary" type="submit">Guardar</button>
      <input class="btn btn-danger" type="reset" value="Borrar">
      <a class="btn btn-primary" href="{{ route('evento.index') }}">Volver</a>

</form>
@endsection