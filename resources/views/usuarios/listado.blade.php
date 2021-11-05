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
              <table id="example1" class="table table-bordered table-striped">
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
                    @Actived()
                    <td>
                    <a href="{{ url('/usuarios/activate/' . $user->id) }}" title="Activar este registro" class="disabled">
                                        <i class="fa fa-check-circle-o text-green"></i>
                      </a>
                      <a href="" title="Desactivar este registro">
                                        <i class="fa fa-times-circle text-danger"></i>
                      </a>
                    </td>
                    <td>
                      <a href="/usuarios/{{$user->id}}/edit" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                        <i class="fa fa-fw fa-pencil"></i>
                      </a>
                      <a href="" title="Eliminar este registro">
                                        <i class="fa fa-trash-o text-danger"></i>
                      </a>
                    </td>
                    @else
                    <a href="{{ url('/usuarios/activate/' . $user->id) }}" title="Activar este registro">
                                        <i class="fa fa-check-circle-o text-green"></i>
                      </a>
                      <a href="" title="Desactivar este registro">
                                        <i class="fa fa-times-circle text-danger"></i>
                      </a>
                    </td>
                    <td>
                      <a href="/usuarios/{{$user->id}}/edit" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                        <i class="fa fa-fw fa-pencil"></i>
                      </a>
                      <a href="" title="Eliminar este registro">
                                        <i class="fa fa-trash-o text-danger"></i>
                      </a>
                    </td>
                    @endActived
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

  
