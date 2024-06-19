@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">الدوامات </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="#">قائمة الدوامات</a></li>
          <li class="breadcrumb-item active">اضافة دوام</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">دوام جديد</h3>
              </div>
              <div class="card-body">
                <form class="user" method="POST" action="{{ route('attendance.storeShift') }}" enctype = "multipart/form-data">
                  @csrf
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">اسم الدوام - عربي</label>
                          <input type="text"  class="form-control @error('nameAr') is-invalid @enderror" id="nameAr" name="nameAr" placeholder="اكتب اسم القسم - عربي">
                          @error('nameAr')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">اسم الدوام - انجليزي</label>
                          <input type="text"  class="form-control @error('nameEn') is-invalid @enderror" id="nameEn"  onkeypress="return ValidateKey();" name="nameEn" placeholder="اكتب اسم القسم - انجليزي">
                          @error('nameEn')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username"> نوع الدوام    </label>
                                <div class="form-check">
                                <input id="TypeProdect"  name="type" value="1" type="radio" onclick="showTime()" class="form-check-input" >
                                <label class="form-check-label" for="credit"> ثابت</label>
                                </div>
                                <div class="form-check">
                                <input id="TypeProdect" name="type" value="2" type="radio"  onclick="hideTime()" class="form-check-input" >
                                <label class="form-check-label" for="debit"> مرن </label>
                            </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">عدد الساعات</label>
                          <input type="text"  class="form-control @error('hours') is-invalid @enderror" id="hours" name="hours" placeholder="أدخل عدد الساعات">
                          @error('hours')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      
                      <div class="col-lg-6" id="stTime" style="display: none">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">  من الساعة</label>
                          <input type="time"  class="form-control text-right @error('stTime') is-invalid @enderror" id="stTime" name="stTime" placeholder="من الساعة">
                          @error('stTime')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6" id="enTime" style="display: none">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username"> الى الساعة</label>
                          <input type="time"  class="form-control text-right @error('enTime') is-invalid @enderror" id="enTime" name="enTime" placeholder="الى الساعة">
                          @error('enTime')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                     
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name"> </label>
                          <br>
                          <input type="submit" class="btn btn-primary" value="حفظ" style="width: 100%">
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  <hr class="my-4" />
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
</section>
@endsection

<script>
  function showTime() {

      document.getElementById('stTime').style.display = "block";
      document.getElementById('enTime').style.display = "block";
    
    
  }
  function hideTime() {
    
      document.getElementById('stTime').style.display = "none";
      document.getElementById('enTime').style.display = "none";
    
  }
</script>