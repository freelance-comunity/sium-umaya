@extends('layout.principal') {{-- @section('campus') {{$plantel->nombre}} @endsection --}} @section('title',"Menu principal") @section('css')
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
@endsection @section('contenido')
<section class="content-header">
  <h1>
            Personal

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
      <h3 class="box-title">Catalogos</h3>
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
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Profesiones </h3>
              <p><strong>Sistema</strong></p>
            </div>
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <a href="{{ url("profesion") }}" class="small-box-footer">
                    Acceder <i class="fa fa-arrow-circle-right"></i>
                </a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</section>
@endsection
