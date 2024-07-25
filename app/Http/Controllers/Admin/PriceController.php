<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Price;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PriceController extends Controller
{
    public function index()
    {
        $prices=Price::get();
        return view('admin.prices.index',compact('prices'));  
    }
    

    public function store(Request $request)
    {
        $user_id=Auth::user();  
        
        $add = new Price;
        $add->type     = $request->type;
        $add->price     = $request->price;
        $add->min_price     = $request->min_price;  
        
        $add->save();

        
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
