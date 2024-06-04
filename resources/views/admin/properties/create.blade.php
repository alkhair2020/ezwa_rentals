@extends('layout.admin_main')
@section('content')
<section id="basic-form-layouts">
    <div class="content-header row">
        <div class="col-md-2"></div>
        @if (count($errors) > 0)
            <!-- <dive class="col-6">
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </dive> -->
            @include('admin.includes.alerts.error')
        @endif
        @if(session()->has('message'))
            <!-- <dive class="col-12">
                <div class="alert alert-success mb-2" role="alert">
                    <strong>Well done!</strong> You successfully read this important alertmessage.
                </div>
            </dive> -->
            @include('admin.includes.alerts.success')
        @endif
        <div class="col-md-2"></div>
    </div>
    <div class="row match-height">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">وحدة جديدة</h4>
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
                    
                    <form class="form" action="{{route('properties.store')}}" method="POST" name="le_form"  enctype="multipart/form-data">
                            @csrf
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i> بيانات الوحدة</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput5">نوع الوحدة</label>
                                        <select id="typeId" name="type" class="form-control">
                                            <option value="" selected="" disabled="">اختر نوع الوحدة</option>
                                            <option value="apartment">شقة</option>
                                            <!-- <option value="house">منزل</option> -->
                                            <option value="room">غرفة</option>
                                            <!-- <option value="basement">بدروم</option> -->
                                        </select>
                                        <span id="typeError" class="error-message"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput1">رقم الوحدة</label>
                                        <input type="number" name="number" id="numberId" class="form-control" placeholder="اكتب رقم الوحدة"
                                        name="fname">
                                        <span id="numberError" class="error-message"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput4">سعر الايجار</label>
                                        <input type="number" name="price" id="priceId" class="form-control" placeholder="سعر الايجار" >
                                        <span id="priceError" class="error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput1">عدد الغرف</label>
                                        <input type="number" name="rooms" id="roomsId" class="form-control" placeholder="اكتب عدد الغرف"
                                        name="fname">
                                        <span id="roomsError" class="error-message"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput4"> عدد الحمامات</label>
                                        <input type="number" name="baths" id="bathsId" class="form-control" placeholder=" عدد الحمامات" >
                                        <span id="bathsError" class="error-message"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput4">عنوان الوحدة</label>
                                        <input type="text" name="address" id="addressId" class="form-control" placeholder="عنوان العقار" >
                                        <span id="addressError" class="error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput5">حالة العقار</label>
                                        <select id="projectinput5" name="status" class="form-control">
                                            <option value="none" selected="" disabled="">اختر الحالة</option>
                                            <option value="1">ساكن</option>
                                            <option value="2">نظيف</option>
                                            <option value="0">بحاجة تنضيف</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput8">ملاحظات /وصف</label>
                                        <textarea id="descriptionId" rows="5" class="form-control" name="description" placeholder="اكتب وصف عن العقار"></textarea>
                                        <span id="descriptionError" class="error-message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <input type="submit" class="btn btn-primary" value="حفظ" onclick="return Validateallinput()"/>
                               
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            
        </div>
    </div>

</section>



<script>
    function Validateallinput() {


        var typeId = document.getElementById("typeId");
        var typeError = document.getElementById("typeError");

        var numberId = document.getElementById("numberId");
        var numberError = document.getElementById("numberError");

        var priceId = document.getElementById("priceId");
        var priceError = document.getElementById("priceError");

        var roomsId = document.getElementById("roomsId");
        var roomsError = document.getElementById("roomsError");

        var bathsId = document.getElementById("bathsId");
        var bathsError = document.getElementById("bathsError");


        var addressId = document.getElementById("addressId");
        var addressError = document.getElementById("addressError");

        
        var descriptionId = document.getElementById("descriptionId");
        var descriptionError = document.getElementById("descriptionError");




        if (typeId.value == "") {
            typeError.innerHTML = "اختر نوع العقار";
            return false;
        }
        typeError.innerHTML = "";

        if (numberId.value == "") {
            numberError.innerHTML = "اكتب رقم العقار";
            return false;
        }
        numberError.innerHTML = "";

        if (priceId.value == "") {
            priceError.innerHTML = "سعر الايجار مطلوب";
            // titleid.focus();
            return false;
        }
        priceError.innerHTML = "";

        if (roomsId.value == "") {
            roomsError.innerHTML = "عدد الغرف مطلوب";
            // titleid.focus();
            return false;
        }
        roomsError.innerHTML = "";

        if (bathsId.value == "") {
            bathsError.innerHTML = "عدد الحمامات مطلوب";
            return false;
        }
        bathsError.innerHTML = "";

       
        // if (addressId.value == "") {
        //     addressError.innerHTML = "اكتب عنوان الشقة ";
        //     return false;
        // }
        // addressError.innerHTML = "";

        // if (descriptionId.value == "") {
        //     descriptionError.innerHTML = "اكتب وصف عن العقار";
        //     return false;
        // }
        // descriptionError.innerHTML = "";

        $('.loader-container').show();
    }
</script>
<style>
    .error-message {
        color: #cb4b4b;
    }
</style>
@endsection
