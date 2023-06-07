<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Models\visit;
use App\Models\purpose;
use App\Models\visitor;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BaseController extends Controller
{
    public function index()
    {

        return view('index');
    }

    public function signin()
    {
        if (!Auth::check()) {
            return view('signin');
        } else {
            return redirect('/');
        }

    }

    public function custom_login(Request $request)
    {

        // LOGIN CODE FOR THE USER AND MODERATORS
if(Auth::attempt(array('email'=>$request->input('email'),'password'=>$request->input('password'),'cnic'=>$request->input('cnic')),true)){
    session::flash("success3", "Login Successfully");
    return redirect('/');
}else{
    session::flash('error', "invalid login credentails");
    return redirect('signin');
}
    }

    public function searchuser(Request $request)
    {
        // CHECK THE THE EXIST USER OR CREATE A NEW ONE
        $num = visit::where('user_cnic', '=', $request->cnic)->count();
        $numcheck = visitor::where('cnic', '=', $request->cnic)->count();
        $visitor = visitor::where('cnic', '=', $request->cnic)->get();
        $department = department::all();



        //PURPOSE
        $pur=purpose::all();

        // IF VISITOR FOUND QUERY
        if ($numcheck > 0) {
            session::flash("success", 'Visitor Found Successfully');
            return view('search-visitor', compact('visitor', 'department', 'num','pur'));
        } else {
            // NOT FOUND REGISTER A NEW VISITOR
            $cnic=$request->cnic;
            session::flash("error", 'Sorry no user found');
            $norecord = "Sorry No User Found";
            return view('search-visitor', compact('norecord', 'department','cnic','pur'));
        }

    }

    public function newvisitor(Request $request)
    {



        // IF USER EXIST CHECK
        if (visitor::where('cnic', '=', $request->cnic)->exists()) {
            $request->session()->flash('error', "User already exist");
            return redirect('/');
        }
        // IF USER EXIST END CHECK



        // STORING NEW VISIT
        $visit = new visit;
        $visit->department = $request->department;
        $visit->purpose = $request->purpose;
        $visit->user_cnic = $request->cnic;
        $visit->save();
        // END STORING VISIT


        // ADDING A NEW VISITOR
        $visitor = new Visitor;
        $visitor->name = $request->name;
        $visitor->role = $request->role;
        $visitor->cnic = $request->cnic;
        $visitor->fathername = $request->fathername;
        $visitor->name = $request->name;
        $visitor->status = $request->status;
        $visitor->yearofadmission = $request->admission_year;
        if ($request->graduation_year == "Present") {
            $visitor->yearofgraduation = 0;
        } elseif ($request->graduation_year != "Present") {
            $visitor->yearofgraduation = $request->graduation_year;
        }


        $imageData = $request->input('image');
        $fileName = time().'.jpg';
        $myp='assets/admin/';
        $savePath = public_path($myp.$fileName);
        $visitor->image=$fileName;
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        file_put_contents($savePath, $data);


        $visitor->save();
        // ADDING CODE END

        $request->session()->flash('success1', "User Added Successfully");
        return redirect('/');
    }

    public function uservisitsave(request $request)
    {


        // SAVING A NEW VISIT FOR EXISTING USER
        $position=visit::where('gueststatus','in')->where('user_cnic',$request->user_cnic)->count();
        if($position>0){
            return redirect('/')->with('error5', "User already Visiting NCA ");
        }
        $visit = new visit;
        $visit->department = $request->department;
        $visit->purpose = $request->purpose;
        $visit->user_cnic = $request->user_cnic;
        $visit->save();
        $request->session()->flash('success2', "User Added Successfully");
        return redirect('/');
    }


}
