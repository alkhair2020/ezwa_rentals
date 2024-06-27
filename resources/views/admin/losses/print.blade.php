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
            <div id="invoice-company-details" class="row p-1">
              <div class="col-md-12 col-sm-12 text-center ">
                <h2> العزوة هاوس للشقق المفروشة</h2>
              </div>
            </div>
            <div id="invoice-company-details" class="row ">
                <div class="col-md-10 col-sm-12  text-md-left">
                    <div class="media">
                    <img src="{{asset('img/ezwalogo.jpeg')}}" alt="company logo" class="img-fluid" width="200" style="    max-width: 100%;height: 71PX;" />
                    </div>
                </div>
            </div>
            <!-- /////////////////// -->
            <div id="" class="row text-center">
              <div class="col-md-12 col-sm-12 pt-2">
                <h1>
                   استمارة مفقودات الشقق
                </h1>
              </div>
            </div>
            <div id="invoice-items-details" class="pt-2">
              <div class="row">
                <div class="table-responsive col-sm-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">رقم الوحدة</th>
                        <th class="text-center">الادوات</th>
                        <th class="text-center">العدد</th>
                        <th class="text-center">الحالة</th>
                        <th class="text-center">ملاحظات</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($losses as $item)
                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-center">
                                <p class="text-center">Create PSD for mobile APP</p>
                            </td>
                            <td class="text-center">$ 20.00/hr</td>
                            <td class="text-center">120</td>
                            <td class="text-center">$ 2400.00</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
             
            </div>
          
            <br>
            <!-- /////////////////// -->
            <div id="invoice-customer-details" class="row " style="color: #000;font-size: large;">
                <div class="col-md-6 col-sm-12 text-center" style="color: #000; font-size: large;font-weight: bold;">
                    <p class="ml-5">
                    مسئول القسم /
                    </p>
                </div>
                <div class="col-md-5 col-sm-12 text-center" style="color: #000; font-size: large;font-weight: bold;">
                    <p>
                    المدير العام / 
                    </p>
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
  <!-- <script>
    window.print();
  </script> -->

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