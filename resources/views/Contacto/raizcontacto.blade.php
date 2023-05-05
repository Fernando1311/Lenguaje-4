@extends('layouts.plantilla') 

@section('titulo', 'Lista de Contactos')
@section('contenido')

  <br><br>
  @if (session('mensaje'))
    <div class="alert alert-success">
      {{ session('mensaje') }}
    </div>
  @endif
  
  <div class="container">
    <h4>Gestion de Contactos</h4>
    <div class="row">
      <div class="col-xl-12">
        <form action="{{ route('contacto.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscar" value="{{$texto}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-warning" href="{{ route('contacto.index') }}">Volver</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xl-12">
      </div>
    </div>
  </div>

  <div>
    <br><br>
  <h1><center>LISTA DE CONTACTOS</center></h1>
  </div>

  

  <a class="btn btn-outline-primary" href="{{ route('contacto.crear') }}">Agregar Contactos</a>
    
  <br>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellito</th>
          <th scope="col">Correo Electronico</th>
          <th scope="col">Telefono</th>
          <th colspan="4"><center>Acciones</center></th>
        </tr>
      </thead>
      <tbody>
      
        @forelse ( $contactos as $contacto )
          <tr>
            <th scope="row">{{ $contacto->id }}</th>
            <td>{{ $contacto->nombre }} </td>
            <td>{{ $contacto->apellido }}</td>
            <td>{{ $contacto->correo_electronico }}</td>
            <td>{{ $contacto->telefono }}</td>
            <td> <a  class="btn btn-success" href="{{ route('contacto.mostrar' , ['id'=>$contacto->id]) }}" >Ver</a>
            <td><a  class="btn btn-warning" href="{{ route('contacto.edit' , ['id'=>$contacto->id]) }}" >Editar</a></td>
            <td>
                  <form method="POST" action="{{ route('contacto.borrar', ['id'=>$contacto->id]) }}">
                      @csrf
                      @method('delete')
                      <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
            </td>
         </tr>
        @empty
          <tr>
            <td colspan="4">No hay un Contacto registrado de esa Manera</td>
          </tr>
        @endforelse
      </tbody>
    </table>  
    {{ $contactos->render('pagination::bootstrap-4') }}
@endsection