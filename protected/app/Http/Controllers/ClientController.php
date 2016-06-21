<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients=Client::all();
        return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create');
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
        $age=date("Y")-date("Y",strtotime($request->dob));

        $client=new Client;
        $client->first_name=$request->first_name;
        $client->middle_name=$request->middle_name;
        $client->last_name=$request->last_name;
        $client->sex=$request->sex;
        $client->dob=$request->dob;
        $client->marital_status=$request->marital_status;
        $client->address=$request->address;
        $client->phone=$request->phone;
        $client->nationality=$request->nationality;
        $client->camp_id=$request->camp_id;
        $client->center_id=$request->center_id;
        $client->region_id=$request->region_id;
        $client->district_id=$request->district_id;
        $client->ward=$request->ward;
        $client->street=$request->street;
        $client->status=$request->status;
        $client->age=$age;
        $client->status="Active";
        $client->is_disabled=$request->is_disabled;
        $client->input_by=Auth::user()->user_name;
        $client->save();

        //Create registration no
        $client->reg_no="CBR".date("Y")."CL".$client->id;
        $client->save();

        return redirect('assessment/client/'.$client->id);

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
        $client=Client::find($id);
        return view('clients.show',compact('client'));
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
        $client=Client::find($id);
        return view('clients.edit',compact('client'));
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
        $age=date("Y")-date("Y",strtotime($request->dob));

        $client= Client::find($id);
        $client->first_name=$request->first_name;
        $client->middle_name=$request->middle_name;
        $client->last_name=$request->last_name;
        $client->sex=$request->sex;
        $client->dob=$request->dob;
        $client->marital_status=$request->marital_status;
        $client->address=$request->address;
        $client->phone=$request->phone;
        $client->nationality=$request->nationality;
        $client->camp_id=$request->camp_id;
        $client->center_id=$request->center_id;
        $client->region_id=$request->region_id;
        $client->district_id=$request->district_id;
        $client->ward=$request->ward;
        $client->street=$request->street;
        $client->status=$request->status;
        $client->age=$age;
        $client->status="Active";
        $client->is_disabled=$request->is_disabled;
        $client->input_by=Auth::user()->user_name;
        $client->save();
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
        $client= Client::find($id);
        $client->delete();

        //Need safe delete

    }
}
