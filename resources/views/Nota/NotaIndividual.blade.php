@extends('layouts.plantilla')

@section('titulo', 'Nota')

@section('contenido')

<br><br>
<h1>Detalles de la Nota:
    <a class="btn btn-warning" href="{{ route('nota.edit' , ['id'=>$notas->id]) }}">Editar</a>
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
            <th scope="row">Texto</th>
            <td>{{ $notas->texto }}</td>
          </tr>
        <tr>
            <th scope="row">Fecha</th>
            <td>{{ $notas->fecha }}</td>
        </tr>
        <tr>
            <th scope="row">Id del Contacto</th>
            <td>{{ $notas->contacto_id }}</td>
        </tr>
    </tbody>

  </table>

  <br>
  <a class="btn btn-primary" href="{{ route('nota.index') }}">Volver</a>
@endsection