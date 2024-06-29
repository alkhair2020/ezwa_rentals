<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Client;
use App\User;
use App\Expense;
use App\Property;
use App\Clean;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App\Helpers\DateHelper;
use Illuminate\Support\Facades\Auth;
class CleanController extends Controller
{
    public function print($id)
    {
        $cleans=Clean::where('id',$id)->with('properties')->with('clients')->first();
        

        // $clients = Client::where('id',$cleans->client_id )->with('properties')->first();
        // $users = User::where('id',$cleans->user_id  )->first();
        
        list($createyear, $createmonth, $createday) = explode('-',  $cleans->created_at->format('Y-m-d'));
        $create_hijriDate = DateHelper::gregorianToHijri($createyear, $createmonth, $createday);
        $cleans->create_hijriDate="{$create_hijriDate['year']}-{$create_hijriDate['month']}-{$create_hijriDate['day']}";
        return view('admin.cleans.print', compact('cleans'));
    }
    
    public function index()
    {
        $properties=Property::get();
        $clients=Client::orderBy('id', 'desc')->take(30)->get();
        $cleans=Clean::with('properties')->with('clients')->get();

        return view('admin.cleans.index',compact('properties','clients','cleans'));  
    }
    

    public function store(Request $request)
    {
        $user_id=Auth::user();  
        
        $add = new Clean;
        $add->user_id     = $user_id->id;
        $add->property_id     = $request->property_id;
        $add->client_id     = $request->client_id;  
        if(isset($request->bathroom)){
            $add->bathroom    = $request->bathroom;
        }
        $add->bathroom_desc    = $request->bathroom_desc;
        if(isset($request->conditioning)){
            $add->conditioning    = $request->conditioning;
        }
        
        $add->conditioning_desc    = $request->conditioning_desc;
        if(isset($request->door)){
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

        
        return redirect()->route('cleans.print', ['id' => $add->id]);
        return redirect()->back()->with("message", ' تم الاضافة');
    }

    public function show(Feature $feature)
    {
        //
    }

    public function edit(Clean $clean)
    {
        $properties=Property::get();
        $clients=Client::orderBy('id', 'desc')->take(30)->get();
        return view('admin.cleans.edit',compact('properties','clients','clean'));
    }

    
    public function update(Request $request, Clean $clean)
    {
        $edit = Clean::findOrFail($clean->id);
        
        if(isset($request->property_id)){
            $edit->property_id    = $request->property_id;
        }
        if(isset($request->client_id)){
            $edit->client_id    = $request->client_id;
        }
        if(isset($request->bathroom)){
            $edit->bathroom    = $request->bathroom;
        }else{
            $edit->bathroom    = 0;
        }
        $edit->bathroom_desc    = $request->bathroom_desc;

        if(isset($request->conditioning)){
            $edit->conditioning    = $request->conditioning;
        }else{
            $edit->conditioning    = 0;
        }
        $edit->conditioning_desc    = $request->conditioning_desc;
        
        if(isset($request->door)){
            $edit->door    = $request->door;
        }else{
            $edit->door    = 0;
        }
        $edit->door_desc    = $request->door_desc;

        if(isset($request->room)){
            $edit->room    = $request->room;
        }else{
            $edit->room    = 0;
        }
        $edit->room_desc    = $request->room_desc;

        if(isset($request->kitchen)){
            $edit->kitchen    = $request->kitchen;
        }else{
            $edit->kitchen    = 0;
        }
        $edit->kitchen_desc    = $request->kitchen_desc;

        if(isset($request->other)){
            $edit->other    = $request->other;
        }else{
            $edit->other    = 0;
        }
        $edit->other_desc    = $request->other_desc;

        $edit->save();
        return redirect()->back()->with("message", 'تم التعديل بنجاح');
    }

    
    public function destroy(Request $request )
    {
        
            $delete = Clean::findOrFail($request->id);
            $delete->delete();
            // dd($request->id);
            return back()->with("success",'تم الحذف بنجاح'); 
              
    } 
}
