<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Client;
use App\User;
use App\Expense;
use App\Property;
use App\Maintenance;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App\Helpers\DateHelper;
use Illuminate\Support\Facades\Auth;
class MaintenanceController extends Controller
{
    public function print($id)
    {
        $maintenances=Maintenance::where('id',$id)->with('properties')->with('clients')->first();
        

        // $clients = Client::where('id',$maintenances->client_id )->with('properties')->first();
        // $users = User::where('id',$maintenances->user_id  )->first();
        
        list($createyear, $createmonth, $createday) = explode('-',  $maintenances->created_at->format('Y-m-d'));
        $create_hijriDate = DateHelper::gregorianToHijri($createyear, $createmonth, $createday);
        $maintenances->create_hijriDate="{$create_hijriDate['year']}-{$create_hijriDate['month']}-{$create_hijriDate['day']}";
        return view('admin.maintenances.print', compact('maintenances'));
    }
    
    public function index()
    {
        $clients=Client::where('status','1')->with('properties')->get();
       
        $maintenances=Maintenance::with('properties')->get();
        return view('admin.maintenances.index',compact('clients','maintenances'));  
    }
    

    public function store(Request $request)
    {
        $user_id=Auth::user();  
        $client = Client::where('id',$request->client_id)->first();
        
        $add = new Maintenance;
        $add->user_id     = $user_id->id;
        $add->property_id     = $client->property_id;
        $add->client_id     = $request->client_id;
        if(isset($request->bathroom)){
        $add->bathroom    = $request->bathroom;
        }
        $add->bathroom_desc    = $request->bathroom_desc;
        if(isset($request->conditioning)){
            $add->conditioning    = $request->conditioning;
        }
        
        $add->conditioning_desc    = $request->conditioning_desc;
        if(isset($request->bathroom)){
            $add->door    = $request->door;
        }
        $add->door_desc    = $request->door_desc;
        if(isset($request->room)){
            $add->room    = $request->room;
        }
        $add->room_desc    = $request->room_desc;
        if(isset($request->kitchen)){
            $add->kitchen    = $request->kitchen;
        }
        $add->kitchen_desc    = $request->kitchen_desc;
        if(isset($request->other)){
            $add->other    = $request->other;
        }
       
        $add->other_desc    = $request->other_desc;

        $add->save();
        return redirect()->route('maintenances.print', ['id' => $add->id]);
        // return redirect()->back()->with("message", ' تم الاضافة');
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
