@extends('layouts.plantilla')

@section('titulo', 'Formulario de Contactos')

@section('contenido')
<h1>AGREGAR CONTACTOS</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  method="post" action="{{ route('contacto.update', ['id'=>$contacto->id]) }}">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre"  id="nombre" placeholder="Nombre del Contacto" value="{{ $contacto->nombre }}">
      </div>
      <br>
      <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" name="apellido"  id="apellido" placeholder="Apellido del Contacto" value="{{ $contacto->apellido }}">
      </div>
      <br>
      <div class="form-group">
        <label for="correo">Correo Electronico</label>
        <input type="text" class="form-control" name="correo"  id="correo" placeholder="example@email.com" value="{{ $contacto->correo_electronico }}">
      </div>
      <br>
      <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" name="telefono"  id="telefono" placeholder="+504 2703-0000" value="{{ $contacto->telefono }}">
      </div>

      <br>
      <button class="btn btn-primary" type="submit">Guardar</button>
      <input class="btn btn-danger" type="reset" value="Borrar">

</form>
@endsection
