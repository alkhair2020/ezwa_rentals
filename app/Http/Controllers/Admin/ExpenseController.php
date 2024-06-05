<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Client;
use App\User;
use App\Expense;
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
        $expenses=Expense::with('clients')->get();
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
        $property = Client::where('id',$request->client_id)->first();
        $add = new Expense;
        $add->user_id     = $user_id->id;
        $add->client_id     = $request->client_id;
        $add->amount    = $request->amount;
        $add->save();
        return redirect()->back()->with("message", 'تم الإضافة بنجاح');
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
    public function edit(Feature $feature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        //
    }

    
    public function destroy(Request $request )
    {
        
            $delete = Client::findOrFail($request->id);
            $delete->delete();
            // dd($request->id);
            return back()->with("success",'تم الحذف بنجاح'); 
              
    } 
}
