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
  <title>Invoice Template - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin
    Dashboard
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
  <style>
    @media print {
      @page {
        size: landscape;
      }
    }
  </style>
</head>

<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu"
  data-col="2-columns">
  <!-- fixed-top-->

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <section class="card">
                    
                    <div id="invoice-items-details" class="pt-2">
                        <div class="row">
                            <div class="table-responsive col-sm-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-right">م استقبال</th>
                                        <th class="text-right">رقم الغرفة</th>
                                        <th class="text-right">اسم النزيل</th>
                                        <th class="text-right">دخول</th>
                                        <th class="text-right">خروج</th>
                                        <th class="text-right">تحويل</th>
                                        <th class="text-right">شبكة </th>
                                        <th class="text-right">نقدي </th>
                                        <th class="text-right">تأمين دخول </th>
                                        <th class="text-right">تأمين خروج </th>
                                        <th class="text-right">كارت الباب </th>
                                        <th class="text-right">م استلام</th>
                                        <th class="text-right">م نظافة</th>
                                        <th class="text-right">طلبات</th>
                                        <th class="text-right">ملاحظة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?PHP
                                    $transfer=0;
                                    $network=0;
                                    $cash=0;
                                    $receipts=0;
                                    $expenses=0;
                                ?>
                                @foreach ($reports as $report)
                                    <tr>
                                        <td><p>@if($report->users){{$report->users->name}}@endif</p></td>
                                        <td><p>@if($report->properties){{$report->properties->number}}@endif</p></td>
                                        <td><p>@if($report->clients){{$report->clients->name}}@endif</p></td>
                                        <td class="text-right">@if($report->status==1)
                                                ✓
                                            @endif</td>
                                        <td class="text-right">@if($report->status==0)
                                                ✓
                                            @endif</td>
                                        <td class="text-right">
                                            @if($report->status==1)
                                                @if($report->payment_way=="bank transfer")
                                                    @if($report->clients)
                                                        <?php $transfer+=$report->clients->total ;?>
                                                        {{$report->clients->total}}
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            @if($report->status==1)
                                                @if($report->payment_way=="network")
                                                    @if($report->clients)
                                                        <?php $network+=$report->clients->total ;?>
                                                        {{$report->clients->total}}
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            @if($report->status==1)
                                                @if($report->payment_way=="cash")
                                                    @if($report->clients)
                                                        <?php $cash+=$report->clients->total ;?>
                                                        {{$report->clients->total}}
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            @if($report->receipts)
                                            <?php $receipts+=$report->receipts->amount ;?>
                                            {{$report->receipts->amount}}
                                            @endif</td>
                                        <td class="text-right">
                                            @if($report->expenses)
                                                <?php $expenses+=$report->expenses->amount ;?>
                                                {{$report->expenses->amount}}
                                            @endif
                                        </td>
                                        <td class="text-right">@if($report->status_door_card==1)
                                            ✓
                                            @endif</td>
                                        <td class="text-right">@if($report->worker_checked)
                                            {{$report->worker_checked}}
                                        @endif</td>
                                        <td class="text-right">@if($report->cleaner)
                                            {{$report->cleaner}}
                                        @endif</td>
                                        <td class="text-right"></td>
                                        <td class="text-right">@if($report->expenses)
                                        {{$report->expenses->notes}}
                                        @endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 col-sm-12 text-center text-md-left">
                                <p class="lead">&nbsp;  اجمالي المدفوعات  </p>
                                <div class="row">
                                    <div class="col-md-8">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                            <tr>
                                                <td> تحويل بنكي : </td>
                                                <td class="text-right">{{$transfer}}</td>
                                            </tr>
                                            <tr>
                                                <td> شبكة:</td>
                                                <td class="text-right">{{$network}}</td>
                                            </tr>
                                            <tr>
                                                <td>نقدي:</td>
                                                <td class="text-right">{{$cash}}</td>
                                            </tr>
                                            <tr>
                                                <td>سندات قبض:</td>
                                                <td class="text-right">{{$receipts}}</td>
                                            </tr>
                                            <tr>
                                                <td>سندات صرف:</td>
                                                <td class="text-right">{{$expenses}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-5 col-sm-12">
                                <p class="lead">Total due</p>
                                <div class="table-responsive">
                                    <table class="table">
                                    <tbody>
                                        <tr>
                                        <td>Sub Total</td>
                                        <td class="text-right">$ 14,900.00</td>
                                        </tr>
                                        <tr>
                                        <td>TAX (12%)</td>
                                        <td class="text-right">$ 1,788.00</td>
                                        </tr>
                                        <tr>
                                        <td class="text-bold-800">Total</td>
                                        <td class="text-bold-800 text-right"> $ 16,688.00</td>
                                        </tr>
                                        <tr>
                                        <td>Payment Made</td>
                                        <td class="pink text-right">(-) $ 4,688.00</td>
                                        </tr>
                                        <tr class="bg-grey bg-lighten-4">
                                        <td class="text-bold-800">Balance Due</td>
                                        <td class="text-bold-800 text-right">$ 12,000.00</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <p>Authorized person</p>
                                    <img src="../../../app-assets/images/pages/signature-scan.png" alt="signature" class="height-100"
                                    />
                                    <h6>Amanda Orton</h6>
                                    <p class="text-muted">Managing Director</p>
                                </div>
                            </div> -->
                        </div>
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

    #invoice-template {
      padding-top: 25px !important;
      padding-left: 0px !important;
      padding-right: 0px !important;
    }

    p {
      margin-top: 0;
      margin-bottom: .8rem !important;
    }
  </style>
</body>

</html>