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
                                    <th> اسم العميل</th>
                                    <th> اسم المندوب</th>
                                    <th> نوع التأشيرة</th>
                                    <th> التاريخ</th>
                                    <th> الباركود</th>
                                    <th> رقم الجواز</th>
                                    <th> تاريخ البصمة</th>
                                    <th> تاريخ إصدار التأشيرة</th>
                                    <th> نوع حجز تساهيل</th>
                                    <th> الشركة المنفذة</th>
                                    <th>    </th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td>حمادة</td>
                                    <td>احمد</td>
                                    <td>زيارة</td>
                                    <td>2024-06-13</td>
                                    <td>456476</td>
                                    <td>320725430987</td>
                                    <td>2024-06-13</td>
                                    <td>2024-06-13</td>
                                    <td>شامل الشحن</td>
                                    <td>عائله ابو عاشور</td>
                                    <td>
                                        <a class="btn btn-sm bg-success-light" href="">
                                            <button type="button" class="btn btn-icon btn-success mr-1"><i
                                                class="la la-edit"></i></button>
                                        </a>
                                        <a data-toggle="modal" data-catid="" data-target="#delete"
                                            class="delete-course">
                                            <button type="button" class="btn btn-icon btn-danger mr-1"><i
                                                    class="la la-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
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
<style>
    .btn-sm,
    .btn-group-sm>.btn {
        padding: 0.1rem 0.1rem !important;
    }

    .table th,
    .table td {
        padding: 0.75rem 1rem;
        text-align: center
    }
    .error-message {
        color: #cb4b4b;
    }
</style>
@endsection