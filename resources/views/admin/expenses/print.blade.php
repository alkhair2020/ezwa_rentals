<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description"
    content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords"
    content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>نظام تأجير الشقق
  </title>
  <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->

  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/vendors.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/custom-rtl.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/core/menu/menu-types/horizontal-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/core/colors/palette-gradient.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style-rtl.css')}}">
  <!-- END Custom CSS-->
  <!-- start datatables -->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/tables/datatable/datatables.min.css')}}">
  <!-- END datatables-->

  <!-- start color message-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/core/colors/palette-callout.css')}}">
  <!-- END color message-->

  <!-- END Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/pages/invoice.css')}}">
  <!-- END Page Level CSS-->

</head>

<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu"
  data-col="2-columns">
  <!-- fixed-top-->

  <div class="app-content container center-layout">
    <div class="content-wrapper">

      <div class="content-body">
        <section class="card">
          <div id="invoice-template" class="card-body">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details" class="row border border-2 border-dark p-1">

              <div class="col-md-10 col-sm-12 text-center text-md-left mt-2">
                <h2>مكة المكرمة ــ الشرائع الهاتف : ٠٥٠٩٩٠٩٣٩٣ فاكس: ٠١٢٥٣٩٩٩٠٣</h2>
                <!-- <p class="pb-3">
                  مكة المكرمة ــ الشرائع الهاتف : ٠٥٠٩٩٠٩٣٩٣ فاكس: ٠١٢٥٣٩٩٩٠٣
                </p> -->
                <!-- <ul class="px-0 list-unstyled">
                  <li>Balance Due</li>
                  <li class="lead text-bold-800">$ 12,000.00</li>
                </ul> -->
              </div>
              <div class="col-md-2 col-sm-12  text-md-left">
                <div class="media">
                  <!-- <img src="{{asset('img/ezwalogo.jpeg')}}" alt="company logo" class="img-fluid" style="max-width: 52%;
    height: 50PX;" /> -->
                  <img src="{{asset('img/ezwalogo.jpeg')}}" alt="company logo" class="img-fluid" width="200" style="    max-width: 100%;
    height: 71PX;" />


                </div>
              </div>
            </div>
            <!-- /////////////////// -->
            <div id="invoice-customer-details" class="row mt-1  border border-1 border-dark p-1"
              style="color: #000;font-size: large;">
              <!-- <div class="col-sm-12 text-center text-md-left">
                            <p class="text-muted">التاريخ</p>
                          </div> -->
              <div class="col-md-2 col-sm-12 ">
                <p>
                  <span class="text-muted">التاريخ :</span>
                </p>
                <p>
                  <span class="text-muted">الموافق :</span>
                </p>

              </div>
              <div class="col-md-3 col-sm-12 ">
                <p>
                  {{$expenses->created_at->format('Y-m-d') }} م
                </p>
                <p>
                  <span class="text-muted"></span> {{$expenses->create_hijriDate}} هـ
                </p>
              </div>
              <div class="col-md-3 col-sm-12 pt-2">
                <p>
                  سند صرف
                </p>
              </div>
              <div class="col-md-3 col-sm-12 ">
                <p>
                  <span class="text-muted">رقم سند الصرف :</span>
                </p>
                <p>
                  <span class="text-muted">رقم سند القبض :</span>
                </p>
                <p>
                  <span class="text-muted">رقم العقد :</span>
                </p>

              </div>
              <div class="col-md-1 col-sm-12 ">
                <p>
                  {{$expenses->id}}
                </p>
                <p>
                  <span class="text-muted"></span>{{$clients->receipts->id}}
                </p>
                <p>
                  <span class="text-muted"></span> {{$clients->id}}
                </p>

              </div>
            </div>
            <!-- /////////////////// -->

            <!-- /////////////////// -->
            <div id="invoice-customer-details" class="row   border border-1 border-dark "
              style="color: #000;font-size: large;">
              <div class="col-md-3 col-sm-12 mt-2">
                <p>
                  <span class="text-muted"> تم صرف مبلغ :</span>
                </p>
                <p>
                  <span class="text-muted">لأمر السيد / السادة :</span>
                </p>
                <p>
                  <span class="text-muted">طريقة الدفع :</span>
                </p>
                <p>
                  <span class="text-muted">وذلك من أجل :</span>
                </p>
              </div>

              <div class="col-md-5 col-sm-12 text-center mt-2">
                <p>{{$expenses->amount}} ريال
                </p>
                <p>{{$expenses->clients->name}}
                </p>
                <p>نقدي
                </p>
                <p>
                  بدل تأمين شقة رقم  {{$clients->properties->number}}
                </p>
              </div>
              <div class="col-md-5 col-sm-12 ">
                <p>
                  <span class="text-muted"> ملاحظات :</span>
                </p>
              </div>
              <div class="col-md-6 col-sm-12 ">
                <p>
                  @if($expenses->notes)
                  {{$expenses->notes}}
                  @endif
                </p>
              </div>
              <div class="col-md-6 col-sm-12 text-center" style="color: #000; font-size: large;font-weight: bold;">
                <p class="ml-5">
                  توقيع المستلم
                </p>
                <p class="ml-4">
                </p>

              </div>
              <div class="col-md-5 col-sm-12 text-center" style="color: #000; font-size: large;font-weight: bold;">
                <p> الموظف المسئول
                </p>
                <h2 class="ml-2">{{$users->name}}
                </h2>
              </div>
              <div class="col-md-3 col-sm-12 ">


              </div>
            </div>
            <!-- /////////////////// -->



          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->


  <script src="{{asset('admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="{{asset('admin/vendors/js/ui/jquery.sticky.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{asset('admin/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="{{asset('admin/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
  <!-- END PAGE LEVEL JS-->

  <!--  start table datatable  -->
  <script src="{{asset('admin/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
  <!-- END table datatable-->
  <script>
    window.print();
  </script>

  <style>
    html body {
      height: 100%;
      background-color: #fff !important;
      direction: rtl;
    }



    p {
      margin-top: 0;
      margin-bottom: .8rem !important;
    }
  </style>
</body>

</html>