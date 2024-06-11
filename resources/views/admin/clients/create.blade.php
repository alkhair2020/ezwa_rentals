@extends('layout.admin_main')
@section('content')
<section id="basic-form-layouts">
    <div class="content-header row">
        <div class="col-md-2"></div>
        @if (count($errors) > 0)
        @include('admin.includes.alerts.error')
        @endif
        @if(session()->has('message'))
        @include('admin.includes.alerts.success')
        @endif
        <div class="col-md-2"></div>
    </div>
    <div class="row match-height">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">عميل جديد</h4>
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
                    <div class="card-body">

                        <form class="form" action="{{route('clients.store')}}" method="POST" name="le_form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> بيانات العميل</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput5">نوع الإثبات</label>
                                            <select name="type" class="form-control" id="typeId">
                                                <option value="" selected="" disabled="">اختر نوع الهوية</option>
                                                <option value="national identity">هوية وطنية</option>
                                                <option value="accommodation">إقامة</option>
                                                <option value="visitor">زائر</option>
                                            </select>
                                            <span id="typeError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput4">رقم الهوية</label>
                                            <input type="text" name="id_number" id="id_numberId" class="form-control"
                                                placeholder="رقم الهوية">
                                            <span id="id_numberError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">الإسم بالكامل</label>
                                            <input type="text" name="name" id="nameId" class="form-control"
                                                placeholder="أسم العميل" name="fname">
                                            <span id="nameError" class="error-message"></span>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">رقم الجوال</label>
                                            <input type="number" name="phone" id="phoneId" class="form-control"
                                                placeholder="رقم الجوال">
                                            <span id="phoneError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput5">الجنسية</label>
                                            <select name="nationality" class="form-control" id="nationalityId">
                                                <option value="" selected="" disabled="">اختر الجنسية</option>
                                                <option value="سعودي">سعودي</option>
                                                <option value="مقيم">مقيم</option>
                                            </select>
                                            <span id="nationalityError" class="error-message"></span>
                                        </div>
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4"> عدد الافراد</label>
                                            <input type="number" name="number_companions" id="number_companionsId"
                                                class="form-control" placeholder="عدد الافراد">
                                            <span id="number_companionsError" class="error-message"></span>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="form-section"><i class="la la-paperclip"></i> بيانات العقد</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput5">الوحدة</label>
                                            <select name="property_id" class="form-control" id="propertyId">
                                                <option value="" selected="" disabled="">اختر الوحدة</option>
                                                @foreach ($properties as $property)
                                                <option value="{{$property->id}}">{{$property->number}}</option>
                                                @endforeach
                                            </select>
                                            <span id="property_idError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput5">نوع الإجار</label>
                                            <select name="property_type" class="form-control" id="property_typeId">
                                                <option value="" selected="" disabled="">اختر نوع الإجار</option>
                                                <option value="monthly">شهري</option>
                                                <option value="weekly">اسبوعي</option>
                                                <option value="daily">يومي</option>
                                            </select>
                                            <span id="property_typeError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput5">عدد (كم يوم  / كم اسبوع / كم شهر ) </label>
                                            <input type="number" name="count_day" id="count_dayId" class="form-control"
                                                data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                                data-title="Date Fixed">
                                            <span id="count_dayError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput4">سعر الايجار</label>
                                            <input type="number" name="price" id="priceId" class="form-control" placeholder="سعر الايجار" >
                                            <span id="priceError" class="error-message"></span>
                                        </div>
                                    </div> -->
                                    
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="issueinput4">نهاية العقد</label>
                                            <input type="date" name="end_date" id="end_dateId" class="form-control"
                                                data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                                data-title="Date Fixed">
                                            <span id="end_dateError" class="error-message"></span>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="issueinput3">بداية تاريخ العقد</label>
                                            <input type="date" name="start_date" id="start_dateId" class="form-control"
                                                data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                                data-title="Date Opened">
                                            <span id="start_dateError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="issueinput3">بداية الوقت للعقد</label>
                                            <input type="time" name="time" id="timeId" class="form-control"
                                                data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                                data-title="Date Opened">
                                            <span id="start_dateError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">الخصم</label>
                                            <input type="number" name="discount" id="discountId" class="form-control" 
                                                placeholder="الخصم" name="fname">
                                            <span id="discountError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">التأمين</label>
                                            <input type="number" name="insurance" id="insuranceId" class="form-control"
                                                placeholder="التأمين">
                                            <span id="insuranceError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1">التكلفة النهائية (اجمالي التكلفة بعد الخصم إذا وجد)</label>
                                            <input type="number" name="total" id="totalId" class="form-control" disabled
                                                placeholder="">
                                            <span id="draftError" class="error-message"></span>
                                        </div>
                                    </div> -->


                                </div>
                                <!-- <div class="form-group">
                            <label for="companyName">Company</label>
                            <input type="text" id="companyName" class="form-control" placeholder="Company Name"
                            name="company">
                        </div> -->

                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary" onclick="return Validateallinput()">
                                    <i class="la la-check-square-o"></i> حفظ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
    function Validateallinput() {


        var idNumberId = document.getElementById("id_numberId");
        var idNumberError = document.getElementById("id_numberError");

        var nameId = document.getElementById("nameId");
        var nameError = document.getElementById("nameError");

        var phoneId = document.getElementById("phoneId");
        var phoneError = document.getElementById("phoneError");


        var typeId = document.getElementById("typeId");
        var typeError = document.getElementById("typeError");

        var nationalityId = document.getElementById("nationalityId");
        var nationalityError = document.getElementById("nationalityError");

        var number_companionsId = document.getElementById("number_companionsId");
        var number_companionsError = document.getElementById("number_companionsError");

        var propertyId = document.getElementById("propertyId");
        var property_idError = document.getElementById("property_idError");

        var count_dayId = document.getElementById("count_dayId");
        var count_dayError = document.getElementById("count_dayError");

        var start_dateId = document.getElementById("start_dateId");
        var start_dateError = document.getElementById("start_dateError");

        var end_dateId = document.getElementById("end_dateId");
        var end_dateError = document.getElementById("end_dateError");

        var property_typeId = document.getElementById("property_typeId");
        var property_typeError = document.getElementById("property_typeError");

        var insuranceId = document.getElementById("insuranceId");
        var insuranceError = document.getElementById("insuranceError");



        if (idNumberId.value == "") {
            idNumberError.innerHTML = "اكتب رقم الهوية";
            return false;
        }
        idNumberError.innerHTML = "";

        /**if (idNumberId.value.length >10 ) {
            idNumberError.innerHTML = "رقم الهوية عشرة ارقام فقط";
            return false;
        }

        if (idNumberId.value.length <10 ) {
            idNumberError.innerHTML = "رقم الهوية لا يقل عن عشرة ارقام";
            return false;
        }
        idNumberError.innerHTML = "";*/

        if (nameId.value == "") {
            nameError.innerHTML = "اكتب اسم العميل";
            return false;
        }
        nameError.innerHTML = "";

        if (phoneId.value == "") {
            phoneError.innerHTML = "اكتب رقم الجوال";
            return false;
        }
        phoneError.innerHTML = "";

        if (typeId.value == "") {
            typeError.innerHTML = "اختر نوع الاثبات";
            // titleid.focus();
            return false;
        }
        typeError.innerHTML = "";

        // if (nationalityId.value == "") {
        //     nationalityError.innerHTML = "اختر الجنسية";
        //     // titleid.focus();
        //     return false;
        // }
        // nationalityError.innerHTML = "";
       
        if (number_companionsId.value == "") {
            number_companionsError.innerHTML = "اكتب عدد الافراد";
            // titleid.focus();
            return false;
        }
        number_companionsError.innerHTML = "";
       
        if (propertyId.value == "") {
            property_idError.innerHTML = "اختر رقم العقار";
            return false;
        }
        property_idError.innerHTML = "";

        if (start_dateId.value == "") {
            start_dateError.innerHTML = "حدد تاريخ بداية العقد";
            return false;
        }
        start_dateError.innerHTML = "";

        if (end_dateId.value == "") {
            end_dateError.innerHTML = "حدد تاريخ نهاية العقد";
            return false;
        }
        end_dateError.innerHTML = "";

        if (property_typeId.value == "") {
            property_typeError.innerHTML = "اختر نوع الايجار";
            return false;
        }
        property_typeError.innerHTML = "";

        if (count_dayId.value == "") {
            count_dayError.innerHTML = "اكتب العدد";
            return false;
        }
        count_dayError.innerHTML = "";
        
        if (property_typeId.value == "monthly") {
            if (count_dayId.value.length >12) {
                property_typeError.innerHTML = "نوع الايجار شهري لا يمكن كتابة اكثر من 12";
                return false;
            }
        }
        property_typeError.innerHTML = "";

        if (property_typeId.value == "weekly") {
            if (count_dayId.value.length >4) {
                property_typeError.innerHTML = "نوع الايجار اسبوعي لا يمكن كتابة اكثر من 4";
                return false;
            }
        }
        property_typeError.innerHTML = "";

        if (property_typeId.value == "daily") {
            if (count_dayId.value.length >30) {
                property_typeError.innerHTML = "نوع الايجار يومي لا يمكن كتابة اكثر من 30";
                return false;
            }
        }
        property_typeError.innerHTML = "";

        if (insuranceId.value == "") {
            insuranceError.innerHTML = "اكتب مبلغ التأمين";
            return false;
        }
        insuranceError.innerHTML = "";
        $('.loader-container').show();
        // return false;
    }
</script>
<style>
    .error-message {
        color: #cb4b4b;
    }
</style>
@endsection