@extends('layouts.plantilla')

@section('titulo', 'Producto')

@section('contenido')

<h1>Detalles de {{ $contacto->nombre }} {{ $contacto->apellido }}
    <a class="btn btn-warning" href="{{ route('contacto.edit' , ['id'=>$contacto->id]) }}">editar</a>
</h1>

<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">Campos</th>
        <th scope="col">Valor</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Nombre</th>
            <td>{{ $contacto->nombre }}</td>
          </tr>
        <tr>
            <th scope="row">Alumno</th>
            <td>{{ $contacto->apellido }}</td>
        </tr>
        <tr>
            <th scope="row">Correo Electronico</th>
            <td>{{ $contacto->correo_electronico }}</td>
        </tr>
        <tr>
            <th scope="row">Telefono</th>
            <td>{{ $contacto->telefono }}</td>
        </tr>
    </tbody>

  </table>

  <br>
  <a class="btn btn-primary" href="{{ route('contacto.index') }}">Volver</a>
@endsection