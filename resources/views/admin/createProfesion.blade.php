@extends('layout.principal') {{-- @section('campus') {{$plantel->nombre}} @endsection --}} @section('title',"Menu principal")
  @section('css')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  @endsection
@section('contenido')
<section class="content-header">
  <h1>
            Personal

        </h1> @section('menuLateral')
  <li>
    <a href="{{url(" catalogos ")}}">
                          <i class="fa fa-book"></i> <span>Catalogos</span></i>
                      </a>

  </li>
  <li>
    <a href="{{url(" profesion ")}}">
                  <i class="fa fa-tags"></i> <span>profesiones</span></i>
              </a>

  </li>
  @endsection
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Profesiones</h3>
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
        <form class="" action="{{route('profesion.store')}}" method="post">
          {{ csrf_field() }}
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Profesión</h3>
            </div>

            <div class="box-body">
              <div class="form-group col-sm-6 col-lg-4">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control input-lg" required>
              </div>
              <div class="form-group col-sm-12">
                <input type="submit" value="Guardar" class="btn btn-lg btn-primary">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</section>
@endsection
