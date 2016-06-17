<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth',['except' => ['login','postLogin']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function forgotPassword(Request $requests)
    {

        $email=$requests->email;
        $username=$requests->username;
        $user =User::where('email', '=', $email)->where('user_name','=',$username)->get()->first();
        if(count($user) > 0)
        {
            $password='password'.rand(5, 15);
            $user->password=bcrypt($password);
            $user->save();
            //send email

            //Send email to registered user
            $data = array(
                'username' => $username,
                'password' =>$password,
                'name' =>   $string = ucwords(strtolower($user->first_name . " " . $user->last_name)) ,
            );

            return redirect('login')->with('message', 'You have successful reset your password, new generated password was sent to your email');


        }else
        {
            return redirect('login')->with('message', 'Password reset failed, invalid email or username');
        }
    }
    public function login()
    {
        if(Auth::guest())
        {
            return view('users.login');
        }
        else
        {
            return redirect('home');
        }
    }

    //Post login for Authenticating users
    public function postLogin(Request $request)
    {
        $username=strtolower($request->username);
        $password=$request->password;



        if (Auth::attempt(['user_name' => $username, 'password' => $password]))
        {
            if(Auth::user()->blocked ==1 || Auth::user()->status=="Inactive")
            {

                Auth::logout();
                return redirect()->back()->with('message', 'Login Failed you don\'t have Access to login please  Contact support team');
            }
            else
            {

                $user= User::find(Auth::user()->id);
                $user->last_success_login=date("Y-m-d h:i:s");
                $user->save();

                // //Audit log
                return redirect()->intended('home');

            }

        }
        else {

            return redirect()->back()->with('message', 'Login Failed,Invalid username or password');
        }

    }
    public function logout()
    {
        if (Auth::check())
        {
            $user= User::find(Auth::user()->id);
            $user->last_logout=date("Y-m-d h:i:s");
            $user->save();

        }
        Auth::logout();
        return redirect('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
