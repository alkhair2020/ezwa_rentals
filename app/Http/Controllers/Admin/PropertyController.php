<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function rooms()
    {
        $properties=Property::where('type',"room")->get();
        return view('admin.properties.rooms',compact('properties'));
    }
    public function storeRoom(Request $request)
    {
        
        $add = new Property;
        $add->type    ='room';
        $add->number    = $request->number;
        $add->rooms    = $request->rooms;
        $add->baths    = $request->baths;
        $add->floor    = $request->floor;
        $add->num_single_bed    = $request->num_single_bed;
        $add->num_double_bed    = $request->num_double_bed;
        $add->num_locker    = $request->num_locker;
        $add->num_TVs    = $request->num_TVs;
        $add->conditioner_type    = $request->conditioner_type;
        $add->price_id     = $request->price_id;
        $add->internet    = $request->internet;
        $add->parking    = $request->parking;
        $add->elevator    = $request->elevator;
        $add->cleaning_rooms    = $request->cleaning_rooms;
        $add->telephone_directory    = $request->telephone_directory;
        $add->newspaper    = $request->newspaper;
        $add->qibla    = $request->qibla;
        $add->fridge    = $request->fridge;
        $add->lounge    = $request->lounge;
        $add->oven    = $request->oven;
        $add->microwave    = $request->microwave;
        $add->washing_machine    = $request->washing_machine;
        $add->iron    = $request->iron;
        $add->dining_table    = $request->dining_table;
        $add->kitchen    = $request->kitchen;
        $add->description    = $request->description;
        $add->save();
        return redirect()->route('properties.index')->with("message", 'تم الإضافة بنجاح');
    }
     public function index()
    {
        $properties=Property::all();
        return view('admin.properties.index',compact('properties'));
    }
   
    public function create()
    {
        return view('admin.properties.create');
    }



    public function store(Request $request)
    {
        $this->validate( $request,[
                'type'=>'required',
                'number'=>'required',
            ],
            [
                'type.required'=>'يرجى ادخال نوع العقار',
                'number.required'=>'يجب ادخال رقم العقار',
            ]
        );
        $add = new Property;
        $add->type    = $request->type;
        $add->number    = $request->number;
        $add->rooms    = $request->rooms;
        $add->baths    = $request->baths;
        $add->price_day    = $request->price_day;
        $add->price_week    = $request->price_week;
        $add->price_month    = $request->price_month;
        $add->address    = $request->address;
        $add->description    = $request->description;
        $add->tax_number    = $request->tax_number;


        $add->save();
        return redirect()->route('properties.index')->with("message", 'تم الإضافة بنجاح');
    }


    public function edit(Property $property)
    {
        return view('admin.properties.edit',compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        // $this->validate( $request,[
        //         'name'=>'required',
        //     ],
        //     [
        //         'name.required'=>'يرجى ادخال نوع العقار',
        //     ]
        // );

        $edit = Property::findOrFail($property->id);
        if(isset($request->type)){
            $edit->type    = $request->type;
        }
        if(isset($request->number)){
            $edit->number    = $request->number;
        }
        if(isset($request->rooms)){
            $edit->rooms    = $request->rooms;
        }
        if(isset($request->baths)){
            $edit->baths    = $request->baths;
        }
        if(isset($request->price_day)){
            $edit->price_day    = $request->price_day;
        }
        if(isset($request->price_week)){
            $edit->price_week    = $request->price_week;
        }
        if(isset($request->price_month)){
            $edit->price_month    = $request->price_month;
        }
        
        if(isset($request->percentage)){
            $edit->percentage    = $request->percentage;
        }
        if(isset($request->address)){
            $edit->address    = $request->address;
        }
        if(isset($request->description)){
            $edit->description    = $request->description;
        }
        if(isset($request->status)){
            $edit->status    = $request->status;
        }
        if(isset($request->tax_number)){
            $edit->tax_number    = $request->tax_number;
        }
        $edit->save();
        return redirect()->back()->with("message", 'تم التعديل بنجاح');
    }

    public function destroy(Request $request )
    {
        $category = Property::findOrFail($request->id);
        $category->delete();
        return redirect()->route('properties.index')->with("message",'تم الحذف بنجاح');
    }
}
