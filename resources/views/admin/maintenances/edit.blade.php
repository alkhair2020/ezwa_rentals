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
                    <h4 class="card-title" id="basic-layout-form">تعديل الاستمارة </h4>
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

                        <form  method="post" action="{{route('maintenances.update',$maintenance->id)}}" enctype="multipart/form-data" class="form" name="le_form">
                            @csrf
                            @method('put')
                            <div class="form-body">
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput5">اختر رقم الوحدة</label>
                                            <select name="property_id" class="form-control" id="propertyId">
                                                <option value="" selected="" disabled="">اختر رقم الوحدة</option>
                                                @foreach ($properties as $property)
                                                <option value="{{$property->id}}" {{ $property->id == $maintenance->property_id ? "selected" : "" }}>{{$property->number}}</option>
                                                @endforeach
                                            </select>
                                            <span id="property_idError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput5">اختر رقم العقد</label>
                                            <select name="client_id" class="form-control" id="propertyId">
                                                <option value="" selected="" disabled="">اختر رقم العقد</option>
                                                @foreach ($clients as $client)
                                                <option value="{{$client->id}}" {{ $client->id == $maintenance->client_id ? "selected" : "" }}>{{$client->id}}</option>
                                                @endforeach
                                            </select>
                                            <span id="property_idError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>
                                            <strong>نوع العطل</strong>
                                            <span class="required">*</span>
                                            </h5>
                                        
                                        </div>
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="skin skin-square">
                                                <input type="checkbox" value="1" name="bathroom" {{ $maintenance->bathroom == '1' ? 'checked' : '' }}>
                                                <label for="radio1">دورات المياة</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="bathroom_desc" id="amountId" class="form-control" placeholder="وصف العطل" value="{{$maintenance->bathroom_desc}}">
                                            <span id="amountError" class="error-message"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="skin skin-square">
                                                <input type="checkbox" value="1" name="conditioning" {{ $maintenance->conditioning == '1' ? 'checked' : '' }}>
                                                <label for="radio1"> المكيفات</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="conditioning_desc" id="amountId" class="form-control" placeholder="وصف العطل" value="{{$maintenance->conditioning_desc}}">
                                            <span id="amountError" class="error-message"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="skin skin-square">
                                                <input type="checkbox" value="1" name="door" {{ $maintenance->door == '1' ? 'checked' : '' }}>
                                                <label for="radio1"> الأبواب</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="door_desc" id="amountId" class="form-control" placeholder="وصف العطل" value="{{$maintenance->door_desc}}">
                                            <span id="amountError" class="error-message"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="skin skin-square">
                                                <input type="checkbox" value="1" name="room" {{ $maintenance->room == '1' ? 'checked' : '' }}>
                                                <label for="radio1"> الغرف</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="room_desc" id="amountId" class="form-control" placeholder="وصف العطل" value="{{$maintenance->room_desc}}">
                                            <span id="amountError" class="error-message"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="skin skin-square">
                                                <input type="checkbox" value="1" name="kitchen" {{ $maintenance->kitchen == '1' ? 'checked' : '' }}>
                                                <label for="radio1"> المطبخ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="kitchen_desc" id="amountId" class="form-control" placeholder="وصف العطل" value="{{$maintenance->kitchen_desc}}">
                                            <span id="amountError" class="error-message"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="skin skin-square">
                                                <input type="checkbox" value="1" name="other" {{ $maintenance->other == '1' ? 'checked' : '' }}>
                                                <label for="radio1"> أخرى</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="other_desc" id="amountId" class="form-control" placeholder="وصف العطل" value="{{$maintenance->other_desc}}">
                                            <span id="amountError" class="error-message"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <input type="submit" class="btn btn-primary" value="حفظ" />

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
@endsection