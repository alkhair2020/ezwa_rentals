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
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-2"><a href="#">
                <h1
                  style="color: white; border-radius: 30px;padding: 6px 14px 6px 31px;background-color: #FF9149 !important;">
                  B</h1>
              </a>
            </div>
            <div class="col-7 pl-2">
              <a href="#">
                <h4>عدد العقارات</h4>
                <!-- <h6 class="text-muted"> عدد العقارات</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$user_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
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
                  style="color: white; border-radius: 30px;padding: 3px 14px 6px 31px;background-color: #FF9149 !important;">
                  <i class="la la-table"></i>
                </h1>
              </a>
            </div>
            <div class="col-7 pl-2">
              <a href="#">
                <h4>عدد العقارات الساكنه</h4>
                <!-- <h6 class="text-muted"> عدد العقارات الساكنة</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$user_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
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
                <h4>عدد العملاء</h4>
                <!-- <h6 class="text-muted"> عدد العملاء</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$user_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
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
                <h4>عدد سندات القبض</h4>
                <!-- <h6 class="text-muted"> عدد سندات</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$user_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
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
                <h4>عدد سندات الصرف</h4>
                <!-- <h6 class="text-muted"> عدد سندات</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$user_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
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
                <h4>عدد الموظفين</h4>
                <!-- <h6 class="text-muted"> عدد سندات</h6> -->
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$user_count}}</h5>
              </a>
              <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection