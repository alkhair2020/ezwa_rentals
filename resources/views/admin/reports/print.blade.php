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
            <div class="content-header row" id="search-form">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <form action="{{ route('report.print') }}" method="GET"">
                                
                                <input type="hidden" name="client_id" id="cat_id">
                                <div class="row form-row">
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group">
                                            <label> من تاريخ </label>
                                            <input type="date" name="from" class="form-control" id="amount_id">
                                            <span id="amountError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group">
                                            <label>الي تاريخ </label>
                                            <input type="date" name="to" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-2 m-1 p-1">
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">بحث</button>
                                        
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="media width-250 float-right">
                        <!-- <button id="printButton">Print this page</button> -->
                        <button id="printButton" type="button" class="btn btn-icon btn-info mr-1 mt-2"><i class="la la-print"></i></button>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="card">
                
                    <div class="row">
                        
                        @if($from)
                            <div class=" col-sm-6  text-center p-1" style="border-left: 1px solid #a5abc7">
                                من تاريــــــــــخ : {{$from}}
                            </div>
                            <div class="vertical-line"></div>

                        @endif
                        @if($to)
                            <div class=" col-sm-4 text-center  p-1">
                                إلى تاريــــــــخ : {{$from}}
                            </div>
                        @endif
                    </div>
                    <div id="invoice-items-details" class="">
                        <div class="row">
                        <!-- table-responsive -->
                            <div class=" col-sm-12">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>م استقبال</th>
                                        <th >رقم الغرفة</th>
                                        <th >اسم النزيل</th>
                                        <th >دخول</th>
                                        <th >خروج</th>
                                        <th >تحويل</th>
                                        <th >شبكة </th>
                                        <th >نقدي </th>
                                        <th >تأمين دخول </th>
                                        <th >تأمين خروج </th>
                                        <th >كارت الباب </th>
                                        <th >م استلام</th>
                                        <th >م نظافة</th>
                                        <th >طلبات</th>
                                        <th>ملاحظة</th>
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
                                        <td><p>@if($report->users){{$report->users->name}}@endif </p></td>
                                        <td><p>@if($report->properties){{$report->properties->number}}@endif</p></td>
                                        <td><p>@if($report->clients){{$report->clients->name}}@endif</p></td>
                                        <td >
                                            @if($report->status==1)
                                                ✓
                                            @elseif($report->status==2)
                                                تجديد
                                            @endif</td>
                                        <td >@if($report->status==0)
                                                ✓
                                            @endif</td>
                                        <td >
                                            @if($report->status !=0)
                                                @if($report->payment_way=="bank transfer")
                                                    @if($report->clients)
                                                        <?php $transfer+=$report->clients->total ;?>
                                                        {{$report->clients->total}}
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td >
                                            @if($report->status !=0)
                                                @if($report->payment_way=="network")
                                                    @if($report->clients)
                                                        <?php $network+=$report->clients->total ;?>
                                                        {{$report->clients->total}}
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td >
                                            @if($report->status !=0)
                                                @if($report->payment_way=="cash")
                                                    @if($report->clients)
                                                        <?php $cash+=$report->clients->total ;?>
                                                        {{$report->clients->total}}
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td ">
                                            @if($report->receipts)
                                            <?php $receipts+=$report->receipts->amount ;?>
                                            {{$report->receipts->amount}}
                                            @endif</td>
                                        <td >
                                            @if($report->expenses)
                                                <?php $expenses+=$report->expenses->amount ;?>
                                                {{$report->expenses->amount}}
                                            @endif
                                        </td>
                                        <td >@if($report->status_door_card==1)
                                            ✓
                                            @endif</td>
                                        <td>@if($report->worker_checked)
                                            {{$report->worker_checked}}
                                        @endif</td>
                                        <td >@if($report->cleaner)
                                            {{$report->cleaner}}
                                        @endif</td>
                                        <td ></td>
                                        <td >@if($report->expenses)
                                        {{$report->expenses->notes}}
                                        @endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1"></th>
                                        <th rowspan="1" colspan="1"></th>
                                        <th rowspan="1" colspan="1"> </th>
                                        <th rowspan="1" colspan="1"></th>
                                        <th rowspan="1" colspan="1"></th>
                                        <th rowspan="1" colspan="1">{{$transfer}}</th>
                                        <th rowspan="1" colspan="1">{{$network}}</th>
                                        <th rowspan="1" colspan="1">{{$cash}}</th>
                                        <th rowspan="1" colspan="1">{{$receipts}}</th>
                                        <th rowspan="1" colspan="1">{{$expenses}}</th>
                                        <th rowspan="1" colspan="1"> </th>
                                        <th rowspan="1" colspan="1"></th>
                                        <th rowspan="1" colspan="1"></th>
                                        <th rowspan="1" colspan="1"> </th>
                                        <th rowspan="1" colspan="1"></th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                        <!-- <div class="row">
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
                        </div> -->
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

  <style>
        @media print {
            #printButton {
                display: none;
            }
            #search-form{
                display: none;
            }
        }
    </style>
  <script>
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
    // window.print();
  </script>

  <style>
    html body {
      height: 100%;
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