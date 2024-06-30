<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Client;
use App\User;
use App\Expense;
use App\Property;
use App\Report;
use App\Country;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App\Helpers\DateHelper;
use Illuminate\Support\Facades\Auth;
class ExpenseController extends Controller
{
    public function print($id)
    {
         // Fetch invoice data from the database
         $expenses = Expense::where('id',$id)->with('clients')->first();
         $clients = Client::where('id',$expenses->client_id )->with('properties')->with('receipts')->first();
        $users = User::where('id',$expenses->user_id  )->first();
         // $gregorianDate = '2024-05-31'; // يمكنك أيضاً استلام هذا التاريخ كمدخل من المستخدم
         // $gregorianDate = $clients->start_date; 
 
         // list($year, $month, $day) = explode('-', $clients->start_date);
         // list($endyear, $endmonth, $endday) = explode('-',  $clients->end_date);
         list($createyear, $createmonth, $createday) = explode('-',  $expenses->created_at->format('Y-m-d'));
     
         // $hijriDate = DateHelper::gregorianToHijri($year, $month, $day);
         // $end_hijriDate = DateHelper::gregorianToHijri($endyear, $endmonth, $endday);
         $create_hijriDate = DateHelper::gregorianToHijri($createyear, $createmonth, $createday);
 
     
         // return "التاريخ الميلادي: $clients->start_date يوافق التاريخ الهجري: {$hijriDate['year']}-{$hijriDate['month']}-{$hijriDate['day']}";
         // return "التاريخ الميلادي: $clients->end_date يوافق التاريخ الهجري: {$endhijriDate['year']}-{$endhijriDate['month']}-{$endhijriDate['day']}";
 
         // $clients->start_hijriDate="{$hijriDate['year']}-{$hijriDate['month']}-{$hijriDate['day']}";
         // $clients->end_hijriDate="{$end_hijriDate['year']}-{$end_hijriDate['month']}-{$end_hijriDate['day']}";
         $expenses->create_hijriDate="{$create_hijriDate['year']}-{$create_hijriDate['month']}-{$create_hijriDate['day']}";
         // dd($clients);
         return view('admin.expenses.print', compact('expenses','clients','users'));
    }
    
    public function index()
    {
        $clients=Client::get();
        $expenses=Expense::with('clients')->with('users')->with('reports')->get();
        // dd($expenses);
        return view('admin.expenses.index',compact('expenses','clients'));  
    }
    
    public function clientExpenses($id)
    {
        $client = Client::findOrFail($id);
        $expenses=Expense::where('client_id',$id)->with('clients')->get();
        // dd($receipts);
        return view('admin.expenses.index',compact('expenses','client'));
    }

    public function create()
    {
        $properties=Client::get();
        return view('admin.clients.create',compact('properties'));
    }
    // public function clientAdd($id)
    // {

    //     return view('admin.clients.create');
    // }
        
    

    public function store(Request $request)
    {
        $user_id=Auth::user();  
        // dd($request->all());
        $client = Client::where('id',$request->client_id)->first();
        $client->status=0;
       
        
        $property = Property::findOrFail($client->property_id);
        $property->status="notclean";
        

        $check_expense = Expense::where('client_id',$request->client_id)->first();
        if($check_expense){
            return redirect()->back()->with('error', 'تم إنشاء سند صرف بالفعل');
        }else{
            $add = new Expense;
            $add->user_id     = $user_id->id;
            $add->client_id     = $request->client_id;
            $add->amount    = $request->amount;
            if(isset($request->notes)){
                $add->notes    = $request->notes;
            }
            $add->save();
        }

        $add_report = new Report;
        $add_report->user_id     = $user_id->id;
        $add_report->property_id     = $client->property_id;
        $add_report->client_id     =  $request->client_id;
        $add_report->expense_id    = $add->id;
        $add_report->payment_way    = "cash";
        $add_report->status    = 0;
        $add_report->worker_checked    =$request->worker_checked;
        $add_report->cleaner    = $request->cleaner;
        $add_report->status_door_card    = $request->status_door_card;
        $add_report->save();
        

        $client->save();
        $property->save();
        return redirect()->route('expenses.print', ['id' => $add->id]);
        // return redirect()->back()->with("message", 'تم إنهاء العقد ويمكنك طباعة مستند الصرف');
    }

    public function update(Request $request)
    {
        $edit = Expense::findOrFail($request->id);
        $edit->notes    = $request->notes;
        $edit->save();

        $edit_report = Report::where('expense_id',$edit->id)->first();
        if(isset($request->status_door_card)){
            $edit_report->status_door_card    = $request->status_door_card;
        }else{
            $edit_report->status_door_card    = 0;
        }
       
        $edit_report->save();
        return redirect()->back()->with("message", 'تم التعديل بنجاح');
    }

    
    public function destroy(Request $request )
    {
        
            $delete = Client::findOrFail($request->id);
            $delete->delete();
            // dd($request->id);
            return back()->with("success",'تم الحذف بنجاح'); 
              
    } 
}
