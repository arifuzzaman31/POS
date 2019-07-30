<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;

class RegistrationController extends Controller
{
    public function dashboard()
    {
         return view('setup.setup');
    }
   
    public function index()
    {
         return view('admin.registration');
    }

   public function login()
    {
         return view('admin.login');
    }

    public function loginCheck(Request $request)
    {
        $credential = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credential)) {

               Session::put('admin', Auth::guard('admin')->user());
                return response()->json(['status' => true]);
        } else {
             return response()->json(['status' => false]);
        } 
        
    }
   
    public function create()
    {
        //
    }
   
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
              $store = User::insert([
                    'full_name' => $request->full_name,
                    'user_name' => $request->user_name,
                    'email'     => $request->email,
                    'contact'   => $request->contact,
                    'password'  => bcrypt($request->password),
                    'address'   => $request->address,
                    'status'    => $request->status
               ]);
                  if ($store) {
                        DB::commit();
                        return response()->json(['success' => true, 'message' => 'Added an Admin']);
                    }
                    else {
                        DB::rollBack();
                        return response()->json(['success' => false, 'message' => 'Something went wrong!']);
                    }
            
        } catch (Exception $e) {
               DB::rollBack();
               return response()->json(['success' => true, 'message' => $e->errorInfo[2]]);
        }
    }

    public function show(registration $registration)
    {
        //
    }

    public function edit(registration $registration)
    {
        //
    }

    public function update(Request $request, registration $registration)
    {
        //
    }

    public function logout()
    {
        if (Session::has('admin')) {
            Session::forget(Auth::guard('admin')->user());
                auth('admin')->logout();
            Session::flush();
                return redirect('/backend');
        }
    }
}
