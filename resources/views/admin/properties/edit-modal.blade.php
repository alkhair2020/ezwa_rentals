

<div class="modal fade" id="edit{{$property->id}}" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document" >
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">تعديل الغرفة</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form  method="post" action="{{route('properties.update',$property->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')          
            <div class="row form-row">
                <!-- <input type="hidden" name="id" value="{{$property->id}}" >
                <input type="hidden" name="author" value=" {{Auth::user()->name}}" > -->
                <div class="col-md-12">
                <div class="form-group">
                    <label for="projectinput5">حالة الوحدة </label>
                    <select id="projectinput5" name="status" class="form-control">
                        <option value="" selected="" disabled="">اختر الحالة</option>
                        <option value="rented"  {{ $property->status == 'rented' ? "selected" : "" }}>مؤجر</option>
                        <option value="maintenance"  {{ $property->status == 'maintenance' ? "selected" : "" }}>صيانة </option>
                        <option value="notclean_rented" {{ $property->status == 'notclean_rented' ? "selected" : "" }}>(مؤجر) غير نظيف </option>
                        <option value="notclean" {{ $property->status == 'notclean' ? "selected" : "" }}>(شاغر) غير نظيف </option>
                        <option value="waiting" {{ $property->status == 'waiting' ? "selected" : "" }}> إنتظار تسجيل الدخول </option>
                        <option value="vacant" {{ $property->status == 'vacant' ? "selected" : "" }}>  شاغر</option>
                        <!-- <option value="exit"> خروج اليوم </option> -->
                    </select>
                </div>
                </div>
            </div>
            <h4 class="form-section"><i class="ft-user"></i> بيانات الوحدة</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput5">نوع الوحدة</label>
                                <select id="projectinput5" name="type" class="form-control">
                                    <option value="" selected="" disabled="">اختر نوع الوحدة</option>
                                    <option value="apartment" {{ $property->type == 'apartment' ? "selected" : "" }}>شقة</option>
                                    <!-- <option value="house">منزل</option>-->
                                    <option value="room" {{ $property->type == 'room' ? "selected" : "" }}>غرفة</option>
                                    <!--<option value="basement">بدروم</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput1">رقم الوحدة</label>
                                <input type="number" name="number" id="projectinput1" class="form-control"
                                    placeholder="اكتب رقم الوحدة" name="fname" value="{{$property->number}}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput4">سعر اليوم</label>
                                <input type="number" name="price_day" id="projectinput4" class="form-control"
                                    placeholder="سعر اليوم" value="{{$property->price_day}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput4">سعر الاسبوع</label>
                                <input type="number" name="price_week" id="projectinput4" class="form-control"
                                    placeholder="سعر الاسبوع" value="{{$property->price_week}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput4">سعر الشهر</label>
                                <input type="number" name="price_month" id="projectinput4" class="form-control"
                                    placeholder="سعر الشهر" value="{{$property->price_month}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput4"> نسبة مئوية</label>
                                <input type="number" name="percentage" id="projectinput4" class="form-control"
                                    placeholder="نسبة الزيادة" value="{{ $property->percentage == 0 ? '' : $property->percentage }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput1">عدد الغرف</label>
                                <input type="number" name="rooms" id="projectinput1" class="form-control"
                                    placeholder="اكتب عدد الغرف" name="fname" value="{{$property->rooms}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput4"> عدد الحمامات</label>
                                <input type="number" name="baths" id="projectinput4" class="form-control"
                                    placeholder=" عدد الحمامات" value="{{$property->baths}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput4">عنوان الوحدة</label>
                                <input type="text" name="address" id="projectinput4" class="form-control"
                                    placeholder="عنوان الوحدة" value="{{$property->address}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput5">حالة الوحدة </label>
                                <select id="projectinput5" name="status" class="form-control">
                                    <option value="" selected="" disabled="">اختر الحالة</option>
                                    <option value="rented"  {{ $property->status == 'rented' ? "selected" : "" }}>مؤجر</option>
                                    <option value="maintenance"  {{ $property->status == 'maintenance' ? "selected" : "" }}>صيانة </option>
                                    <option value="notclean_rented" {{ $property->status == 'notclean_rented' ? "selected" : "" }}>(مؤجر) غير نظيف </option>
                                    <option value="notclean" {{ $property->status == 'notclean' ? "selected" : "" }}>(شاغر) غير نظيف </option>
                                    <option value="waiting" {{ $property->status == 'waiting' ? "selected" : "" }}> إنتظار تسجيل الدخول </option>
                                    <option value="vacant" {{ $property->status == 'vacant' ? "selected" : "" }}>  شاغر</option>
                                    <!-- <option value="exit"> خروج اليوم </option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput4">الرقم الضريبي</label>
                                <input type="number" name="tax_number" id="projectinput4" class="form-control" placeholder="الرقم الضريبي" value="{{$property->tax_number}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput8">ملاحظات /وصف</label>
                                <textarea id="projectinput8" rows="1" class="form-control"
                                    name="description" placeholder="اكتب وصف عن العقار"> {{$property->description}}</textarea>
                            </div>
                        </div>
                    </div>
            <button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
            </form>
        </div>
        </div>
    </div>
</div>