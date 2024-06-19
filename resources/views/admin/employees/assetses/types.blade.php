@extends('layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> {{ trans('HR.Asset') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb floatmleft">
                        <li class="breadcrumb-item"><a href="#">{{ trans('HR.employees') }}</a></li>
                        <li class="breadcrumb-item active"> {{ trans('HR.Asset') }}</li>
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
                            <h6 style="display: inline-block"> {{ trans('HR.TypesofAsset') }} </h6>
                            <a type="button" onclick="showModal()" class="btn btn-primary floatmleft"><i
                                    class="fa fa-plus"></i> {{ trans('HR.Add') }} </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">


                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('HR.NameArabic') }}</th>
                                        <th>{{ trans('HR.NameEnglish') }}</th>
                                        <th>{{ trans('HR.Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="salaries">
                                    @if (count($types) > 0)
                                        @foreach ($types as $index => $type)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $type->nameAr }}</td>
                                                <td>{{ $type->nameEn }}</td>
                                                <td>
                                                    <a  data-toggle="modal" data-target="#editModal{{$index}}"  class="btn btn-warning"><i class="fa fa-edit"></i>
                                                        {{ trans('HR.Edit') }}
                                                    </a>

                                                    <div class="modal fade modal" id="editModal{{$index}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"  aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-center" id="exampleModalLabel"> {{ trans('HR.NewAsset') }} </h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="user" method="POST" action="{{ route('assetses.storeType') }}"  enctype = "multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" value="edit" name="flage" >
                                                                        <input type="hidden" value="{{ $type->id}}" name="id" >
                                                                        <div class="pl-lg-4">
                                                                            <div class="row">

                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-control-label" for="input-username">{{ trans('HR.NameArabic') }}
                                                                                        </label>
                                                                                        <input type="text" class="form-control @error('nameAr') is-invalid @enderror"
                                                                                            id="nameAr" name="nameAr" value="{{ $type->nameAr}}">
                                                                                        @error('nameAr')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-control-label" for="input-username">{{ trans('HR.NameEnglish') }}
                                                                                        </label>
                                                                                        <input type="text" class="form-control @error('nameEn') is-invalid @enderror"
                                                                                            id="nameEn" name="nameEn" value="{{ $type->nameEn}}">
                                                                                        @error('nameEn')
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
                                                                                        <button type="submit"class="btn btn-primary"
                                                                                            style="width: 50%;display:inline-block">{{ trans('HR.Save') }} </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center"> {{ trans('HR.NotFoundData') }} </td>
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
    <div class="modal fade modal" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel"> {{ trans('HR.NewAsset') }} </h5>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" action="{{ route('assetses.storeType') }}"  enctype = "multipart/form-data">
                        @csrf
                        <input type="hidden" value="create" name="flage" >
                        <div class="pl-lg-4">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">{{ trans('HR.NameArabic') }}
                                        </label>
                                        <input type="text" class="form-control @error('nameAr') is-invalid @enderror"
                                            id="nameAr" name="nameAr">
                                        @error('nameAr')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">{{ trans('HR.NameEnglish') }}
                                        </label>
                                        <input type="text" class="form-control @error('nameEn') is-invalid @enderror"
                                            id="nameEn" name="nameEn">
                                        @error('nameEn')
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
                                        <button type="submit"class="btn btn-primary"
                                            style="width: 50%;display:inline-block">{{ trans('HR.Save') }} </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>





    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        function showModal() {

            $('#CreateModal').modal('show')
        }

        function handleDelete(id) {
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
                    window.location.href = "/delete-productcategory/" + id;
                }
            })
        }
    </script>
@endsection
