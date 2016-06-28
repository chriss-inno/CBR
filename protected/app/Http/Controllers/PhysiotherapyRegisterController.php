<?php

namespace App\Http\Controllers;

use App\Client;
use App\PhysiotherapyRegister;
use Illuminate\Http\Request;

use App\Http\Requests;

class PhysiotherapyRegisterController extends Controller
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
        $attendances=PhysiotherapyRegister::all();
        return view('attendances.physiotherapy.index',compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //

        $client=Client::find($id);
        return view('attendances.physiotherapy.create',compact('client'));
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
        $phyr=new PhysiotherapyRegister;
        $phyr->client_id=$request->client_id;
        $phyr->attendance_date=$request->attendance_date;
        $phyr->file_no=$request->file_no;
        $phyr->diagnosis=$request->diagnosis;
        $phyr->causes=$request->causes;
        $phyr->save();

        return redirect('physiotherapy');
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
        $attendance= PhysiotherapyRegister::find($id);
        $client=Client::find($attendance->client_id);
        return view('attendances.physiotherapy.edit',compact('attendance','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $phyr= PhysiotherapyRegister::find($request->id);
        $phyr->attendance_date=$request->attendance_date;
        $phyr->file_no=$request->file_no;
        $phyr->diagnosis=$request->diagnosis;
        $phyr->causes=$request->causes;
        $phyr->save();
        return redirect('physiotherapy');
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
        $attendance= PhysiotherapyRegister::find($id);
        $attendance->delete();
    }

    public function getClients()
    {
       $clients=Client::all();
      return view('attendances.physiotherapy.clients',compact('clients'));
    }
}
