<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use App\Client;
use App\User;
use DB;
class DashBoardController extends Controller
{
       

    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        
        // $courses=Course::where('status',1)->get();
        // $courses_count=count($courses);
        $properties = Property::get();
        $orders = Property::select(
            DB::raw('COUNT(*) as total'),
            DB::raw('(SELECT COUNT(*) FROM properties WHERE status = "rented") as rented_count'),
            DB::raw('(SELECT COUNT(*) FROM properties WHERE status = "maintenance") as maintenance_count'),
            DB::raw('(SELECT COUNT(*) FROM properties WHERE status = "notclean") as notclean_count'),
            DB::raw('(SELECT COUNT(*) FROM properties WHERE status = "notclean_rented") as notclean_rented'),
            DB::raw('(SELECT COUNT(*) FROM properties WHERE status = "waiting") as waiting_count'),
            DB::raw('(SELECT COUNT(*) FROM properties WHERE status = "vacant") as vacant_count')
        )->first();
        
        $totalCount = $orders->total;
        $rented_count = $orders->rented_count;
        $maintenance_count = $orders->maintenance_count;
        $notclean_count = $orders->notclean_count;
        $notclean_rented_count = $orders->notclean_rented;
        $waiting_count = $orders->waiting_count;
        $vacant_count = $orders->vacant_count;
        
        $clients = Client::select(
            DB::raw('COUNT(*) as total'),
        )->first();
        $clientsCount = $clients->total;
        // $student_not_active_count=Instructor::where('type','student')->where('status',0)->count();
        
        // $instructor_count=Instructor::where('type','instructor')->count();
        // $instructor_count_active=Instructor::where('type','instructor')->where('suspended',1)->where('blocked',1)->count();
        
        // $instructor_publish_course=Instructor::where('type','instructor')->get();
        // $instructor_count_publish_course=[];
        // foreach ($instructor_publish_course as $item) {   
        //     $course_sum= Course::where('userId',$item->id)->first();
        //     if($course_sum){
        //         $instructor_count_publish_course[]=$course_sum;
        //     }
        // }
        
        // $balance=Transaction::orderBy('id', 'DESC')->first();
    //   dd($user_count);
        return view('admin.index_admin',compact('totalCount','rented_count','maintenance_count','notclean_count','waiting_count','vacant_count','notclean_rented_count','clientsCount','properties'));
    }

    // public function create()
    // {
    //     return view('admin.sliders.create');
    // }
    

    // public function store(AircraftRequest $request)
    // {
    //     $userId = 1;
    //     $file_extension = $request -> file('logoone') -> getClientOriginalExtension();
    //     $file_name = time().'.'.$file_extension;
    //     $file_nameone = $file_name;
    //     $path = 'admin/images/aircraft';
    //     $request-> file('logoone') ->move($path,$file_name);

    //     $request->merge(['created_by'=>$userId]);
    //     $request->merge(['logo'=>$file_nameone]);
    //     //dd($request->all());
    //     Slider::create($request->all());
    //     return redirect()->back()->with("message", __('admin.createSuccess')); 
    // }

    
    // public function edit(Slider $slider)
    // {
    //     return view('admin.sliders.edit',compact('slider'));
    // }

    // public function update(AircraftRequest $request, Slider $slider)
    // {
    //     $userId = 1;
    //      if($file=$request->file('logoone'))
    //      {
    //         $file_extension = $request -> file('logoone') -> getClientOriginalExtension();
    //         $file_name = time().'.'.$file_extension;
    //         $file_nameone = $file_name;
    //         $path = 'admin/images/aircraft';
    //         $request-> file('logoone') ->move($path,$file_name);
    //         $request->merge(['logo'=>$file_nameone]);

    //          $request->merge(['updated_by'=>$userId]);
    //          $slider->update($request->all());
    //      }else{
    //       $request->merge(['logo'=> $request->url]);
    //       $request->merge(['updated_by'=>$userId]);
    //       $slider->update($request->all());
    //      }
       
    //     dd($request->all());
    //     //return redirect()->route('aircraft.index')->with("message", __('admin.updateSuccess')); 
    // }

    public function destroy(Slider $slider)
    {

        $Charter=Charter::where('aircraftId',$slider->id)->get(); 
        if(count($Charter) == 0){
            $slider->delete();
            return redirect()->route('aircraft.index')->with("message", __('admin.deleteSuccess')); 
        }else{
           return redirect()->back()->with("error", 'It is not allowed to delete this item'); 
        }

        
    } 
}
