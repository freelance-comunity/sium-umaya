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
      <h3 class="box-title">Cambiar contraseña de <strong>{{$empleado->nombre}} {{$empleado->apellidos}}</strong></h3>
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
        <form class="" action="{{route('reset')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group col-md-4">
            <label for="email">Email</label>
            <input type="text" class="form-control input-lg" name="email" value="{{$user->email}}" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="email">Nueva contraseña</label>
            <input type="hidden" name="user" value="{{$user->id}}">
            <input type="password" class="form-control input-lg" name="password" required>
            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
          </div>
          <div class="form-group col-md-4">
            <label for="email">Repetir contraseña</label>
            <input type="password" class="form-control input-lg" name="password_confirmation" required>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-lg btn-primary" name="" value="Guardar">
          </div>
        </form>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</section>
@endsection
