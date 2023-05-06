@extends('layouts.plantilla')

@section('titulo', 'Formulario de Notas')

@section('contenido')

<br><br>
<h1><center>Crear Nueva Nota</center></h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form   method="POST"   method="POST" action="{{ route('nota.guardar')}}">
     @csrf
    <div class="form-group">
        <label for="texto">Texto</label>
        <input type="text" class="form-control" name="texto"  id="texto" placeholder="Escriba un Texto">
      </div>
      <br>
      <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" name="fecha"  id="fecha" placeholder="Fecha de la Nota">
      </div>
      <br>
      <div class="form-group">
        <label for="idC">Id del Contacto</label>
        <input type="text" class="form-control" name="idC"  id="idC" placeholder="Id de quien pertenece el Evento">
      </div>

      <br>
      <button class="btn btn-primary" type="submit">Guardar</button>
      <input class="btn btn-danger" type="reset" value="Borrar">
      <a class="btn btn-primary" href="{{ route('nota.index') }}">Volver</a>

</form>
@endsection