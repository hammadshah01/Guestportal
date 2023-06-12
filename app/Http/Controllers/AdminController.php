<?php

namespace App\Http\Controllers;

use App\Models\visit;
use App\Models\visitor;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Carbon\Carbon;
use Auth;
class AdminController extends Controller
{
  public function dashboard()
  {

  $t1=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('06:00'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('10:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"exstudent")->count();
    $t2=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('10:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('12:00'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"exstudent")->count();
    $t3=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('12:00'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('12:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"exstudent")->count();
    $t4=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('12:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('13:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"exstudent")->count();
    $t5=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('13:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('14:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"exstudent")->count();
    $t6=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('14:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('15:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"exstudent")->count();
    $t7=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('15:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('17:55'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"exstudent")->count();
 $d1=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('06:00'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('10:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"guest")->count();
    $d2=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('10:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('12:00'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"guest")->count();
    $d3=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('12:00'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('12:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"guest")->count();
    $d4=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('12:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('13:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"guest")->count();
    $d5=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('13:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('14:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"guest")->count();
    $d6=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('14:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('15:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"guest")->count();
    $d7=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('15:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('17:55'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"guest")->count();



 $c1=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('06:00'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('10:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"vendor")->count();
    $c2=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('10:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('12:00'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"vendor")->count();
    $c3=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('12:00'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('12:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"vendor")->count();
    $c4=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('12:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('13:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"vendor")->count();
    $c5=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('13:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('14:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"vendor")->count();
    $c6=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('14:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('15:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"vendor")->count();
    $c7=visit::whereTime('visits.created_at', '>=', \Carbon\Carbon::parse('15:30'))
    ->whereTime('visits.created_at', '<=', \Carbon\Carbon::parse('17:30'))->join("visitors","visits.user_cnic","=","visitors.cnic")->where('role',"vendor")->count();


   $daily= visit::whereDate('created_at', Carbon::today())->count();
   $banned=visitor::where('status','blacklist')->count();
   $visitor=visitor::all()->count();
   $cstudent=visitor::where('role','currentstudent')->count();
   $exstudent=visitor::where('role','exstudent')->count();
   $vendor=visitor::where('role','vendor')->count();
   $guest=visitor::where('role','guest')->count();

    return view('admin.dashboard',compact('daily','visitor','banned','cstudent','exstudent','vendor','guest'
,'t1','t2','t3','t4','t5','t6','t7','d1','d2','d3','d4','d5','d6','d7','c1','c2','c3','c4','c5','c6','c7'
));
  }

    public function addvisitor()
    {
      return view('admin.entervisitor');
    }
        public function addvisitordata(Request $request)
      {

        if (visitor::where('cnic', '=',$request->cnic)->exists()) {
          Session::flash('error', 'CNIC Already');
        return redirect()->back()->with('error','cnic already exist');
       }



$visitor = new visitor;
$visitor->role=$request->role;
$visitor->cnic=$request->cnic;
$visitor->fathername=$request->fathername;
$visitor->name=$request->name;
$visitor->status=$request->status;
$visitor->yearofadmission=$request->admission_year;
if($request->graduation_year=="Present"){
  $visitor->yearofgraduation=0;
}elseif($request->graduation_year!="Present"){
  $visitor->yearofgraduation=$request->graduation_year;
} 
if ($request->hasFile('visitor-img')) {
    $file = $request->file('visitor-img');
    $filename = time().'.'.$file->getClientOriginalExtension();
    $destinationPath ='assets/admin';
    $file->move($destinationPath,$filename);
    $visitor->image=$filename;
  }

$visitor->Save();
return redirect()->back()->with('success',"Visitor Data Added Successfully");
        }




public function excel_upload()
{
return view('admin.excel-upload');
}


public function excel_input(Request $request){
$excel=Excel::import(new UsersImport,$request->file);
if($excel){
  return redirect()->route('admin.excel')->with("success",'Data Added Successfully through Excel');
}else{
  return redirect()->route('admin.excel')->with("errror","Something Went wrong");
}
}



public function visit_history()
{
 $visit=visit::join('visitors','visits.user_cnic',"=","visitors.cnic")
 ->join('departments','visits.department','=','departments.id')

 ->where('visits.gueststatus',"out")
 ->select('visits.id','visits.out','visits.user_cnic','visits.purpose','visits.created_at','visitors.name','visitors.fathername','visitors.role','departments.dname')
 ->OrderBy('visits.id', 'DESC')
 ->get();


return view('admin.visit-history',compact('visit'));
}

public function current_guest()
{
if(Auth::user()->role=='superadmin' || Auth::user()->role=="user")
{
  $visit=visit::join('visitors','visits.user_cnic',"=","visitors.cnic")
  ->join('departments','visits.department','=','departments.id')
  ->where('visits.gueststatus',"in")
  ->select('visits.id','visits.user_cnic','visits.purpose','visits.created_at','visitors.name','visitors.fathername','visitors.role','departments.dname')
  ->OrderBy('visits.id', 'DESC')
  ->get();
  return view('admin.current-guest',compact('visit'));
}
else{
    return redirect('/');
}

}

public function visitor_out($id)
{
$current_date_time = Carbon::now()->toDateTimeString();
// Produces something like "2019-03-11 12:25:00"
 $visit=visit::find($id);
 $visit->gueststatus="out";
 $visit->out=$current_date_time;
 $visit->update();
return redirect()->back()->with("success","User Exit From NCA");
}

public function uservisitdetail($id,$cnic)
{
$visitnum=visit::where("user_cnic",$cnic)->count();
$visdet=visit::where('visits.id',$id)->join('visitors','visits.user_cnic',"=","visitors.cnic")
->join('departments','visits.department','=','departments.id')->join('purposes','visits.purpose','=','purposes.id')
->select('visits.id','visits.out' , 'visits.gueststatus','visits.user_cnic','visits.purpose','visits.created_at', 'visitors.status','visitors.image',  'visitors.name','visitors.fathername','visitors.role','departments.dname','visitors.yearofadmission','visitors.yearofgraduation','purposes.pname')
->get();
$allies=visitor::where('referal_visit_id',$id)->where('referal',$cnic)->get();

return view('admin.visit-detail',compact('visdet','visitnum','allies'));
}
public function all_visitor()
{
    $visitor=visitor::all();
    return view('admin.allvisitor',compact('visitor'));
}
function visitordelete($id)
{
$del=Visitor::find($id)->delete();
if($del){
    return redirect()->back()->with("success","Visitor Deleted Successfully");
}
}
function editvisitor($id)
{
    $visitor=visitor::where('id',$id)->get();
    return view('admin.editvisitor',compact('visitor'));
}
public function visitoreditsave(Request $request)
{
    $visitor = visitor::where('id',$request->userid)->first();
    $visitor->role=$request->role;
    $visitor->cnic=$request->cnic;
    $visitor->fathername=$request->fathername;
    $visitor->name=$request->name;
    $visitor->status=$request->status;
    $visitor->yearofadmission=$request->admission_year;
    if($request->graduation_year=="Present"){
      $visitor->yearofgraduation=0;
    }elseif($request->graduation_year!="Present"){
      $visitor->yearofgraduation=$request->graduation_year;
    }
    if ($request->hasFile('visitor-img')) {
        $file = $request->file('visitor-img');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath ='assets/admin';
        $file->move($destinationPath,$filename);
        $visitor->image=$filename;
      }
    $visitor->Save();
    return redirect()->back()->with('success',"Visitor Data Added Successfully");
}


function user_details($id)
{
    $visdet=visitor::where('id',$id)->get();
    $cnic=$visdet[0]->cnic;
    $uservisit=visit::where('user_cnic',$cnic)->join('departments','visits.department','departments.id')
    ->join('purposes','visits.purpose','purposes.id')
    ->select('departments.dname','visits.id','visits.out','visits.created_at','visits.purpose','purposes.pname')->get();
return view('admin.users-details',compact('visdet','uservisit'));
}



}
