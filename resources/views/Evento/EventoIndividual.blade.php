@extends('layouts.plantilla')

@section('titulo', 'Evento')

@section('contenido')

<h1>Detalles del Evento: {{ $evento->nombre }}
    <a class="btn btn-warning" href="{{ route('evento.edit' , ['id'=>$evento->id]) }}">Editar</a>
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
            <th scope="row">Titulo</th>
            <td>{{ $evento->titulo }}</td>
          </tr>
        <tr>
            <th scope="row">Descripcion</th>
            <td>{{ $evento->descripcion }}</td>
        </tr>
        <tr>
            <th scope="row">Fecha de Iniciacion</th>
            <td>{{ $evento->fecha_inicio }}</td>
        </tr>
        <tr>
            <th scope="row">Fecha de Finalizacion</th>
            <td>{{ $evento->fecha_fin }}</td>
        </tr>
        <tr>
            <th scope="row">Id del Contacto</th>
            <td>{{ $evento->contacto_id }}</td>
        </tr>
    </tbody>

  </table>

  <br>
  <a class="btn btn-primary" href="{{ route('evento.index') }}">Volver</a>
@endsection