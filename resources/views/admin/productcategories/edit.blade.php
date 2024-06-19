@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"> {{ trans('Products.Productsections') }} </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb floatmleft">
          <li class="breadcrumb-item"><a href="#"> {{ trans('Products.Productsections') }}  </a></li>
          <li class="breadcrumb-item active">  {{ trans('Products.editprodcategories') }}  </li>
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
                <h3 class="card-title">   {{ trans('Products.editprodcategories') }}  </h3>
              </div>
              <div class="card-body">
                <form class="user" method="POST" action="{{ route('prodcategories.update',$prodcategory->id) }}" enctype = "multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">    {{ trans('Products.DepartmentName-Arabic') }}  </label>
                          <input type="text"  class="form-control @error('nameAr') is-invalid @enderror" id="nameAr" name="nameAr" placeholder=" {{ trans('Products.DepartmentName-Arabic') }}" value="{{$prodcategory->nameAr}}">
                          @error('nameAr')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">    {{ trans('Products.DepartmentName-English') }}  </label>
                          <input type="text"  class="form-control @error('nameEn') is-invalid @enderror" id="nameEn"  onkeypress="return ValidateKey();" name="nameEn" placeholder="{{ trans('Products.DepartmentName-English') }} " value="{{$prodcategory->nameEn}}">
                          @error('nameEn')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">  {{ trans('Products.picture') }}  </label>
                          <input type="file" class="form-control" name="img" id="img">
                          @error('img')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">    {{ trans('Products.Orderstore') }}  </label>
                          <input type="number" class="form-control" value="{{$prodcategory->sort}}" name="Sort" id="Sort" required>

                        </div>
                      </div>
                      @if (auth()->user()->organization->type == 2)
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="availableTime">المنتج متوفر في زمن محدد؟</label>
                          <h6>
                            <input type="checkbox" id="availableTime" name="availableTime" value="1" onclick="availableT()" @if(!empty($prodcategory->sFrom)) checked @endif>
                            <label for="availableTime">
                              &nbsp;&nbsp;
                                نعم
                            </label>
                          </h6>
                          @error('availableTime')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                      @endif
                       @if(auth()->user()->organization->activity == 2)
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">  {{ trans('Products.ProductType') }}      </label>
                                    <div class="form-check">
                                    <input id="TypeProdect" @if ($prodcategory->TypeCatagoury ==1)  checked="" @endif name="TypeProdect" value="1" type="radio"  class="form-check-input" >
                                    <label class="form-check-label" for="credit">  {{ trans('Products.Sales') }} </label>
                                    </div>
                                    <div class="form-check">
                                    <input id="TypeProdect"  @if ($prodcategory->TypeCatagoury ==2)  checked="" @endif name="TypeProdect" value="2" type="radio"  class="form-check-input" >
                                    <label class="form-check-label" for="debit">  {{ trans('Products.purchases') }}  </label>
                                    </div>
                                    <div class="form-check">
                                        <input id="TypeProdect" @if ($prodcategory->TypeCatagoury ==3)  checked="" @endif  name="TypeProdect" value="3" type="radio"  class="form-check-input" >
                                        <label class="form-check-label" for="debit"> {{ trans('Products.Manufactur') }} </label>
                                    </div>
                            </div>
                            </div>
                        @endif
                      <div class="col-lg-6" id="sfrom" @if(empty($prodcategory->sFrom)) style="display: none" @endif>
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">زمن توفر المنتج - من الساعة</label>
                          <input type="time"  class="form-control text-right @error('sFrom') is-invalid @enderror" id="sFrom" name="sFrom" placeholder="من الساعة" value="{{$prodcategory->sFrom}}">
                          @error('sFrom')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6" id="sto" @if(empty($prodcategory->sFrom)) style="display: none" @endif>
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">زمن توفر المنتج - الى الساعة</label>
                          <input type="time"  class="form-control text-right @error('sTo') is-invalid @enderror" id="sTo" name="sTo" placeholder="الى الساعة" value="{{$prodcategory->sTo}}">
                          @error('sTo')
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
                          <input type="submit" class="btn btn-primary" value="{{ trans('Products.save') }}" style="width: 100%">
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
  function availableT() {
    if(document.getElementById('availableTime').checked == true){
      document.getElementById('sfrom').style.display = "block";
      document.getElementById('sto').style.display = "block";
    }else{
      document.getElementById('sfrom').style.display = "none";
      document.getElementById('sto').style.display = "none";
    }
  }
</script>
