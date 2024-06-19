
@extends('layouts.dashboard')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">الموظفين</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="#">الحضور والإنصراف</a></li>
          <li class="breadcrumb-item active">قائمة الحضور والإنصراف</li>
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
                <h3 class="card-title">قائمة الحضور  </h3>
                
                <a type="button" onclick="getLocation(1)"  class="btn btn-primary" style="float:left"><i class="fa fa-sign-in" aria-hidden="true"></i> تسجيل الحضور  </a>
                <a type="button" onclick="getLocation(2)"  class="btn btn-danger" style="float:left;margin-left:10px"><i class="fa fa-sign-out"></i> تسجيل الإنصراف</a>

                <a type="button" href="{{route('attendance.empHourAttendance')}}"  class="btn btn-primary" style="float:left;margin-left:10px"><i class="fa fa-clock"></i>الحضور بالساعه  </a>
              
              </div>
              {{-- <form class="user" method="POST" action="{{ route('employees.storeSalary') }}" enctype = "multipart/form-data">
                @csrf --}}
                      <input type="hidden" id="lat">
                       <input type="hidden" id="long">

                       <input type="hidden" id="type">

                       @if($status != -1)
                         @if($status == 1)
                            <p class="alert alert-success">تم تسجيل الحضور </p>
                         @elseif($status == 0)
                          <p class="alert alert-danger">تعذر تسجيل الحضور لعدم وصولك لموقع العمل</p>
                         @elseif($status == 11)
                         <p class="alert alert-success">تم تسجيل الإنصراف </p>
                         @elseif($status == 33)
                         <p class="alert alert-danger">يرجى تسسجيل الحضور اولا</p>
                         @else
                         <p class="alert alert-danger">عفوا لقد تم التسجيل  مسبقا لهذا اليوم</p>
                         @endif
                      @endif
              {{-- </form> --}}
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>الرقم</th>
                    <!--<th> Code ID</th>-->
                    <th>التاريخ</th>
                    <th>الفرع</th>
                    <th>القسم </th>
                    <th>الحالة </th>
                    <th>وقت الحضور </th>
                    <th>وقت الإنصراف </th>
                    <th>التأخير</th>
                    <th>الإضافي</th>
                    <th>ساعات العمل</th>
                    
                    <th>خيارات</th>
                  </tr>
                  </thead>
                  <tbody>
                        
                  @if (count($attendances) > 0)
                      @foreach ($attendances as $index => $atten)
                      <tr>
                      
                        <td>{{$atten->id}}</td>
                        
                        
                        <td>{{$atten->created_at->format('D  d/m/y')}}</td>
                        <td>{{$atten->employees->brnanch->nameAr}}</td>
                        <td>{{$atten->employees->depart->nameAr}}</td>
                        <td>حضور</td>

                        {{-- <td style="text-align:center" @if($atten->created_at_difference($atten->idEndDate) <  30) class="alert alert-secondary" @endif>
                          {{$atten->idEndDate}}</td> --}}
                  
                          <td style="text-align:center">{{$atten->checkTime}}</td>
                          <td style="text-align:center">{{$atten->checkoutTime}}</td>
                          <td style="text-align:center;color:red">00:00:00</td>
                          <td style="text-align:center;color:green">00:13:00</td>
                          <td>{{$atten->created_at_difference($atten->checkTime,$atten->checkoutTime)}}</td>
                        
                        {{-- <td>
                          <a href="{{route('employees.show',$atten->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> عرض</a>
                          <a href="{{route('employees.custodiesByID',$atten->id)}}" class="btn btn-info"><i class="fa fa-bookmark"></i> العهد</a>
                          <a href="{{route('employees.documentsByID',$atten->id)}}" class="btn btn-danger"><i class="fa fa-file"></i> المستندات</a>
                        </td> --}}
                      </tr>
                      @endforeach
                  @else
                      <tr>
                        <td colspan="7" class="text-center">لا يوجد سجل حضور</td>
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
@endsection
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
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
        window.location.href = "/delete-customer/"+id;
      }
    })
  }

//   $(document).ready(function(){
   
//        alert('test');
//    if(navigator.geolocation){
//        navigator.geolocation.getCurrentPosition(showLocation);
//    }else{ 
//        $('#location').html('Geolocation is not supported by this browser.');
//    }


// });
function getLocation(type)
{
 document.getElementById("type").value =type;
   if(navigator.geolocation){
       navigator.geolocation.getCurrentPosition(showLocation);
   }else{ 
       $('#location').html('Geolocation is not supported by this browser.');
   }
}
function showLocation(position){
var latitude = position.coords.latitude;
var longitude = position.coords.longitude;

 document.getElementById("lat").value= latitude;
 document.getElementById("long").value= longitude;
 var atype =document.getElementById("type").value;
  //  var test = "/storeAttendance?lat="+String(latitude)+"&long="+String(longitude);
  // alert(longitude);
  location.href = "/storeAttendance/"+String(latitude)+"/"+String(longitude)+"/"+atype;
  // $.ajax({
  //       url: "/storeAttendance/"+String(latitude)+"/"+String(longitude),
  //       success: data => {
  //         document.getElementById("lat").value = data.quantity;
  //       }

  //     });



}
</script>
