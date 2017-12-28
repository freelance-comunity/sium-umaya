@extends('layout.principal') {{-- @section('campus') {{$plantel->nombre}} @endsection --}} @section('title',"Menu principal")
  @section('css')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  @endsection
@section('contenido')
<section class="content-header">
  <h1>
            Profesiones

        </h1> @section('menuLateral')
  <li>
    <a href="{{url("catalogos")}}">
                          <i class="fa fa-book"></i> <span>Catalogos</span></i>
                      </a>

  </li>
  <li>
    <a href="{{url("profesion")}}">
                  <i class="fa fa-tags"></i> <span>profesiones</span></i>
              </a>

  </li>
  @endsection
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-header">
      {{-- <h3 class="box-title">Profesiones</h3> --}}
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="col-md-1"></div>
      <div class="col-md-12">
        @if(session('success'))
        <div class="callout callout-success">
          <p>{{session('success')}}</p>
        </div>
        @elseif(session('error'))
        <div class="callout callout-warning">
          <p>{{session('error')}}</p>
        </div>
        @endif
        <div class="row">
          <h1 class="pull-left">Profesiones</h1>
          <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('profesion.create') !!}">Agregar Nueva Profesión</a>
        </div>
        @if ($profesiones->isEmpty())
        <div class="well text-center">Ho hay profesiones registradas.</div>
        @else
        <div class="table-responsive col-md-12">
          <table id="myTable" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th width="5">#</th>
                <th>Nombre</th>
                <th>Detalle</th>
              </tr>
            </thead>
            <tbody>
              @foreach($profesiones as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td>
                  <a href="{{ url('profesion/' . $item->id . '/edit') }}" title="Horario" class="btn btn-warning">
                                          <i class="fa fa-pencil fa-lg"></i>
                                      </a>
                  <a class="btn btn-danger" href="{{url('eliminarProfesion')}}/{{$item->id}}" onclick="return confirm('¿Estas seguro de eliminar esta profesión?')"><i class="fa fa-trash fa-lg"></i></a>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
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
