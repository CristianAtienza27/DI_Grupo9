@extends('layouts.lte')

@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Albaranes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nº Pedido</th>
                  <th>Nº Albarán</th>
                  <th>Fecha</th>
                </tr>
                </thead>
                <tbody>

                @forelse($albaranes as $albaran)
                <tr>
                    <td>{{ $albaran-> o_num }}</td>
                    <td>{{ $albaran-> d_num }}</td>
                    <td>{{ $albaran-> d_issue_date }}</td>
                </tr>
                @empty
                <h3>No hay albaranes para mostrar</h3>
                @endforelse

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