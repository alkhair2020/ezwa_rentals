@extends('layout.admin_main')
@section('content')
<!-- Scroll - horizontal table -->
<!-- Multi-column ordering table -->
<section id="multi-column">
    <div class="content-header row">
        @if(session()->has('message'))
        <!-- <dive class="col-12">
                <div class="alert alert-success mb-2" role="alert">
                    <strong>Well done!</strong> You successfully read this important alertmessage.
                </div>
            </dive> -->
        @include('admin.includes.alerts.success')
        @endif
        @can('property-create')
        <div class="col-md-12 col-12">
            <div class="dropdown float-md-right">
                <a href="{{route('properties.create')}}" class="btn btn-primary float-right mb-2">اضافة وحدة</a>
            </div>
        </div>
        @endcan
    </div>

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الوحدات</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">

                        <table class="table table-striped table-bordered multi-ordering">
                            <thead>
                                <tr>
                                    <th>نوع الوحدات</th>
                                    <th>رقم الوحدة</th>
                                    <th>عدد الغرف</th>
                                    <th>عدد الحمامات</th>
                                    <!-- <th>السعر</th> -->
                                    <th>نسبة الزيادة</th>
                                    <th>الحالة</th>
                                    <!-- <th>العنوان</th> -->
                                    <!-- <th>الوصف</th> -->
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($properties as $property)
                                <tr>
                                    <td>
                                        @if($property->type=="apartment")
                                           شقة
                                        @else 
                                            غرفة   
                                        @endif
                                    </td>
                                    <td>{{$property->number}}</td>
                                    <td>{{$property->rooms}}</td>
                                    <td>{{$property->baths}}</td>
                                    <!-- <td>{{$property->price}}</td> -->
                                    <td>{{$property->percentage}}</td>
                                    <td>
                                        @if($property->status=='rented')
                                            مؤجر
                                        @elseif($property->status=='maintenance')
                                            صيانة 
                                        @elseif($property->status=='notclean')
                                        <span>غير نظيف </span>  (شاغر) 
                                        @elseif($property->status=='notclean_rented')
                                        <span>غير نظيف </span> (مؤجر) 
                                        @elseif($property->status=='waiting')
                                            إنتظار تسجيل الدخول 
                                        @elseif($property->status=='vacant')
                                            شاغر 
                                        @endif
                                    </td>
                                    <!-- <td>{{$property->address}}</td> -->
                                    <!-- <td>{{$property->description}}</td> -->
                                    <td>
                                        @can('client-list')
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{ url('admin/property/clients', $property->id) }}">
                                            <button type="button" class="btn btn-icon btn-info mr-1"><i
                                                class="la la-users"></i></button>
                                        </a>
                                        @endcan
                                        @can('property-edit')
                                        <a class="btn btn-sm bg-success-light" href="{{ route('properties.edit', $property->id) }}">
                                            <button type="button" class="btn btn-icon btn-success mr-1"><i
                                                class="la la-edit"></i></button>
                                        </a>
                                        @endcan
                                        @can('property-delete')
                                        <a data-toggle="modal" data-catid="{{ $property->id }}" data-target="#delete"
                                            class="delete-course">
                                            <button type="button" class="btn btn-icon btn-danger mr-1"><i
                                                    class="la la-trash"></i></button>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div class="modal fade" id="delete" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">حذف</h4>
                        <p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
                        <div class="row text-center">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-2">
                                <form method="post" action="{{route('properties.destroy','test')}}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" id="cat_id">
                                    <button type="submit" class="btn btn-danger ">حذف </button>
                                </form>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/app.js')}}"></script>
<script>
    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var cat_id = button.data('catid')
        var modal = $(this)
        modal.find('.modal-body #cat_id').val(cat_id);
    })
</script>
@endsection