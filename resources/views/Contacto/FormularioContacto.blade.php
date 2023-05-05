@extends('layouts.plantilla')

@section('titulo', 'Formulario de Contactos')

@section('contenido')

<br><br>
<h1><center>Crear Nuevo Contacto</center></h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form   method="POST" action="{{ isset($contacto) ? route("contacto.update", ["contacto"=> $contacto->id]): route("contacto.guardar") }}">

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre"  id="nombre" placeholder="Nombre del Contacto">
      </div>
      <br>
      <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" name="apellido"  id="apellido" placeholder="Apellido del Contacto">
      </div>
      <br>
      <div class="form-group">
        <label for="correo">Correo Electronico</label>
        <input type="email" class="form-control" name="correo"  id="correo" placeholder="example@email.com">
      </div>
      <br>
      <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" name="telefono"  id="telefono" placeholder="+504 2703-0000">
      </div>

      <br>
      <button class="btn btn-primary" type="submit">Guardar</button>
      <input class="btn btn-danger" type="reset" value="Borrar">
      <a class="btn btn-primary" href="{{ route('contacto.index') }}">Volver</a>

</form>
@endsection