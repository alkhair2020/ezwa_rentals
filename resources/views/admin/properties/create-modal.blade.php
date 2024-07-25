<!-- Add Modal -->
<div class="modal fade" id="Add_item" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">اضافة غرفة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('store-room')}}" method="POST" 
                    name="le_form"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-body col-md-6"  >
                            <div class="" style="    border: 1px solid #e7e5e5;">
                                <h4 class="m-1" style="border-right: 2px solid #1bc6fe !important;border-top: 2px solid #1bc6fe;    padding: 4px;">المعلومات الاساسية</h4>
                                <div class="row m-1">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">رقم الغرفة</label>
                                            <input type="number" name="number" id="numberId" class="form-control" placeholder="اكتب رقم الغرفة"
                                            name="fname">
                                            <span id="numberError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">الطابق</label>
                                            <input type="number" name="floor" id="numberId" class="form-control" placeholder="اكتب رقم الطابق"
                                            name="fname">
                                            <span id="numberError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">عدد الغرف</label>
                                            <input type="number" name="rooms" id="roomsId" class="form-control" placeholder="اكتب عدد الغرف"
                                            name="fname">
                                            <span id="roomsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4"> عدد دورات المياة</label>
                                            <input type="number" name="baths" id="bathsId" class="form-control" placeholder=" عدد الحمامات" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">عدد الأسٍرة المفردة</label>
                                            <input type="number" name="num_single_bed" id="bathsId" class="form-control" placeholder="عدد الأسٍرة المفردة" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">عدد الأسٍرة المزدوجة</label>
                                            <input type="number" name="num_double_bed" id="bathsId" class="form-control" placeholder="عدد الأسٍرة المزدوجة" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">عدد الخزائن</label>
                                            <input type="number" name="num_locker" id="bathsId" class="form-control" placeholder="عدد الخزائن" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">عدد التلفزيونات</label>
                                            <input type="number" name="num_TVs" id="bathsId" class="form-control" placeholder="عدد التلفزيونات" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">نوع المكيف</label>
                                            <input type="number" name="conditioner_type" id="bathsId" class="form-control" placeholder="نوع المكيف" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">نوع الغرفة</label>
                                            <input type="number" name="price_id" id="bathsId" class="form-control" placeholder="" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-body col-md-6">
                            <div class="" style="    border: 1px solid #e7e5e5;">
                            <h4 class="m-1" style="border-right: 2px solid #1bc6fe !important;border-top: 2px solid #1bc6fe;    padding: 4px;"> المميزات العامة</h4>
                                <div class="row m-1">
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="internet" id="radio1">
                                                    <label for="radio1"> انترنت</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="parking" id="radio1">
                                                    <label for="radio1">مواقف سيارات</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="elevator" id="radio1">
                                                    <label for=""> مصعد</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="cleaning_rooms" id="radio1">
                                                    <label for=""> تنظيف غرف</label>
                                                </div>
                                    </div>
                                    
                                </div>
                            </div><br>
                            <div class="" style="    border: 1px solid #e7e5e5;">
                            <h4 class="m-1" style="border-right: 2px solid #1bc6fe !important;border-top: 2px solid #1bc6fe;    padding: 4px;"> المميزات الخاصة</h4>
                                <div class="row m-1">
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="telephone_directory" id="radio1">
                                                    <label for="radio1">دليل الهاتف</label>
                                                </div>
                                       
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="oven" id="radio1">
                                                    <label for="radio1">فرن</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="newspaper" id="radio1">
                                                    <label for="radio1">الصحيفة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="microwave" id="radio1">
                                                    <label for="radio1">مايكرويف</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="qibla" id="radio1">
                                                    <label for="radio1">تحديد القبلة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="washing_machine" id="radio1">
                                                    <label for="radio1">غسالة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="list_restaurant" id="radio1">
                                                    <label for="radio1">قائمة المطاعم</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="iron" id="radio1">
                                                    <label for="radio1"> مكواة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="fridge" id="radio1">
                                                    <label for="radio1"> ثلاجة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="dining_table" id="radio1">
                                                    <label for="radio1"> طاولة طعام</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="lounge" id="radio1">
                                                    <label for="radio1"> صالة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="kitchen" id="radio1">
                                                    <label for="radio1"> مطبخ</label>
                                                </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="" style="    border: 1px solid #e7e5e5;">
                                <h4 class=" m-1" style="border-right: 2px solid #1bc6fe !important;border-top: 2px solid #1bc6fe;    padding: 4px;">ملاحظات</h4>
                                <div class="row m-1 ">
                                    <div class="col-md-12">
                                            <textarea id="descriptionId" rows="1" class="form-control" name="description" placeholder=""></textarea>
                                            <span id="descriptionError" class="error-message"></span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <button type="submit" class=" btn btn-primary float-right"> حفظ </button>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- /ADD Modal -->