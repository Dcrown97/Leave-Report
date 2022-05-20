<?php

namespace App\Http\Controllers;

use App\Models\leave_request;
use App\Models\leave_type;
use App\Models\Staff;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LeavereportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'Login', 'SignUp'
        ]);
    }


    public function SignUp (Request $request) {
        //redirect to dashboard if user is already logged in
        if (Auth::check()) {
            return redirect()->route('/');
        }

        //admin registration
        if ($request->isMethod('post')) {
            // dd($ request->all());
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);

            $user = new User();

            //admin registration
            if ($request->isMethod('post')) {
                // dd($ request->all());
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required',
                    'password_confirmation' => 'required|same:password',
                ]);

                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $saved = $user->save();
                if ($saved) {
                    return redirect('/login')->with('success', 'Registration Successful');
                } else {
                    return redirect('/signup')->with('error', 'Registration Failed');
                }
            }
        }
        return view('signUp');
    }

    public function Login (Request $request) {
           
        //redirect to dashboard if user is already logged in
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
            $data = $request->all();
            try {
                $user = User::where('email', $data['email'])->first();
            } catch (\Exception $e) {
                Alert::error('Server Error', 'Error');
                return redirect()->back()->with('error', 'Server Error');
            }
            if ($user) {
                if (Hash::check($data['password'], $user->password)) {
                    Auth::login($user);
                    $request->session()->put('user', $user);
                    return redirect()->route('dashboard')->with('success', ucfirst($user->type) . ' ' . 'Logged In Successfully');
                } else {
                    return redirect()->back()->with('error', 'Invalid password');
                }
            } else {

                return redirect()->back()->with('error', 'Invalid email');
            }
        }

        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function Dashboard()
    {
        return view('dashboard');
    }

    public function AddStaffs(Request $request)
    {

        //add staffs
        if ($request->isMethod('post')) {
            // dd($ request->all());
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'rank' => 'required',
                'unit' => 'required',
            ]);

            $Staffs = new Staff();

            //Staffs Registration
            if ($request->isMethod('post')) {
                // dd($ request->all());
                $request->validate([
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'rank' => 'required',
                    'unit' => 'required',
                ]);

                $Staffs->first_name = $request->first_name;
                $Staffs->last_name = $request->last_name;
                $Staffs->rank = $request->rank;
                $Staffs->unit = $request->unit;
                $saved = $Staffs->save();
                if ($saved) {
                    return redirect('/all_staffs')->with('success', 'Staff Registered Successfully');
                } else {
                    return redirect('/add_staffs')->with('error', 'Staff Registration Failed');
                }
            }
        }

        return view('addStaffs');
    }

    public function AllStaffs()
    {
        $Staffs = Staff::all();
        return view('allStaffs', compact('Staffs'));
    }

    public function LeaveRequest (Request $request) {
        $Leave_type = leave_type::all();
        $Staffs = Staff::all();
        if($request->isMethod('post')){
            $request->validate([
                'staff_id' => 'required',
                'leave_type_id' => 'required',
                // 'commencement_date"' => 'required',
                'resumption_date' => 'required',
                'num_of_days' => 'required',
                'remarks' => 'required',
            ]);
            $remaining_days = leave_request::where('staff_id',$request->staff_id)->get();
            $total_days = 0;
         foreach($remaining_days as $remaining_day){
             $total_days += $remaining_day->num_of_days;
            }
            // dd($total_days);
            if($request->leave_type_id == 1 || $request->leave_type_id == 2)
            {
                // dd($request->leave_type_id);
                //check if total days is less than or equal to 30
                if($total_days <= 30){
                    //check if num_of_days plus total days is less than or equal to 30
                    if($request->num_of_days + $total_days <= 30){
                        
                        if($request->leave_type_id == 1 && $request->num_of_days > 7)
                        {
                            return back()->with('error', 'Only Seven days allowed for casual leave or select annual leave');
                        }

                        if($request->leave_type_id == 2 && $request->num_of_days > 30)
                        {
                            return back()->with('error', 'You have only 30days of annual leave');
                        }
                        $leave_request = new leave_request();
                        $leave_request->staff_id = $request->staff_id;
                        $leave_request->leave_type_id = $request->leave_type_id;
                        $leave_request->commencement_date = $request->commencement_date;
                        $leave_request->reumption_date = $request->resumption_date;
                        $leave_request->num_of_days = $request->num_of_days;
                        $leave_request->remarks = $request->remarks;
                        $saved = $leave_request->save();
                        if($saved){
                            return redirect('/leave_request')->with('success', 'Leave Request Successfully');
                        }else{
                            return redirect('/leave_request')->with('error', 'Leave Request Failed');
                        }
                    }else{
                        //get the remaining days
                        $remaining_days = 30 - $total_days;
                        return redirect('/leave_request')->with('error', 'You have only '.$remaining_days.' days remaining');
                    }
                 
            } else {
                    return back()->with('error', 'Staff has already taken 30 days leave');
                }
        }else if($request->leave_type_id == 3){
                if ($total_days <= 90) {
                    $leave_request = new leave_request();
                    $leave_request->staff_id = $request->staff_id;
                    $leave_request->leave_type_id = $request->leave_type_id;
                    $leave_request->commencement_date = $request->commencement_date;
                    $leave_request->reumption_date = $request->resumption_date;
                    $leave_request->num_of_days = $request->num_of_days;
                    $leave_request->remarks = $request->remarks;
                    $saved = $leave_request->save();
                    if ($saved) {
                        return back()->with('success', 'Leave Requested Successfully');
                    } else {
                        return back()->with('error', 'Leave Request Failed');
                    }
                } else {
                    return back()->with('error', 'Staff has already taken 90 days leave');
                }
        }else{
            return back()->with('error', 'Something went wrong');
        }
        
        }
        return view('requestLeave', compact('Leave_type', 'Staffs'));
    }

    public function AddLeaveType (Request $request) {

        //add leave type
        if ($request->isMethod('post')) {
            // dd($ request->all());
            $request->validate([
                'leave_type' => 'required',
                'num_of_days' => 'required',
            ]);

            $leave_type = new leave_type();

            //leave type registration
            if ($request->isMethod('post')) {
                // dd($ request->all());
                $request->validate([
                    'leave_type' => 'required',
                    'num_of_days' => 'required',
                ]);

                $leave_type->leave_type = $request->leave_type;
                $leave_type->num_of_days = $request->num_of_days;
                $saved = $leave_type->save();
                if ($saved) {
                    return redirect('/add_leave_type')->with('success', 'Leave Type Added Successfully');
                } else {
                    return redirect('/add_leave_type')->with('error', 'Leave Type Adding Failed');
                }
            }
        }
            
            return view('addLeaveType');
    }

    public function StaffsOnLeave () {
        $staffs_on_leave = leave_request::with('staff')->with('leave_type')->get();
        // dd($staffs_on_leave);
        return view('staffsOnLeave', compact('staffs_on_leave'));
    }

    public function getResumptionDate(Request $request){
        //get com_date and days from request, add days to com_date to get resumption date
        //check if days is present on the request
        if($request->days !== null){
            $days = $request->days;
            $com_date = $request->com_date;
            $resumption_date = date('Y-m-d', strtotime($com_date . ' + '.$days.' days'));
            echo json_encode($resumption_date);
        }else{
            echo json_encode('Please enter No days first');
        }
    }

    public function getLeaveTypeDays(Request $request){
        if($request->leave_type_id !== null){
        $leaveDays = leave_type::find($request->leave_type_id);
        // dd($leaveDays);
        echo json_encode($leaveDays->num_of_days);
        }else{
            echo json_decode('No Leave type selected');
        }
    }
}
