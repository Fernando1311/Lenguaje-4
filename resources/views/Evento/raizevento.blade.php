@extends('layouts.plantilla') 

@section('titulo', 'Lista de Eventos')
@section('contenido')

  <br><br>
  @if (session('mensaje'))
    <div class="alert alert-success">
      {{ session('mensaje') }}
    </div>
  @endif
  
  <div class="container">
    <h4>Gestion de Eventos</h4>
    <div class="row">
      <div class="col-xl-12">
        <form action="{{ route('evento.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscar" value="{{$texto}}">
            </div>
            <div class="col-auto">
              <br>
              <button type="submit" class="btn btn-primary" value="Buscar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
              </svg> Buscar</button>
              <a class="btn btn-warning" href="{{ route('evento.index') }}">Volver</a>
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
  <h1><center>LISTA DE EVENTOS</center></h1>
  </div>

  <a class="btn btn-outline-primary" href="{{ route('evento.crear') }}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
  </svg> Añadir un NUevo Evento</a>
    
  <br>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col"><center>Titulo</center></th>
          <th scope="col"><center>Descripcion</center></th>
          <th scope="col">Fecha de Inicio</th>
          <th scope="col">Fecha de Finalizacion</th>
          <th scope="col">Id del Contacto</th>
          <th colspan="4"><center>Acciones</center></th>
        </tr>
      </thead>
      <tbody>
      
        @forelse ( $eventos as $evento )
          <tr>
            <th scope="row">{{ $evento->id }}</th>
            <td>{{ $evento->titulo }} </td>
            <td>{{ $evento->descripcion }}</td>
            <td>{{ $evento->fecha_inicio }}</td>
            <td>{{ $evento->fecha_fin }}</td>
            <td>{{ $evento->contacto_id }}</td>
            <td> <a  class="btn btn-success" href="{{ route('evento.mostrar' , ['id'=>$evento->id]) }}" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg> Ver</a>
            <td><a  class="btn btn-warning" href="{{ route('evento.edit' , ['id'=>$evento->id]) }}" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg> Editar</a></td>
            <td>
                  <form method="POST" action="{{ route('evento.borrar', ['id'=>$evento->id]) }}">
                      @csrf
                      @method('delete')
                      <button type="submit" value="Eliminar" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                      </svg>Borrar</button>
                    </form>
            </td>
         </tr>
        @empty
          <tr>
            <td colspan="4">No hay Eventos Exitentes</td>
          </tr>
        @endforelse
      </tbody>
    </table>  
    {{ $eventos->render('pagination::bootstrap-4') }}
@endsection