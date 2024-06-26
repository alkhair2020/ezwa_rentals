<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Client;
use App\User;
use App\Expense;
use App\Property;
use App\Lost;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App\Helpers\DateHelper;
use Illuminate\Support\Facades\Auth;
class LostController extends Controller
{
    public function print($id)
    {
        $expenses = Expense::where('id',$id)->with('clients')->first();
        $clients = Client::where('id',$expenses->client_id )->with('properties')->with('receipts')->first();
        $users = User::where('id',$expenses->user_id  )->first();
        list($createyear, $createmonth, $createday) = explode('-',  $expenses->created_at->format('Y-m-d'));
        $create_hijriDate = DateHelper::gregorianToHijri($createyear, $createmonth, $createday);
        $expenses->create_hijriDate="{$create_hijriDate['year']}-{$create_hijriDate['month']}-{$create_hijriDate['day']}";
        return view('admin.expenses.print', compact('expenses','clients','users'));
    }
    
    public function index()
    {
        $clients=Client::get();
        $expenses=Expense::with('clients')->get();
        $losses=Lost::get();
        return view('admin.losses.index',compact('expenses','clients','losses'));  
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
        $client->save();
        
        $property = Property::findOrFail($client->property_id);
        $property->status="notclean";
        $property->save();

        $add = new Expense;
        $add->user_id     = $user_id->id;
        $add->client_id     = $request->client_id;
        $add->amount    = $request->amount;
        if(isset($request->notes)){
             $add->notes    = $request->notes;
        }
        $add->save();


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
        
        return redirect()->route('expenses.print', ['id' => $add->id]);
        return redirect()->back()->with("message", 'تم إنهاء العقد ويمكنك طباعة مستند الصرف');
    }

    public function show(Feature $feature)
    {
        //
    }

    public function edit(Feature $feature)
    {
        //
    }

    
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
