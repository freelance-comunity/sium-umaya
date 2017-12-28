@extends('layout.principal')
@section('campus') {{$plantel->nombre}} @endsection
@section('title',"Menu principal")
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<style type="text/css">
  .results tr[visible='false'],
  .no-result {
    display: none;
  }

  .results tr[visible='true'] {
    display: table-row;
  }

  .counter {
    padding: 8px;
    color: #ccc;
  }
</style>
@endsection
 @section('contenido')
<section class="content-header">
  <h1>
            Personal

        </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Modulos</a></li>
    <li class="active">Personal</li>
  </ol>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Gestión Personal</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="col-md-1"></div>
      <div class="col-md-12">
        @if(session('mensaje'))
        <div class="callout callout-success">
          <p>{{session('mensaje')}}</p>
        </div>
        @elseif(session('error'))
        <div class="callout callout-warning">
          <p>{{session('error')}}</p>
        </div>
        @endif
        <div class="table-responsive col-md-12">
          <table id="myTable" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th width="5">#</th>
                <th>Nombre(s)</th>
                <th>Apellidos</th>
                <th class="col-md-2 col-xs-2">correo</th>
                <th>Detalle</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $empleado)
              @php
                $datosEmp = App\Empleado::find($empleado->empleado_id);
              @endphp
              <tr>
                <td>{{$empleado->id}}</td>
                <td>{{$datosEmp->nombre}}</td>
                <td>{{$datosEmp->apellidos}}</td>
                <td>{{$empleado->email}}</td>
                <td>
                  <a href="{{ url("resetear/contraseña") }}/{{$empleado->id}}" title="Horario" class="btn btn-warning">
                                          <i class="fa fa-key fa-lg"></i>
                                      </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</section>
@endsection
@section('js')
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
{{-- <script src="{{ asset('components/plugins/datatables/dataTables.bootstrap.min.js')}}"></script> --}}
<script>
$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>
@endsection
