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
  @foreach ($properties as $property)
  <div class="col-lg-2 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="card-block text-center">
          <div
            class="badge block  {{ $property->status == 'rented' ? 'rented-border' : '' }} {{ $property->status == 'waiting' ? 'waiting-border' : '' }} {{ $property->status == 'maintenance' ? 'maintenance-border' : '' }}{{ $property->status == 'notclean' ? 'notclean-border' : '' }}{{ $property->status == 'vacant' ? 'vacant-border' : '' }}">
            <div
              class="p-1 {{ $property->status == 'rented' ? 'rented-back' : '' }} {{ $property->status == 'waiting' ? 'rented-back' : '' }}{{ $property->status == 'maintenance' ? 'maintenance-back' : '' }} {{ $property->status == 'notclean' ? 'notclean-back' : '' }} {{ $property->status == 'vacant' ? 'vacant-back' : '' }}">
              <a href="#" style="color: #fff;">
                @if($property->status=='rented')
                مؤجر
                @elseif($property->status=='waiting')
                إنتظار تسجيل الدخول
                @elseif($property->status=='maintenance')
                صيانة
                @elseif($property->status=='notclean')
                غير نظيف
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
  @endforeach
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


  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-2"><a href="#">
                <h1 style="color: white; border-radius: 30px;background-color: #aa342b !important;">
                  <i class="la la-table"></i>
                </h1>
              </a>
            </div>
            <div class="col-7 pl-2">
              <a href="#">
                <h4> مؤجر</h4>
                <!-- <h6 class="text-muted"> عدد العقارات الساكنة</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$rented_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-2"><a href="#">
                <h1 style="color: white; border-radius: 30px;background-color: #DADADA !important;">
                  <i class="la la-folder-open"></i>
                </h1>
              </a>
            </div>
            <div class="col-7 pl-2">
              <a href="#">
                <h4>صيانة</h4>
                <!-- <h6 class="text-muted"> عدد العملاء</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$maintenance_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-2"><a href="#">
                <h1 style="color: white; border-radius: 30px;background-color: #FF9149 !important;">
                  <i class="la la-folder-open"></i>
                </h1>
              </a>
            </div>
            <div class="col-7 pl-2">
              <a href="#">
                <h4>غير نظيف</h4>
                <!-- <h6 class="text-muted"> عدد سندات</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$notclean_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-2"><a href="#">
                <h1 style="color: white; border-radius: 30px;background-color: #28D094 !important;">
                  <i class="la la-folder-open"></i>
                </h1>
              </a>
            </div>
            <div class="col-7 pl-2">
              <a href="#">
                <h4>إنتظار تسجيل الدخول </h4>
                <!-- <h6 class="text-muted"> عدد سندات</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$waiting_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-2"><a href="#">
                <h1 style="color: white; border-radius: 30px;background-color: #28D094 !important;">
                  <i class="la la-folder-open"></i>
                </h1>
              </a>
            </div>
            <div class="col-7 pl-2">
              <a href="#">
                <h4>عدد الشاغر</h4>
                <!-- <h6 class="text-muted"> عدد سندات</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$vacant_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-2"><a href="#">
                <h1 style="color: white; border-radius: 30px;background-color: #FF9149 !important;">
                  B</h1>
              </a>
            </div>
            <div class="col-7 pl-2">
              <a href="#">
                <h4>إجمالي الوحدات</h4>
                <!-- <h6 class="text-muted"> عدد العقارات</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$totalCount}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-2"><a href="#">
                <h1
                  style="color: white; border-radius: 30px;padding: 6px 14px 6px 31px;background-color: #FF9149 !important;">
                  <i class="la la-folder-open"></i>
                </h1>
              </a>
            </div>
            <div class="col-7 pl-2">
              <a href="#">
                <h4>عدد العقود</h4>
                <!-- <h6 class="text-muted"> عدد سندات</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$clientsCount}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<style>
  .rented-border {
    border-right: 15px solid #DADADA;
    border-top: 3px solid #DADADA;
  }

  .rented-back {
    background: #aa342b;
    margin-bottom: -5px;
  }

  .waiting-border {
    border-right: 15px solid #28D094;
    border-top: 3px solid #28D094;
  }

  .maintenance-border {
    border-right: 15px solid #DADADA;
    border-top: 3px solid #DADADA;
  }

  .maintenance-back {
    background: #DADADA;
    margin-bottom: -5px;
  }

  .notclean-back {
    background: #ff9149;
    margin-bottom: -5px;
  }

  .notclean-border {
    border-right: 15px solid #DADADA;
    border-top: 3px solid #DADADA;
  }

  .vacant-back {
    background: #28D094;
    margin-bottom: -5px;
  }

  .vacant-border {
    border-right: 15px solid #DADADA;
    border-top: 3px solid #DADADA;
  }
</style>
@endsection