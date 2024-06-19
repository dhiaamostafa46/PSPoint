@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> {{ trans('Account.Accountproofrecord') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb floatmleft">
            <li class="breadcrumb-item"><a href="#">{{ trans('Account.accounts') }} </a></li>
            <li class="breadcrumb-item active"> {{ trans('Account.Accountproofrecord') }} </li>
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
                <h3 class="card-title">      {{ trans('Account.Editaccounts') }}  </h3>
              </div>
              <div class="card-body">
                <form class="user" method="POST" action="{{ route('AccountingGuide.update',$data->id) }}" enctype = "multipart/form-data">
                  @csrf
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-username">  {{ trans('Account.Code') }}   : <span style="color: rgba(255, 0, 0, 0.544);font-size:25px ;    margin: 0px 10px;position: absolute;">*</span></label>
                            <input type="text"  class="form-control @error('Code') is-invalid @enderror" id="CodeID" value="{{$data->AccountID}}" name="CodeID" placeholder="   {{ trans('Account.Code') }} " readonly >
                            @error('CodeID')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">  {{ trans('Account.Mainaccount') }}   :<span style="color: rgba(255, 0, 0, 0.544);font-size:25px ;    margin: 0px 10px;position: absolute;">*</span></label>
                          <select class="form-control @error('nameFather') is-invalid @enderror" id="nameFather"  onkeypress="return ValidateKey();" name="nameFather" placeholder="حساب الاب ">
                            <option  value="0::الميزانية العمومية" > الميزانية العمومية</option>
                            @foreach ($AccountingGuide as $item)
                              @if ($data->type ==$item->AccountName)
                              <option selected  value="{{$item->AccountID}}::{{ $item->AccountName}}::{{ $item->typeProcsss}}">{{ $item->AccountName}}</option>
                              @else
                              <option  value="{{$item->AccountID}}::{{ $item->AccountName}}::{{ $item->typeProcsss}}">{{ $item->AccountName}}</option>
                              @endif

                            @endforeach
                        </select>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">  {{ trans('Account.NameArabic') }}  : <span style="color: rgba(255, 0, 0, 0.544);font-size:25px ;    margin: 0px 10px;position: absolute;">*</span></label>
                          <input type="text"  class="form-control @error('nameAcc') is-invalid @enderror" id="name" value="{{$data->AccountName}}" name="nameAcc" placeholder="  {{ trans('Account.NameArabic') }}  ">
                          @error('nameAcc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">  {{ trans('Account.NameEnglish') }}  : <span style="color: rgba(255, 0, 0, 0.544);font-size:25px ;    margin: 0px 10px;position: absolute;">*</span></label>
                          <input type="text"  class="form-control @error('nameAcc') is-invalid @enderror" id="nameEn"  onkeypress="return ValidateKey();" value="{{$data->AccountNameEn}}" name="nameEn" placeholder="  {{ trans('Account.NameEnglish') }}  ">
                          @error('nameAcc')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      {{-- <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">  الاسم بالانجليزي :</label>
                          <input type="text"  class="form-control @error('nameAccEn') is-invalid @enderror" id="name" value="{{$data->AccountNameEn}}" name="nameAccEn" placeholder=" اسم الدليل ">
                          @error('nameAccEn')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div> --}}

                      {{-- <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username"> عنوان الحساب </label>
                          <select class="form-control @error('typeAccount') is-invalid @enderror" id="typeAccount"  onkeypress="return ValidateKey();" name="typeAccount" placeholder="حساب الاب ">

                             @if ($data->typeProcsss ==0)
                               <option selected value="0">  مدين</option>
                               <option value="1">  دائن</option>
                             @else
                                <option  value="0">  مدين</option>
                                <option selected value="1">  دائن</option>
                             @endif


                        </select>

                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">   الارصدة الافتتاحية :</label>
                          <input type="number"  class="form-control @error('balance') is-invalid @enderror" value="{{$item->Balance}}" id="balance" name="balance" placeholder="الارصدة الافتتاحية">
                          @error('balance')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div> --}}

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username"> {{ trans('Account.Sourcetype') }}    </label>
                            <div class="form-check">
                              <input id="credit" name="SourceAccount" value="0" type="radio" @if ($item->Account_status==0) checked="checked" @endif  class="form-check-input"  required="">
                              <label class="form-check-label" for="credit">  {{ trans('Account.Main') }} </label>
                            </div>
                            <div class="form-check">
                              <input id="debit" name="SourceAccount" value="1" type="radio"@if ($item->Account_status==1) checked="checked" @endif  class="form-check-input" required="">
                              <label class="form-check-label" for="debit">  {{ trans('Account.secondary') }} </label>
                            </div>
                        </div>
                      </div>


                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name"> </label>
                          <br>
                          <input type="submit" class="btn btn-primary" value="{{ trans('Account.save') }} " style="width: 100%">
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







<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script  type="text/javascript">
      $('#nameFather').change(function (event) {
        event.preventDefault();

     var optionSelected = $(this).find("option:selected");
     var valueSelected  = optionSelected.val();
     var data=valueSelected.split("::");

    console.log(data);

     $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });



    console.log(data[0].length);


    $.ajax({
            type: 'post',
            url: "/AccountingGuide.AccountFather/"+data[0],
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(){
                //before sending the request
                //  console.log("sdsdsdfff");

            },
            success: function(response){
                //the request is success
                 console.log(response.count);
                 if(data[0].length<3)
                 {
                    $('#CodeID').val(data[0]+response.count);
                 }else
                 {
                    $('#CodeID').val(data[0]+"00"+response.count);
                 }

            },
            complete: function(response){
                //the request is completed
            //  console.log("fff");
            }
        });



 });
</script>




@endsection
