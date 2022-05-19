<?php

namespace App\Http\Controllers;

use App\Models\leave_type;
use App\Models\Staff;
use App\Models\User;
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
            dd($request->all());
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
        return view('staffsOnLeave');
    }
}
