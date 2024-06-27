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
        $losses=Lost::with('properties')->with('clients')->first();

        $clients = Client::where('id',$losses->client_id )->with('properties')->first();
        $users = User::where('id',$losses->user_id  )->first();
        
        list($createyear, $createmonth, $createday) = explode('-',  $losses->created_at->format('Y-m-d'));
        $create_hijriDate = DateHelper::gregorianToHijri($createyear, $createmonth, $createday);
        $losses->create_hijriDate="{$create_hijriDate['year']}-{$create_hijriDate['month']}-{$create_hijriDate['day']}";
        // dd($losses);
        return view('admin.losses.print', compact('losses'));
    }
    
    public function index()
    {
        $clients=Client::where('status','1')->with('properties')->get();
        $losses=Lost::with('properties')->get();
        return view('admin.losses.index',compact('clients','losses'));  
    }
    

    public function store(Request $request)
    {
        $user_id=Auth::user();  
        $client = Client::where('id',$request->client_id)->first();
        
        $add = new Lost;
        $add->user_id     = $user_id->id;
        $add->property_id     = $client->property_id;
        $add->client_id     = $request->client_id;
        $add->name    = $request->name;
        $add->count    = $request->count;
        $add->notes    = $request->notes;
        $add->status    = $request->status;
        $add->save();


        
        // return redirect()->route('expenses.print', ['id' => $add->id]);
        return redirect()->back()->with("message", ' تم الاضافة');
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
