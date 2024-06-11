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
        <div class="col-md-12 col-12">
            <div class="dropdown float-md-right">
                <a href="{{route('clients.create')}}" class="btn btn-primary float-right mb-2"> عقد جديد</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">العملاء / العقود</h4>
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
                                    <th>الموظف المسئول</th>
                                    <th>اسم العميل</th>
                                    <!-- <th>الجنسية</th> -->
                                    <th> الهوية</th>
                                    <th> رقم الهاتف</th>
                                    <th>رقم العقار</th>
                                    <th>بداية العقد</th>
                                    <th>نهاية العقد</th>
                                    <th>السعر</th>
                                    <th>الخصم</th>
                                    <th>الاجمالي</th>
                                    <th>التأمين</th>
                                    <th>حالة العقد</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <td>{{$client->users->name}}</td>
                                    <td>{{$client->name}}</td>
                                    <!-- <td>{{$client->nationality}}</td> -->
                                    <td>{{$client->id_number}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->properties->number}}</td>
                                    <td>{{$client->start_date}}</td>
                                    <td>{{$client->end_date}}</td>
                                    <td>{{$client->property_price}}</td>
                                    <td>{{$client->discount}}</td>
                                    <td>{{$client->total}}</td>
                                    <td>{{$client->insurance}}</td>
                                    <td>
                                        @if($client->status==0)
                                            منتهي
                                        @else
                                            ساري    
                                        @endif
                                    </td>


                                    <td>
                                        @can('client-print')
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{ url('admin/clients/print', $client->id) }}">
                                            <button type="button" class="btn btn-icon btn-info mr-1"><i
                                                    class="la la-print"></i></button>
                                        </a>
                                        @endcan

                                        @can('receipt-print')
                                        @if($client->receipts)
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{ url('admin/receipts/print', $client->receipts->id) }}">
                                            <button type="button" class="btn btn-icon btn-secondary mr-1"> قبض</button>
                                        </a>
                                        @else
                                        <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                            data-target="#create_receipts">
                                            <!-- <a  class="btn btn-sm bg-success-light" href="{{ url('admin/clients/receipts', $client->id) }}"> -->
                                            <button type="button" class="btn btn-icon btn-secondary mr-1"> قبض</button>
                                        </a>
                                        @endif
                                        @endcan

                                        @can('expense-print')
                                        @if($client->expenses)
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{ url('admin/expenses/print', $client->expenses->id) }}">
                                            <button type="button" class="btn btn-icon btn-light mr-1">
                                               صرف
                                            </button>
                                        </a>
                                        @else
                                        <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                            data-catid="{{ $client->id }}" data-insuranceid="{{ $client->insurance }}"
                                            data-target="#create_expenses">
                                            <!-- <a  class="btn btn-sm bg-success-light" href="{{ url('admin/clients/receipts', $client->id) }}"> -->
                                            <button type="button" class="btn btn-icon btn-light mr-1" style="background: #DADADA;">
                                                صرف
                                            </button>
                                        </a>
                                        @endif
                                        @endcan
                                        <!-- <a  class="btn btn-sm bg-success-light"
                                            href="{{ url('admin/clients/expenses', $client->id) }}">
                                            <button type="button" class="btn btn-icon btn-light mr-1"><i class="la la-plug"></i></button>
                                        </a> -->
                                        @can('client-edit')
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{ route('clients.edit', $client->id) }}">
                                            <button type="button" class="btn btn-icon btn-success mr-1"><i
                                                    class="la la-edit"></i></button>
                                        </a>
                                        @endcan
                                        @can('client-delete')
                                        <a data-toggle="modal" data-catid="{{ $client->id }}"  data-target="#delete"
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
    <div class="modal fade" id="create_expenses" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اضافة سند صرف</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('expenses.store')}}" method="POST" name="le_form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="client_id" id="cat_id">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label> المبلغ</label>
                                    <input type="text" name="amount" class="form-control" id="amount_id">
                                    <input type="hidden" name="insurance" id="insurance_id">
                                    <span id="amountError" class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>ملاحظة </label>
                                    <input type="text" name="notes" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"
                            onclick="return Validateallinput()">حفظ</button>
                    </form>
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
                                <form method="post" action="{{route('clients.destroy','test')}}">
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

    $('#create_expenses').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var cat_id = button.data('catid')
        var insuranceid = button.data('insuranceid')
        var modal = $(this)
        modal.find('.modal-body #cat_id').val(cat_id);
        modal.find('.modal-body #insurance_id').val(insuranceid);
    })

    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var cat_id = button.data('catid')
        var modal = $(this)
        modal.find('.modal-body #cat_id').val(cat_id);
    })
</script>

<script>
    function Validateallinput() {
        var amount_id = document.getElementById("amount_id");
        var amountError = document.getElementById("amountError");
        var insurance_id = document.getElementById("insurance_id");
        if (amount_id.value == "") {
            amountError.innerHTML = "اكتب المبلغ";
            return false;
        }
        amountError.innerHTML = "";
        if (amount_id.value > insurance_id.value) {
            amountError.innerHTML = "خطأ في المبلغ المصروف";
            return false;
        }
        amountError.innerHTML = "";
    }
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
</style>
@endsection