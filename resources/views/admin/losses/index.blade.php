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
            <div class="dropdown float-md-right mb-1">
                <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2"> إضافة جديد</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> المفقودات</h4>
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
                                    <th> رقم الوحدة</th>
                                    <th>الادوات</th>
                                    <th> العدد</th>
                                    <th> الحالة</th>
                                    <th> ملاحظة</th>
                                    <th class="text-center"> العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($losses as $item)
                                <tr>
                                    <td>{{$item->properties->number}}</td>
                                    <td>{{$item->name}}</td>
                                    <td> {{$item->count}}</td>
                                    <td> 
                                        @if($item->status==1)
                                            ✓
                                        @else
                                            ✖
                                        @endif
                                    </td>
                                    <td> {{$item->notes}}</td>
                                    
                                    <td class="text-center">
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{ url('admin/receipts/print', $item->id) }}">
                                            <button type="button" class="btn btn-icon btn-info mr-1"><i
                                                    class="la la-print"></i></button>
                                        </a>
                                        <button type="button" class="btn btn-icon btn-success mr-1"><i
                                                class="la la-edit"></i></button>

                                        <a data-toggle="modal" data-catid="{{ $item->id }}" data-target="#delete"
                                            class="delete-course">
                                            <button type="button" class="btn btn-icon btn-danger mr-1"><i
                                                    class="la la-trash"></i></button>
                                        </a>
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
    <!-- Add Modal -->
    <div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اضافة مفقود</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('losses.store')}}" method="POST" 
                        name="le_form"  enctype="multipart/form-data">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>رقم الوحدة</label>
                                    <select name="client_id" class="form-control" id="clientId">
                                        <option value="" selected="" disabled="">حدد رقم الوحدة</option>
                                        @foreach ($clients as $_item)
                                        <option value="{{$_item->id}}">{{$_item->properties->number }}</option>
                                        @endforeach
                                    </select>
                                    <span id="clientError" class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label> الأداه المفقودة</label>
                                    <input type="text" name="name" id="amountId" class="form-control">
                                    <span id="amountError" class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>العدد</label>
                                    <input type="number" name="count" id="amountId" class="form-control">
                                    <span id="amountError" class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>الملاحظة</label>
                                    <input type="text" name="notes" id="amountId" class="form-control">
                                    <span id="amountError" class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <h5>
                                    <strong>الحالة</strong>
                                    <span class="required">*</span>
                                    </h5>
                                    <div class="controls">
                                        <div class="skin skin-square">
                                            <input type="radio" value="1" name="status" required id="radio1">
                                            <label for="radio1">تم الشراء</label>
                                        </div>
                                        <div class="skin skin-square">
                                            <input type="radio" value="0" name="status" id="radio2">
                                            <label for="radio2">لم يتم الشراء</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"> حفظ </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD Modal -->
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
                                <form method="post" action="{{route('losses.destroy','test')}}">
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
<!--/ Multi-column ordering table -->


<script>
    function Validateallinput() {
        
        
        var clientId = document.getElementById("clientId");
        var clientError = document.getElementById("clientError");

        var amountId = document.getElementById("amountId");
        var amountError = document.getElementById("amountError");
        
        if (clientId.value == "") {
            clientError.innerHTML = "اختر العميل ";
            return false;
        }
        clientError.innerHTML = "";
       
        if (amountId.value == "") {
            amountError.innerHTML = "اكتب المبلغ ";
            return false;
        }
        amountError.innerHTML = "";

        $('.loader-container').show();
    }
</script>
<style>
    .error-message {
        color: #cb4b4b;
    }
</style>
@endsection