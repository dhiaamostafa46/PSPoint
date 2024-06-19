@extends('layouts.dashboard')
<style>
  @media print {
  body {
    visibility: hidden;
  }
  #section-to-print {
    visibility: visible !important;
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> {{ trans('Products.Branchwindows') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb floatmleft">
            <li class="breadcrumb-item"><a href="#">{{ trans('Products.Branchwindows') }} </a></li>
            <li class="breadcrumb-item active"> {{ trans('Products.details') }} </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ trans('Products.details') }}</h3>
          </div>
          <div class="card-body">
            <form class="user" method="POST" action="#" enctype = "multipart/form-data">
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username"> {{ trans('Products.windowName') }}</label>
                      <h6 class="text-primary">{{$drivethru->qrNo}}</h6>
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-lg-6" id="section-to-print">
                    <div class="form-group">
                      <div class="demo" style="display: block;margin-top:2px;"></div>
                      <button class="btn btn-danger no-print" type="button" onclick="printDiv();">{{ trans('Products.Print') }} <i class="fa fa-print"></i></button>
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="{{asset('dist/jquery-qrcode.js')}}"></script>


<script>
  function printDiv(){
    window.print();
  }
  let id = {{$drivethru->id}};
  let branchID = {{$drivethru->branchID}};
  let url = window.location.protocol + '//' + window.location.host;
   $(".demo").qrcode({
      size: 150,
      fill: '#333',
      text:  url+"/drivethru/"+branchID+"/"+id,
      mode: 3,
      //label: 'elite fitness',
      fontcolor: '#000',
    });
    $("canvas").css({border:'solid white',});
</script>
@endsection
