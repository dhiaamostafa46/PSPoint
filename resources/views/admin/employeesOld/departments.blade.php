@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">الأقسام </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="#">الأقسام </a></li>
          <li class="breadcrumb-item active">قائمة الأقسام</li>
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
            <div class="card">
              <div class="card-header">
                <h6 style="display: inline-block">الأقسام </h6>
                <a type="button" onclick="showModal()"  class="btn btn-primary" style="float:left"><i class="fa fa-plus"></i> اضافة</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>ألإسم (إنجليزي)</th>
                    <th>تاريخ الإضافة</th>
                    <th>خيارات</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @if (count($departs) > 0)
                      @foreach ($departs as $index => $depart)
                      <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$depart->nameAr}}</td>
                        <td>{{$depart->nameEn}}</td>
                        <td>{{$depart->created_at}}</td>
                        <td>
                          <a href="{{route('employees.show',$depart->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> عرض</a>
                          <a type="button" class="btn btn-info" onclick="showEditModal('EditModal',{{ $depart->id }})"><i class="fa fa-edit"></i> تعديل</a>
                          <a href="#" class="btn btn-danger" onclick="handleDelete({{ $depart->id }})"><i class="fa fa-trash"></i> حذف</a>
                        </td>
                      </tr>

                      <!-- Edit Modal -->
<div class="modal fade modal" id="EditModal{{ $depart->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel"> تعديل القسم   </h5>
       <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <form class="user" method="POST" action="{{route('employees.updateInfo',['id'=>$depart->id,'type'=>'depart'])}}" enctype = "multipart/form-data">
        @csrf
        @method('put')
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">القسم(عربي)</label>
                <input type="text"  class="form-control @error('nameAr') is-invalid @enderror" id="nameAr" name="nameAr" value="{{$depart->nameAr}}">
                @error('nameAr')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">القسم(إنجليزي)</label>
                <input type="text"  class="form-control @error('nameEn') is-invalid @enderror" id="nameEn" name="nameEn" value="{{$depart->nameEn}}">
                @error('nameEn')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
            </div>
            
          </div>
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="float:right">حفظ</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right">تراجع</button>
            </div>
          </div>
          
          
         
        </div>
        </div>
        <hr class="my-4" />
      </form>
    </div>
    <!-- End Edit Modal -->
                      @endforeach
                  @else
                      <tr>
                        <td colspan="5" class="text-center">لا يوجد اقسام</td>
                      </tr>
                  @endif
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>



  <!-- Create Modal -->
<div class="modal fade modal" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel"> قسم جديد  </h5>
       <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <form class="user" method="POST" action="{{route('employees.storeDep')}}" enctype = "multipart/form-data">
        @csrf
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">القسم(عربي)</label>
                <input type="text"  class="form-control @error('nameAr') is-invalid @enderror" id="nameAr" name="nameAr">
                @error('nameAr')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">القسم(إنجليزي)</label>
                <input type="text"  class="form-control @error('nameEn') is-invalid @enderror" id="nameEn" name="nameEn">
                @error('nameEn')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
            </div>
            
          </div>
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="float:right">إضافة</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right">تراجع</button>
            </div>
          </div>
          
          
         
        </div>
        </div>
        <hr class="my-4" />
      </form>
    </div>

      
        
      

@endsection
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
  function showModal() {
        //console.log('star.', id)
      // var form = document.getElementById('deleteCategoryForm')
      // form.action = '/user/delete/' + id
      // form.action = '/Bills/' + id
       $('#CreateModal').modal('show')
    }
  function handleDelete(id){
    Swal.fire({
      title: 'هل انت متأكد من الحذف؟',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#f8a29e',
      confirmButtonText: 'نعم، حذف',
      cancelButtonText: 'لا، الغاء'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "/delete-productcategory/"+id;
      }
    })
  }
  
</script>