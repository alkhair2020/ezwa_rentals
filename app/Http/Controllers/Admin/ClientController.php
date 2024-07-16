<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Client;
use App\Property;
use App\User;
use App\Receipt;
use App\Report;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App\Helpers\DateHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon as Carbon;
use App\Expense;
class ClientController extends Controller
{
    public function print($id)
    {
        // Fetch invoice data from the database
        $clients = Client::where('id',$id)->with('properties')->with('receipts')->first();
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
        $clients=Client::with('properties')->with('users')->with('receipts')->with('expenses')->where('status','1')->orderBy('id', 'DESC')->get();
        
        return view('admin.clients.index',compact('clients'));
    }
    public function clientClosed()
    {
        // dd('sfsgsf');
        $clients=Client::with('properties')->with('users')->with('receipts')->with('expenses')->where('status','0')->orderBy('id', 'DESC')->get();
       
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
                $end_date = $now->copy()->addMonth($request->count_day)->subDay(1)->setTime(12, 0, 0);
            }else{
                $end_date = $now->copy()->addMonth($request->count_day)->setTime(12, 0, 0);
            }
        }elseif($request->property_type=='weekly'){
            // إذا دخل النزيل قبل الساعة 6 صباحًا، يغادر عند الساعة 12 ظهرًا في اليوم الثاني
            if ($now->hour < 6) {
                $end_date = $now->copy()->addWeeks($request->count_day)->subDay(1)->setTime(12, 0, 0);
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
        $add->nationality    = $request->nationality;
        // if($request->type =="national identity"){
        //     $add->nationality    = 'سعودي';
        // }elseif($request->type =="accommodation"){
        //     $add->nationality    = 'مقيم';
        // }else{
        //     $add->nationality    = 'زائر';
        // }
        $add->tax_number    = $request->tax_number;
        $add->id_number    = $request->id_number;
        $add->phone    = $request->phone;
        $add->number_companions    = $request->number_companions;
        // $add->property_id    = $request->property_id;
        $add->count_day    = $request->count_day;
        $add->start_date    = $request->start_date;
        $add->time    =$end_date->format('h:i A');
        $add->end_date    = $end_date->format('Y-m-d');
        $add->property_type    = $request->property_type;
        if(isset( $request->discount)){
            $add->discount    = $request->discount;
        }
        
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

        $add_report = new Report;
        $add_report->user_id     = $user_id->id;
        $add_report->property_id     = $request->property_id;
        $add_report->client_id     = $add->id;
        $add_report->receipt_id    = $add_receipt->id;
        $add_report->payment_way    = $request->payment_way;
        $add_report->save();
        

        $property->status="rented";
        $property->save();
        return redirect()->route('clients.print', ['id' => $add->id]);
        // return redirect()->route('clients.index')->with("message", 'تم الإضافة بنجاح');
    }

    public function clientRenew(Request $request)
    {
        // dd('cvb');
        $user_id=Auth::user();
        
        $now = Carbon::parse($request->start_date.''.$request->time);
        if($request->property_type=='monthly'){
            if ($now->hour < 6) {
                $end_date = $now->copy()->addMonth($request->count_day)->subDay(1)->setTime(12, 0, 0);
            }else{
                $end_date = $now->copy()->addMonth($request->count_day)->setTime(12, 0, 0);
            }
        }elseif($request->property_type=='weekly'){
            if ($now->hour < 6) {
                $end_date = $now->copy()->addWeeks($request->count_day)->subDay(1)->setTime(12, 0, 0);
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
        $client = Client::where('id',$request->client_id)->first();
        $receipt = Receipt::where('client_id',$client->id)->first();
        $property = Property::where('id',$client->property_id)->first();
        $add = new Client;
        $add->user_id     = $user_id->id;
        $add->property_id     = $client->property_id;
        $add->name    = $client->name;
        $add->type    = $client->type;
        $add->nationality    =$client->nationality;
        $add->tax_number    = $client->tax_number;
        $add->id_number    = $client->id_number;
        $add->phone    = $client->phone;
        $add->number_companions    = $client->number_companions;
        // $add->property_id    = $client->property_id;
        $add->property_type    = $request->property_type;
        $add->count_day    = $request->count_day;
        $add->start_date    = $request->start_date;
        $add->time    =$end_date->format('h:i A');
        $add->end_date    = $end_date->format('Y-m-d');
        
        if(isset( $request->discount)){
            $add->discount    = $request->discount;
        }
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
        $add_receipt->amount    = $receipt->amount;
        $add_receipt->date    = $datenow;
        $add_receipt->save();

        $add_report = new Report;
        $add_report->user_id     = $user_id->id;
        $add_report->property_id     = $client->property_id;
        $add_report->client_id     = $add->id;
        $add_report->receipt_id    = $add_receipt->id;
        $add_report->payment_way    = $request->payment_way;
        $add_report->status    = 2;
        $add_report->save();
        

        $client->status="0";
        $client->save();
        
        return redirect()->route('clients.print', ['id' => $add->id]);
        // return redirect()->route('clients.index')->with("message", 'تم الإضافة بنجاح');
    }

   
    public function show(Feature $feature)
    {
        //
    }
    
    public function edit(Client $client)
    {
        $properties=Property::get();
        $client = Client::where('id',$client->id)->with('receipts')->first();
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
        $edit->tax_number    = $request->tax_number;
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
        if($request->property_price){
            $edit->property_price = $request->property_price;
        }
        // if(isset( $request->draft)){
        //     $edit->draft    = $request->draft;
        // }
        $edit->total    = $request->property_price - $request->discount;
        $edit->save();

        $receipt = Receipt::where('client_id',$client->id)->first();
        $receipt->amount    = $request->insurance;
        $receipt->save();
        return redirect()->route('clients.index')->with("message", 'تم التعديل بنجاح');
    }

    
    public function destroy(Request $request )
    {
        
            $client = Client::findOrFail($request->id);
            if($client){
                $receipt = Receipt::where('client_id',$client->id)->first();
                if($receipt)
                    $receipt->delete();
                $expense = Expense::where('client_id',$client->id)->first();
                if($expense)
                    $expense->delete();
                $report = Report::where('client_id',$client->id)->first();
                if($report)
                    $report->delete();
                $client->delete();
            }
            
            
            // dd($request->id);
            return back()->with("success",'تم الحذف بنجاح'); 
              
    } 
}
