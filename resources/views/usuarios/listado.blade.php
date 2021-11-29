@extends('layouts.lte')

@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Correo</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                <tr>
                    <td>{{ $user-> firstname }}</td>
                    <td>{{ $user-> secondname }}</td>
                    <td>{{ $user-> email }}</td>

                    @Actived($user)
                    <td>
                    <a href="{{ url('/usuarios/activate/' . $user->id) }}" disabled="true" class="btn btn-primary" title="Activar este registro">Activar
                      </a>
                      <a href="{{ url('/usuarios/desactivate/' . $user->id) }}" class="btn btn-primary" title="Desactivar este registro">Desactivar
                      </a>
                    </td>
                    @else
                    <td>
                    <a href="{{ url('/usuarios/activate/' . $user->id) }}" class="btn btn-primary" title="Activar este registro">Activar
                      </a>
                      <a href="{{ url('/usuarios/desactivate/' . $user->id) }}" class="btn btn-primary" disabled="true" title="Desactivar este registro">Desactivar
                      </a>
                    </td>
                    @endActived
                    <td>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-warning" title="Editar este registro">Editar
                      </a>
                    @include('modals.forms.userEdit')
                    <a title="Eliminar este registro" data-toggle="modal" data-target="#exampleModal-{{$user->id}}" class="btn btn-danger">Eliminar
                      </a>
                    @include('modals.userDelete')
                    </td>
                </tr>
                @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@endsection

  
