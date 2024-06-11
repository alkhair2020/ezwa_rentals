<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Client;
use App\Property;
use App\User;
use App\Receipt;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App\Helpers\DateHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon as Carbon;
class ClientController extends Controller
{
    public function print($id)
    {
        // Fetch invoice data from the database
        $clients = Client::where('id',$id)->with('properties')->first();
        $users = User::where('id',$clients->user_id)->first();
        // $gregorianDate = '2024-05-31'; // يمكنك أيضاً استلام هذا التاريخ كمدخل من المستخدم
        // $gregorianDate = $clients->start_date; 
        list($year, $month, $day) = explode('-', $clients->start_date);
        list($endyear, $endmonth, $endday) = explode('-',  $clients->end_date);
        list($createyear, $createmonth, $createday) = explode('-',  $clients->created_at->format('Y-m-d'));
    
        $hijriDate = DateHelper::gregorianToHijri($year, $month, $day);
        $end_hijriDate = DateHelper::gregorianToHijri($endyear, $endmonth, $endday);
        $create_hijriDate = DateHelper::gregorianToHijri($createyear, $createmonth, $createday);

    
        // return "التاريخ الميلادي: $clients->start_date يوافق التاريخ الهجري: {$hijriDate['year']}-{$hijriDate['month']}-{$hijriDate['day']}";
        // return "التاريخ الميلادي: $clients->end_date يوافق التاريخ الهجري: {$endhijriDate['year']}-{$endhijriDate['month']}-{$endhijriDate['day']}";

        $clients->start_hijriDate="{$hijriDate['year']}-{$hijriDate['month']}-{$hijriDate['day']}";
        $clients->end_hijriDate="{$end_hijriDate['year']}-{$end_hijriDate['month']}-{$end_hijriDate['day']}";
        $clients->create_hijriDate="{$create_hijriDate['year']}-{$create_hijriDate['month']}-{$create_hijriDate['day']}";
        // dd($clients);
        return view('admin.clients.print', compact('clients','users'));
    }
    public function userDocument()
    {
        $fileName='certificate.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'tempDir'=>storage_path('tempdir'),
            'margin_left'=>0,
            'margin_right'=>0,
            'margin_top'=>0,
            'margin_bootom'=>0,
            'margin_header'=>0,
            'margin_footer'=>0,
            'autoArabic' => true,
            'format' => 'A4',
            'orientation' => 'P',

        ]);
        $html = view('admin.clients.printt');
        $html = $html->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');

    }
    public function index()
    {
        $clients=Client::with('properties')->with('users')->with('receipts')->with('expenses')->get();
        
        return view('admin.clients.index',compact('clients'));
    }
    public function propertyClients($id)
    {
        $clients=Client::where('property_id',$id)->with('properties')->with('users')->with('receipts')->with('expenses')->get();
        
        return view('admin.clients.index',compact('clients'));
    }
    public function create()
    {
        $properties=Property::get();
        return view('admin.clients.create',compact('properties'));
    }
    // public function clientAdd($id)
    // {

    //     return view('admin.clients.create');
    // }
        
    

    public function store(Request $request)
    {
        $user_id=Auth::user();
        
        // $now = Carbon::parse($request->start_date);
        // $datenow=Carbon::now()->format('Y-m-d');
        // if($request->property_type=='monthly'){
        //     $end_date = $now->addMonth($request->count_day)->toDateString();
        // }elseif($request->property_type=='weekly'){
        //     $end_date = $now->addWeeks($request->count_day)->toDateString();
        // }else{
        //     $end_date = $now->addDays($request->count_day)->toDateString();
        // }

        // $arrivalDateTime = Carbon::parse('2024-06-01 05:00:00');
        // // عدد الليالي المطلوبة 
        // $numberOfNights = 1;
        // // حساب تاريخ المغادرة
        // $departureDateTime = $arrivalDateTime->copy()->addDays($numberOfNights)->setTime(12, 0, 0);
        // // إذا دخل النزيل قبل الساعة 6 صباحًا، يغادر عند الساعة 12 ظهرًا في اليوم الثاني
        // if ($arrivalDateTime->hour < 6) {
        //     $departureDateTime = $arrivalDateTime->copy()->addDays($numberOfNights - 1)->setTime(12, 0, 0);
        // }
        // // عرض تاريخ المغادرة بتنسيق 12 ساعة
        // echo "Departure Date: " . $departureDateTime->format('Y-m-d h:i A');
        // echo "Departure Date: " . $arrivalDateTime->format('Y-m-d h:i A');
        // // dd($numberOfNights);
        
        $now = Carbon::parse($request->start_date.''.$request->time);
        if($request->property_type=='monthly'){
            // إذا دخل النزيل قبل الساعة 6 صباحًا، يغادر عند الساعة 12 ظهرًا في اليوم الثاني
            if ($now->hour < 6) {
                $end_date = $now->copy()->addMonth($request->count_day - 1)->setTime(12, 0, 0);
            }else{
                $end_date = $now->copy()->addMonth($request->count_day)->setTime(12, 0, 0);
            }
        }elseif($request->property_type=='weekly'){
            // إذا دخل النزيل قبل الساعة 6 صباحًا، يغادر عند الساعة 12 ظهرًا في اليوم الثاني
            if ($now->hour < 6) {
                $end_date = $now->copy()->addWeeks($request->count_day - 1)->setTime(12, 0, 0);
            }else{
                $end_date = $now->copy()->addWeeks($request->count_day)->setTime(12, 0, 0);
            }
        }else{
            if ($now->hour < 6) {
                $end_date = $now->copy()->addDays($request->count_day - 1)->setTime(12, 0, 0);
            }else{
                $end_date = $now->copy()->addDays($request->count_day)->setTime(12, 0, 0);
            }
        }
        
        // dd($request->all());
        $property = Property::where('id',$request->property_id)->first();
        $add = new Client;
        $add->user_id     = $user_id->id;
        $add->property_id     = $request->property_id;
        $add->name    = $request->name;
        $add->type    = $request->type;
        if($request->type =="national identity"){
            $add->nationality    = 'سعودي';
        }elseif($request->type =="accommodation"){
            $add->nationality    = 'مقيم';
        }else{
            $add->nationality    = 'زائر';
        }
       
        $add->id_number    = $request->id_number;
        $add->phone    = $request->phone;
        $add->number_companions    = $request->number_companions;
        $add->property_id    = $request->property_id;
        $add->count_day    = $request->count_day;
        $add->start_date    = $request->start_date;
        $add->time    =$end_date->format('h:i A');
        $add->end_date    = $end_date->format('Y-m-d');
        $add->property_type    = $request->property_type;
        if(isset( $request->discount)){
            $add->discount    = $request->discount;
        }
        if(isset( $request->insurance)){
            $add->insurance = $request->insurance;
        }
        if(isset( $request->draft)){
             $add->draft    = $request->draft;
        }
        // $price_whith_percent= $property->price + ($property->price * $property->percentage) / 100;
        if($request->property_type=='weekly'){
            $price_whith_percent= $property->price_week + ($property->price_week * $property->percentage) / 100;
            $add->property_price    = $price_whith_percent * $request->count_day ;
            $add->total    = $price_whith_percent * $request->count_day - $request->discount;
        }elseif($request->property_type=='daily'){
            $price_whith_percent= $property->price_day + ($property->price_day * $property->percentage) / 100;
            $add->property_price    = $price_whith_percent * $request->count_day;
            $add->total    = $price_whith_percent * $request->count_day - $request->discount;
        }else{
            $price_whith_percent= $property->price_month + ($property->price_month * $property->percentage) / 100;
            $add->property_price    =$price_whith_percent;
            $add->total    =$price_whith_percent - $request->discount;
        }
        
       
        $add->save();

        $datenow=Carbon::now()->format('Y-m-d');
        $add_receipt = new Receipt;
        $add_receipt->user_id     = $user_id->id;
        $add_receipt->client_id     = $add->id;
        $add_receipt->amount    = $request->insurance;
        $add_receipt->date    = $datenow;
        $add_receipt->save();
        return redirect()->route('clients.index')->with("message", 'تم الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $properties=Property::get();
        // dd($client);
        return view('admin.clients.edit',compact('properties','client'));
    }
   
    public function update(Request $request, Client $client)
    {
        $property = Property::where('id',$request->property_id)->first();
        $edit = Client::findOrFail($client->id);
        // $edit->user_id     = $user_id->id;
        $edit->property_id     = $request->property_id;
        $edit->name    = $request->name;
        $edit->type    = $request->type;
        $edit->nationality    = $request->nationality;
        $edit->id_number    = $request->id_number;
        $edit->phone    = $request->phone;
        $edit->number_companions    = $request->number_companions;
        
        $edit->property_id    = $request->property_id;
        $edit->start_date    = $request->start_date;
        $edit->end_date    = $request->end_date;
        $edit->property_type    = $request->property_type;
        if(isset( $request->discount)){
            $edit->discount    = $request->discount;
        }
        if(isset( $request->insurance)){
            $edit->insurance = $request->insurance;
        }
        if(isset( $request->draft)){
             $edit->draft    = $request->draft;
        }
        $edit->total    = $property->price - $request->discount;
        
        $edit->save();
        return redirect()->route('clients.index')->with("message", 'تم التعديل بنجاح');
    }

    
    public function destroy(Request $request )
    {
        
            $delete = Client::findOrFail($request->id);
            $delete->delete();
            // dd($request->id);
            return back()->with("success",'تم الحذف بنجاح'); 
              
    } 
}
