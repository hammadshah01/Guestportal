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
        if (Auth::attempt(array('email' => $request->input('email'), 'password' => $request->input('password'), 'cnic' => $request->input('cnic')), true)) {
            session::flash("success3", "Login Successfully");
            return redirect('/');
        } else {
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
        $pur = purpose::all();

        // IF VISITOR FOUND QUERY
        if ($numcheck > 0) {
            session::flash("success", 'Visitor Found Successfully');
            return view('search-visitor', compact('visitor', 'department', 'num', 'pur'));
        } else {
            // NOT FOUND REGISTER A NEW VISITOR
            $cnic = $request->cnic;
            session::flash("error", 'Sorry no user found');
            $norecord = "Sorry No User Found";
            return view('newvisitor', compact('norecord', 'department', 'cnic', 'pur'));
        }
    }

    public function newvisitor(Request $request)
    {


        // IF USER EXIST CHECK
        if (visitor::where('cnic', '=', $request->cnic)->exists()) {
            $request->session()->flash('error9', "User already exist");
            return redirect('/');
        }
        // IF USER EXIST END CHECK



        // STORING NEW VISIT
        $visit = new visit;
        $visit->department = $request->department;
        $visit->purpose = $request->purpose;
        $visit->user_cnic = $request->cnic;
        $visit->save();
        $visit_id = $visit->id;
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
        $fileName = time() . '.jpg';
        $myp = 'assets/admin/';
        $savePath = public_path($myp . $fileName);
        $visitor->image = $fileName;
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        file_put_contents($savePath, $data);
        $visitor->save();
        // Adding Allies Users  (1)
       
        if ($request->name2 || $request->cnic2) {
            
           
            $visitor2 = new Visitor;
            $visitor2->name = $request->name2;
            $visitor2->role = 'guest';
            $visitor2->status = 'satisfied';
            $visitor2->cnic = $request->cnic2;
            $imageData2 = $request->input('image2');
            $fileName2 = time() . '.jpg';
            $myp = 'assets/admin/';
            $savePath = public_path($myp . $fileName2);
            $visitor2->image = $fileName2;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData2));
            file_put_contents($savePath, $data);
            $visitor2->referal_visit_id = $visit_id;
            $visitor2->referal = $request->cnic;
            $visitor2->save();
       
        }
        // Adding Allies Users  (2)
        if ($request->name3 || $request->cnic3) {
           
            $visitor3 = new Visitor;
            $visitor3->name = $request->name3;
            $visitor3->role = 'guest';
            $visitor3->cnic = $request->cnic3;
            $visitor3->status = 'satisfied';
            $imageData3 = $request->input('image3');
            $fileName3 = time() . '.jpg';
            $myp = 'assets/admin/';
            $savePath = public_path($myp . $fileName3);
            $visitor3->image = $fileName2;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData3));
            file_put_contents($savePath, $data);
            $visitor3->referal_visit_id =$visit_id;
            $visitor3->referal = $request->cnic;
            $visitor3->save();
      
    }

        // Adding Allies Users  (3)
        if ($request->name4 || $request->cnic4) {
           
            $visitor4 = new Visitor;
            $visitor4->name = $request->name4;
            $visitor4->role = 'guest';
            $visitor4->cnic = $request->cnic4;
            $visitor4->status = 'satisfied';
            $imageData4 = $request->input('image4');
            $fileName4 = time() . '.jpg';
            $myp = 'assets/admin/';
            $savePath = public_path($myp . $fileName4);
            $visitor4->image = $fileName4;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData4));
            file_put_contents($savePath, $data);
            $visitor4->referal_visit_id = $visit_id;
            $visitor4->referal = $request->cnic;
            $visitor4->save();
       
    }
        // ADDING CODE END
        $request->session()->flash('success1', "User Added Successfully");
        return redirect('/');
    }



    public function uservisitsave(request $request)
    {
        // SAVING A NEW VISIT FOR EXISTING USER
        $position = visit::where('gueststatus', 'in')->where('user_cnic', $request->user_cnic)->count();
        if ($position > 0) {
            return redirect('/')->with('error5', "User already Visiting NCA ");
        }
        $visit = new visit;
        $visit->department = $request->department;
        $visit->purpose = $request->purpose;
        $visit->user_cnic = $request->user_cnic;
        $visit->referal = $request->user_cnic;
        $visit->save();
        $visit_id = $visit->id;

        // REGISTSER FIRST ALLY USER NO1



      

            if ($request->name || $request->cnic) {
                $visitor1 = new visitor;
                $visitor1->name = $request->name;
                if ($request->cnic) {
                    $visitor1->cnic = $request->cnic;
                }
                $imageData = $request->input('image');
                $fileName = time() . '.jpg';
                $myp = 'assets/admin/';
                $savePath = public_path($myp . $fileName);
                $visitor1->image = $fileName;
                $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
                file_put_contents($savePath, $data);
                $visitor1->role = 'guest';
                $visitor1->status = "satisfied";
                $visitor1->referal_visit_id = $visit_id;
                $visitor1->referal = $request->user_cnic;
                $visitor1->save();
            }
        



     
            // REGISTSER SECOND ALLY USER NO2
            if ($request->name2 || $request->cnic2) {
                $visitor2 = new visitor;
                $visitor2->name = $request->name2;
                if ($request->cnic2) {
                    $visitor2->cnic = $request->cnic2;
                }
                $imageData2 = $request->input('image2');
                $fileName2 = time() . '.jpg';
                $myp = 'assets/admin/';
                $savePath = public_path($myp . $fileName2);
                $visitor2->image = $fileName2;
                $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData2));
                file_put_contents($savePath, $data);
                $visitor2->role = 'guest';
                $visitor2->status = "satisfied";
                $visitor2->referal_visit_id = $visit_id;
                $visitor2->referal = $request->user_cnic;
                $visitor2->save();
            
        }

     
            // REGISTSER THIRD ALLY USER NO3
            if ($request->name3 || $request->cnic3) {
                $visitor3 = new visitor;
                $visitor3->name = $request->name3;
                if ($request->cnic3) {
                    $visitor3->cnic = $request->cnic3;
                }
                $imageData3 = $request->input('image3');
                $fileName3 = time() . '.jpg';
                $myp = 'assets/admin/';
                $savePath = public_path($myp . $fileName3);
                $visitor3->image = $fileName3;
                $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData3));
                file_put_contents($savePath, $data);
                $visitor3->role = 'guest';
                $visitor3->status = "satisfied";
                $visitor3->referal_visit_id = $visit_id;
                $visitor3->referal = $request->user_cnic;
                $visitor3->save();
            
        }
        $request->session()->flash('success2', "User Added Successfully");
        return redirect('/');
    }
    public function newregister()
    {
        return  view('newvisitor');
    }
}
