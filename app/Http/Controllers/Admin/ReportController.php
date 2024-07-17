<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as Carbon;
class ReportController extends Controller
{
    public function index(Request $request)
    {
        
        if ($clientName=$request->clientName) {
            $reports = Report::whereHas('clients', function($query) use ($clientName) {
                $query->where('name', 'like', '%' . $clientName . '%');
            })->latest()->with('clients')->get();
        }elseif ($request->from && $request->to) {
            $from = Carbon::createFromFormat('Y-m-d', $request->from)->startOfDay();
            $to = Carbon::createFromFormat('Y-m-d', $request->to)->endOfDay();
            // $reports = Report::whereBetween('created_at', [$from, $to])->get();
            $reports = Report::whereBetween('created_at', [$from, $to])->with('users')->with('clients')->with('properties')->with('receipts')->with('expenses')->latest()->get();
        }elseif($request->from){
            $reports = Report::whereDate('created_at', $request->from)->with('users')->with('clients')->with('properties')->with('receipts')->with('expenses')->latest()->get();
        }else{
            $reports = Report::with('users')->with('clients')->with('properties')->with('receipts')->with('expenses')->latest()->get();
        }
        // dd($reports);
        return view('admin.reports.print', ['reports' => $reports, 'from' => $request->from,'to' => $request->to]);
        
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
