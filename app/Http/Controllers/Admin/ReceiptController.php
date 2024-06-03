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
class ReceiptController extends Controller
{
    public function print($id)
    {
        // Fetch invoice data from the database
        $receipts = Receipt::where('id',$id)->with('clients')->first();
        $clients = Client::where('id',$receipts->client_id )->with('properties')->first();
        $users = User::where('id',$receipts->user_id  )->first();

        list($createyear, $createmonth, $createday) = explode('-',  $receipts->created_at->format('Y-m-d'));
        $create_hijriDate = DateHelper::gregorianToHijri($createyear, $createmonth, $createday);
        $receipts->create_hijriDate="{$create_hijriDate['year']}-{$create_hijriDate['month']}-{$create_hijriDate['day']}";

        return view('admin.receipts.print', compact('receipts','clients','users'));
    }
   
    public function index()
    {
        $receipts=Receipt::with('clients')->get();
        $clients=Client::get();
        return view('admin.receipts.index',compact('receipts','clients'));  
    }
    
    public function clientReceipts($id)
    {
       
        $client = Client::findOrFail($id);
        $receipts=Receipt::where('client_id',$id)->with('clients')->get();
        // dd($receipts);
        return view('admin.receipts.index',compact('receipts','client'));
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
       
        $property = Client::where('id',$request->client_id)->first();
        $add = new Receipt;
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
