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

              <div class="col-md-10 col-sm-12 text-center text-md-left mt-1">
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
                  <img src="{{asset('img/ezwalogo.jpeg')}}" alt="company logo" class="img-fluid" width="200" style="max-width: 86%;
    height: 65PX;" />


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
                  {{$clients->created_at->format('Y-m-d') }} م
                </p>
                <p>
                  <span class="text-muted"></span> {{$clients->create_hijriDate}} هـ
                </p>
              </div>
              <div class="col-md-1 col-sm-12 ">
                <p>
                  إجار
                </p>
              </div>
              <div class="col-md-3 col-sm-12 ">
                <p>
                  <span class="text-muted">رقم العقد :</span>
                </p>
                <p>
                  <span class="text-muted">الرقم الضريبي :</span>
                </p>

              </div>
              <div class="col-md-3 col-sm-12 ">
                <p>
                  {{$clients->id}}
                </p>
                <p>
                  <span class="text-muted"></span> 300267685800003
                </p>

              </div>
            </div>
            <!-- /////////////////// -->
            <div id="invoice-customer-details" class="row   border border-1 border-dark "
              style="color: #000;font-size: large;border-top: 1px !important;">
              <!-- <div class="col-sm-12 text-center text-md-left">
                <p class="text-muted">التاريخ</p>
              </div> -->
              <div class="col-md-3 col-sm-12 ">
                <p>
                  <span class="text-muted">بداية العقد :</span>
                </p>
                <p>
                  <span class="text-muted">الموافق :</span>
                </p>
                <p>
                  <span class="text-muted">نوع الاإيجار :</span>
                </p>
                <p>
                  <span class="text-muted"> سعر الايجار:</span>
                </p>
                
                <p>
                  <span class="text-muted"> الخصم :</span>
                </p>
                <p>
                  <span class="text-muted"> المدفوع :</span>
                </p>
              </div>
              <div class="col-md-3 col-sm-12 ">
                <p>
                  {{$clients->start_date}} م 
                </p>
                <p>{{$clients->start_hijriDate}} هـ
                </p>
                <p>
                  
                  @if($clients->property_type=='monthly')
                     شهري
                  @elseif($clients->property_type=='weekly')
                     اسبوعي
                  @else
                     يومي
                  @endif
                </p>
                <p>{{$clients->property_price}}
                </p>
                
                <p>  {{$clients->discount}}
                </p>
                <p>
                  <span class="text-muted"></span>  {{$clients->total }}
                </p>
              </div>
              <div class="col-md-3 col-sm-12 ">
                <p>
                  <span class="text-muted">نهاية العقد :</span>
                </p>
                <p>
                  <span class="text-muted">الموافق :</span>
                </p>
                <p>
                  <span class="text-muted"> رقم الشقة:</span>
                </p>
                <p>
                  <span class="text-muted">الايام :</span>
                </p>
                <!-- <p>
                  <span class="text-muted"> الخصم :</span>
                </p> -->
                <p>
                  <span class="text-muted">التأمين :</span>
                </p>
              </div>

              <div class="col-md-3 col-sm-12 ">
                <p>
                {{$clients->end_date}} م   &nbsp;&nbsp;{{ $clients->time}}</p>
                <p>
                  <span class="text-muted"></span> {{$clients->end_hijriDate}} هـ
                </p>
                <p>
                  <span class="text-muted"></span>{{$clients->properties->number}}
                </p>
                <p>
                  <span class="text-muted"></span>
                  @if($clients->property_type=='monthly')
                    {{$clients->count_day * 30}}
                  @elseif($clients->property_type=='weekly')
                    {{$clients->count_day * 7}}
                  @else
                    {{$clients->count_day}}
                  @endif
                     
                </p>
                <!-- <p>
                  <span class="text-muted"> </span>{{$clients->discount}}
                </p> -->
                <p>
                  <span class="text-muted"></span>{{$clients->insurance}}
                </p>
              </div>
             
              <div class="col-md-3 col-sm-12  ">
                
              </div>
              <div class="col-md-5 col-sm-12  ">
               
              </div>
              <!-- <div class="col-md-12 col-sm-12  text-center">
                <p>
                  <span class="text-muted">رسوم اشغال مرافق الايواء (%2,5) = ٠ ريال / ضريبة القيمة المضافة (%15) =
                    ٠ ريال</span>
                </p>
              </div> -->
              <!-- <div class="col-md-2 col-sm-12  ">
                <p>
                  <span class="text-muted">كمبياله : </span> ٠ ريال
                </p>
              </div> -->
              <!-- <div class="col-md-2 col-sm-12  ">
                <p>
                  <span class="text-muted">٠ ريال</span>
                </p>
              </div> -->
            </div>
            <!-- /////////////////// -->
            <div id="invoice-customer-details" class="row   border border-1 border-dark "
              style="color: #000;font-size: large;">
              <div class="col-md-12 col-sm-12 ">
                <p>
                  <span class="text-muted">بيانات العميل</span>
                </p>

              </div>
              <div class="col-md-2 col-sm-12 ">
                <p>
                  <span class="text-muted">اسم العميل:</span>
                </p>
                <p>
                  <span class="text-muted">نوع الاثبات :</span>
                </p>
                <p>
                  <span class="text-muted">الجوال :</span>
                </p>

              </div>
              <div class="col-md-5 col-sm-12 ">
                <p>{{$clients->name}}
                </p>
                <p>
                  <span class="text-muted"></span>
                  
                  @if($clients->type=='accommodation')
                  إقامة
                  @elseif($clients->type=='national identity')
                  هوية وطنية
                  @else
                  زائر
                  @endif
                </p>
                <p>
                  <span class="text-muted"></span> {{$clients->phone}}
                </p>

              </div>
              <div class="col-md-2 col-sm-12 ">
                <p>
                  <span class="text-muted">الجنسية :</span>
                </p>
                <p>
                  <span class="text-muted">رقم الإثبات :</span>
                </p>
                <p>
                  <span class="text-muted">عدد المرافقين :</span>
                </p>

              </div>
              <div class="col-md-3 col-sm-12 ">
                <p>
                  {{$clients->nationality}}

                </p>
                <p>
                  <span class="text-muted"></span> {{$clients->id_number}}
                </p>
                <p>
                  <span class="text-muted"></span> {{$clients->number_companions}}
                </p>

              </div>
            </div>
            <!-- /////////////////// -->
            <div id="invoice-customer-details" class="row   border border-2 border-dark "
              style="color: #000; font-size: 15px;">
              <div class="col-md-12 col-sm-12 ">
                <p class="" style=" font-size: large;">الشروط
                </p>
                <p class="">1- يتم دفع قيمة الإيجار مقدماً.
                </p>
                <p>2-على المستأجر دفع مبلغ 1000 ريال كتأمين مسترجع و سيخصم منه في حالة حصول أي تلفيات في محتويات الشقة
                  من قبل العميل أو مرافقيه </span>
                </p>
                <p>3- يجب الإفصاح عن جميع ساكني الشقة الذين يندرجون تحت رب الاسرة وفى حالة التستر على احد الأسماء
                  المطلوبة امنينا</span>
                </p>
                <p>4- يجب الإفصاح عن عدد أفراد العائلة وعدم تسكين اكثر من 4 أشخاص مما يزيد العبء على مساحة الشقة والتسبب
                  في الإزعاج وفي حال ثبوت دخول عددأكثر من المسموح
                  يجب دفع مبلغ 500 ريال لكل شخصين وإعطاء المستأجر مدة 24 ساعة وإلغاء عقده والخروج فوراً </span>
                </p>
                <p> 5- لا يحق لمستأجر طلب تغيير وتبديل مفارش ولحف السرير إلا مرة كل 15 يوم من تاريخ أخر تبديل </span>
                </p>
                <p> 6- المستأجر مسؤول عن كامل ممتلكات الشقة و يجب عليه المحافظة عليها، و في حالة تلف شيء من الممتلكات
                  فيجب عليه دفع
                  التعويض المناسب الذي تقرره الإدارة و لا يحق للمستأجر تحويل العقد إلى شخص آخر.</span>
                </p>
                <p> 7- التأكد من إغلاق التكييف و الإضاءة و الأجهزة الكهربائية عند مغادرة العميل للشقة؛منعاً لحدوث أخطار
                  -لا سمح الله- و سوف يكون مسؤولاً عنها.</span>
                </p>
                <p> 8- موعد الخروج في تمام الساعة (2) الثانية ظهراً، و إذا تأخر عن ذلك تحسب عليه أجرة يوم كامل وموعد
                  الدخول الساعه 4 عصرا .</span>
                </p> 9- في حالة تغيب المستأجر بعد إنتهاء العقد ب 8 ساعات ، يحق للإدارة فتح الشقة و التصرف فيها و رفع
                ممتلكات المستأجر إلى المستودع
                دون أدنى مسؤولية على الإدارة و يعتبر العقد لاغيًا .</span>
                </p>
                <p> 10- في حال فقدان كرت الدخول يتم دفع 100 ريال وعمل كرت جديد لفتح الشقة </span>
                </p>
                <p> 11- يمنع ترك المفتاح داخل الشقة أثناء خروجك منها وللمالك في عدم فتح الباب في المرة القادمة إلا بعد
                  دفع مبلغ وقدرة 100 ريال وعدم تجديد العقد بعد انتهائه </span>
                </p>
                <p> 12- الإدارة غير مسؤولة عن ففدان الأشياء الثمينة الخاصة بالمستاجر داخل الشقة </span>
                </p>
                <p> 13- ليس للمستأجر الحق في استرداد قيمة الايجار في حال المغادرة قبل انتهاء المدة المتعاقد عليها
                  </span>
                </p>
                <p> 14- في حال رغبة المستأجر في تجديد المدة أو إخلاء الشقة عليه اشعار الإدارة بذلك قبل انتهاء المدة
                  بفترة 24 ساعة </span>
                </p>
                <p> 15- يعتبر العقد لاغيا في حالة الإخلال بأحد الشروط المذكورة وللمسؤول الحق في الغاء العقد دون ابداء
                  الأسباب </span>
                </p>
                <p> 16- يعتبر التأمين غير مسترجع في حال خروج النزيل بدون علم الاستقبال</span>
                </p>
                <p> 17- يمنع تجهيز او استخدام الغرف لأي غرض من الأغرض التالية:1- تجهيز عيد ميلاد 2-تجهيز غرفة عرسان .(او
                  اي شي مخالف للإستخدام الاساسي للغرف)قبل الرجوع للإدارة . </span>
                </p>
              </div>
              <div class="col-md-6 col-sm-12 text-center" style="color: #000; font-size: large;font-weight: bold;">
                <p class="ml-5">
                  توقيع المستأجر
                </p>
                <h2 class="ml-3"> ....................
                </h2>
              </div>
              <div class="col-md-5 col-sm-12 text-center" style="color: #000; font-size: large;font-weight: bold;">
                <p> الموظف المسئول
                </p>
                <p class="">{{$users->name}}
                </p>
              </div>
            </div>
            <!-- <div id="invoice-customer-details" class="row mt-1  p-1" style="color: #000; font-size: large;font-weight: bold;">
                <div class="col-md-5 col-sm-12 ">
                    <p>
                        توقيع المستأجر
                    </p>
                    <h2>..........
                    </h2>
                </div>
                <div class="col-md-2 col-sm-12 ">
                    <p>
                    <span class="text-muted"> الموظف المسئول </span>
                    </p>
                    <p>
                    <span class="text-muted">عنود </span>
                    </p>
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