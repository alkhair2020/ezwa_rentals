@extends('layout.admin_main')
@section('content')
<div class="content-header row">
  <div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title">الإحصائيات</h3>
    <div class="row breadcrumbs-top">
      <div class="breadcrumb-wrapper col-12">
        <!-- <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">الر</a>
								</li>
								<li class="breadcrumb-item"><a href="#">Form Layouts</a>
								</li>
								<li class="breadcrumb-item active"><a href="#">Basic Forms</a>
								</li>
							</ol> -->
      </div>
    </div>
  </div>

</div>
<div id="crypto-stats-3" class="row">

  <!-- <div class="col-lg-2 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="card-block text-center">
          <div class="" style="border-top: 3px solid #DADADA;  ">
            <div class="media align-items-stretch  text-white rounded">
              <div class="  " style="background: #DADADA; border-radius: 0px 1px 7px 0px; ">
                <img src="{{asset('img/Mop.png')}}" width="20" height="28" alt="Mop" style="margin-top: 5px;padding: 2px;">
              </div>
              <div class="badge block   " style="background: #28D094; margin: 3px !important;">
                <h4 class="text-white">84,695</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  
  <div class="col-xl-1 col-lg-6 col-12">
    <a href="{{url('property/exit_today')}}">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
        
          <div class="media d-flex">
            <div class="media-body text-left">
              <h3 class="info">{{$exit_today_count}}</h3>
              <span>خروج اليوم</span>
            </div>
            <div class="align-self-center">
              <i class="icon-book-open info font-large-2 float-right"></i>
            </div>
          </div>
          <div class="progress mt-1 mb-0" style="height: 7px;background: #DADADA;">
            <div class="progress-bar " role="progressbar" style="background: #aa342b; width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class="col-xl-1 col-lg-6 col-12">
    <a href="{{url('property/rented')}}">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
        
          <div class="media d-flex">
            <div class="media-body text-left">
              <h3 class="info">{{$rented_count}}</h3>
              <span>مؤجر</span>
            </div>
            <div class="align-self-center">
              <i class="icon-book-open info font-large-2 float-right"></i>
            </div>
          </div>
          <div class="progress mt-1 mb-0" style="height: 7px;background: #DADADA;">
            <div class="progress-bar " role="progressbar" style="background: #aa342b; width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class="col-xl-1 col-lg-6 col-12">
    <a href="{{url('property/vacant')}}">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-left">
              <h3 class="info">{{$vacant_count}}</h3>
              <span>الشاغر</span>
            </div>
            <div class="align-self-center">
              <i class="icon-book-open info font-large-2 float-right"></i>
            </div>
          </div>
          <div class="progress mt-1 mb-0" style="height: 7px;background: #DADADA;">
            <div class="progress-bar " role="progressbar" style="background: #28D094;width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>

  <div class="col-xl-1 col-lg-6 col-12">
  <a href="{{url('property/maintenance')}}">
    <div class="card">
   
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-left">
              <h3 class="info">{{$maintenance_count}}</h3>
              <span>صيانة</span>
            </div>
            <div class="align-self-center">
              <i class="icon-book-open info font-large-2 float-right"></i>
            </div>
          </div>
          <div class="progress mt-1 mb-0" style="height: 7px;background: #DADADA;">
            <div class="progress-bar " role="progressbar" style="background: #DADADA;width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  
  <div class="col-xl-1 col-lg-6 col-12">
  <a href="{{url('property/notclean')}}">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-left">
              <h3 class="info">{{$notclean_count}}</h3>
              <span>غير نظيف</span>
            </div>
            <div class="align-self-center">
              <i class="icon-book-open info font-large-2 float-right"></i>
            </div>
          </div>
          <div class="progress mt-1 mb-0" style="height: 7px;background: #DADADA;">
            <div class="progress-bar" role="progressbar" style="background: #ff9149;width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class="col-xl-2 col-lg-6 col-12">
    <a href="{{url('property/waiting')}}">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-left">
              <h3 class="info">{{$waiting_count}}</h3>
              <span>إنتظار تسجيل الدخول </span>
            </div>
            <div class="align-self-center">
              <i class="icon-book-open info font-large-2 float-right"></i>
            </div>
          </div>
          <div class="progress mt-1 mb-0" style="height: 7px;background: #28D094;">
            <div class="progress-bar" role="progressbar" style="background: #aa342b;width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class="col-xl-2 col-lg-6 col-12">
    <a href="{{url('property/notclean_rented')}}">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-left">
              <h3 class="info">{{$notclean_rented_count}}</h3>
              <span><span>غير نظيف </span> (مؤجر)</span>
            </div>
            <div class="align-self-center">
              <i class="icon-book-open info font-large-2 float-right"></i>
            </div>
          </div>
          <div class="progress mt-1 mb-0" style="height: 7px;background: #DADADA;">
            <div class="progress-bar" role="progressbar" style="background: #aa342b;width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  
  <div class="col-xl-1 col-lg-6 col-12">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-left">
              <h3 class="info">{{$totalCount}}</h3>
              <span>عدد الوحدات</span>
            </div>
            <div class="align-self-center">
              <i class="icon-book-open info font-large-2 float-right"></i>
            </div>
          </div>
          <!-- <div class="progress mt-1 mb-0" style="height: 7px;">
            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-6 col-12">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-left">
              <h3 class="info">{{$clientsCount}}</h3>
              <span>عدد العقود </span>
            </div>
            <div class="align-self-center">
              <i class="icon-book-open info font-large-2 float-right"></i>
            </div>
          </div>
          <!-- <div class="progress mt-1 mb-0" style="height: 7px;">
            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  @foreach ($properties as $property)
  <div class="col-lg-2 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="card-block text-center">
          <div class="{{ $property->status == 'rented' ? 'rented-border' : '' }} {{ $property->status == 'waiting' ? 'waiting-border' : '' }} 
                                   {{ $property->status == 'maintenance' ? 'maintenance-border' : '' }}
                                   {{ $property->status == 'notclean' ? 'notclean-border' : '' }}{{ $property->status == 'vacant' ? 'vacant-border' : '' }}
                                   {{ $property->status == 'notclean_rented' ? 'notclean_rented-border' : '' }}" >
            <div class="media align-items-stretch  text-white rounded">
              <div class="{{ $property->status == 'rented' ? 'rented-color' : '' }} {{ $property->status == 'waiting' ? 'waiting-color' : '' }} 
                                   {{ $property->status == 'maintenance' ? 'maintenance-color' : '' }}
                                   {{ $property->status == 'notclean' ? 'notclean-color' : '' }}{{ $property->status == 'vacant' ? 'vacant-color' : '' }}
                                   {{ $property->status == 'notclean_rented' ? 'notclean_rented-color' : '' }}" style=" border-radius: 0px 1px 7px 0px; ">
                  @if($property->status=='notclean' || $property->status=='notclean_rented')
                    <img src="{{asset('img/Mop.png')}}" width="20" height="28" alt="Mop" style="margin-top: 5px;padding: 2px;">
                  @else
                    &nbsp; &nbsp; &nbsp;
                  @endif
              </div>
              <div class="badge block   {{ $property->status == 'rented' ? 'rented-back' : '' }} {{ $property->status == 'waiting' ? 'rented-back' : '' }}{{ $property->status == 'maintenance' ? 'maintenance-back' : '' }} {{ $property->status == 'notclean' ? 'notclean-back' : '' }} {{ $property->status == 'vacant' ? 'vacant-back' : '' }} {{ $property->status == 'notclean_rented' ? 'notclean_rented-back' : '' }}" style=" margin: 3px !important;">
                <h4 class="text-white">
                {{$property->number}}  
                @if($property->status=='rented')
                 <!-- مؤجر -->
                @elseif($property->status=='waiting')
                <!-- إنتظار تسجيل الدخول -->
                @elseif($property->status=='maintenance')
                <!-- صيانة -->
                @elseif($property->status=='notclean')
                <!-- <span>غير نظيف </span> (شاغر) -->
                @elseif($property->status=='notclean_rented')
                <!-- <span>غير نظيف </span> (مؤجر) -->
                @elseif($property->status=='vacant')
                <!-- شاغر -->
                @endif
                </h4>
              </div>
            </div>
          </div>
          <a class="btn btn-sm bg-success-light edit-course" data-toggle="modal"
								data-title_ar ="{{ $property->title_ar }}"data-catid="{{ $property->id }}"data-target="#edit{{$property->id}}">
                <i class="la la-edit"></i>
              </a>
        </div>
      </div>
    </div>
  </div>




  <!-- Edit Details Modal -->
    <div class="modal fade" id="edit{{$property->id}}" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">تعديل المقال</h5>
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
              <button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <!-- /Edit Details Modal -->

  @endforeach
  <!-- @foreach ($properties as $property)
  <div class="col-lg-2 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="card-block text-center">
          <div class="badge block  {{ $property->status == 'rented' ? 'rented-border' : '' }} {{ $property->status == 'waiting' ? 'waiting-border' : '' }} 
                                   {{ $property->status == 'maintenance' ? 'maintenance-border' : '' }}
                                   {{ $property->status == 'notclean' ? 'notclean-border' : '' }}{{ $property->status == 'vacant' ? 'vacant-border' : '' }}
                                   {{ $property->status == 'notclean_rented' ? 'notclean_rented-border' : '' }}">
            <div class="p-1 {{ $property->status == 'rented' ? 'rented-back' : '' }} {{ $property->status == 'waiting' ? 'rented-back' : '' }}{{ $property->status == 'maintenance' ? 'maintenance-back' : '' }} {{ $property->status == 'notclean' ? 'notclean-back' : '' }} {{ $property->status == 'vacant' ? 'vacant-back' : '' }} {{ $property->status == 'notclean_rented' ? 'notclean_rented-back' : '' }}">
              <a href="#" style="color: #fff;">
                @if($property->status=='rented')
                مؤجر
                @elseif($property->status=='waiting')
                إنتظار تسجيل الدخول
                @elseif($property->status=='maintenance')
                صيانة
                @elseif($property->status=='notclean')
                <span>غير نظيف </span> (شاغر)
                @elseif($property->status=='notclean_rented')
                <span>غير نظيف </span> (مؤجر)
                @elseif($property->status=='vacant')
                شاغر
                @endif
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach -->
  <!-- <div class="col-lg-2 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="card-block text-center">
          <div class="badge block  " style="border-right: 20px solid #DADADA;border-top: 3px solid #DADADA;  ">
            <div class="p-1" style="background: #ff9149; margin-bottom: -5px;">
              <a href="#" style="color: #fff;   ">502-501</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="card-block text-center">
          <div class="badge block  " style="border-right: 20px solid #DADADA;border-top: 3px solid #DADADA;  ">
            <div class="p-1" style="background: #aa342b; margin-bottom: -5px;">
              <a href="#" style="color: #fff;   ">502-501</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="card-block text-center">
          <div class="badge block  " style="border-right: 15px solid #2196F3;border-top: 3px solid #2196F3;  ">
            <div class="p-1" style="background: #28D094; margin-bottom: -5px;">
              <a href="#" style="color: #fff;   ">502-501</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="card-block text-center">
          <div class="badge block  " style="border-right: 15px solid #2196F3;border-top: 3px solid #2196F3;  ">
            <div class="p-1" style="background: #DADADA; margin-bottom: -5px;">
              <a href="#" style="color: #fff;   ">502-501</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="card-block text-center">
          <div class="badge block  " style="border-right: 15px solid #2196F3;border-top: 3px solid #2196F3;  ">
            <div class="p-1" style="background: #aa342b; margin-bottom: -5px;">
              <a href="#" style="color: #fff;   ">502-501</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="card-block text-center">
          <div class="badge block  rented-border">
            <div class="p-1 rented-back">
              <a href="#" style="color: #fff;   ">502-501</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->


  
</div>

<style>
  .rented-color {
    background: #DADADA;
  }

  .rented-back {
    background: #aa342b;
    margin-bottom: -5px;
  }

  .waiting-color {
    background: #28D094;
  }

  .maintenance-color {
    background: #DADADA;
  }

  .maintenance-back {
    background: #DADADA;
    margin-bottom: -5px;
  }

  .notclean-back {
    background: #ff9149;
    margin-bottom: -5px;
  }

  .notclean-color {
    background: #DADADA;
  }

  .vacant-back {
    background: #28D094;
    margin-bottom: -5px;
  }

  .vacant-color {
    background: #DADADA;
  }
  .notclean_rented-color{
    background: #DADADA;
  }
  .notclean_rented-back {
    background: #aa342b;
    margin-bottom: -5px;
  }
</style>
<style>
  .rented-border {
    border-top: 3px solid #DADADA;
  }

  .waiting-border {
    border-top: 3px solid #28D094;
  }

  .maintenance-border {
    border-top: 3px solid #DADADA;
  }

  .notclean-border {
    border-top: 3px solid #DADADA;
  }

  .vacant-border {
    border-top: 3px solid #DADADA;
  }
  .notclean_rented-border{
    border-top: 3px solid #DADADA;
  }
</style>
@endsection