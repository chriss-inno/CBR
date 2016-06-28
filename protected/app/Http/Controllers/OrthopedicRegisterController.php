<?php

namespace App\Http\Controllers;

use App\Client;
use App\OrthopedicRegister;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrthopedicRegisterController extends Controller
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
        $attendances=OrthopedicRegister::all();
        return view('attendances.orthopedic.index',compact('attendances'));
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
        return view('attendances.orthopedic.create',compact('client'));
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
        $attendances=new OrthopedicRegister;
        $attendances->client_id=$request->client_id;
        $attendances->date_attended=$request->date_attended;
        $attendances->diagnosis=$request->diagnosis;
        $attendances->appliance_provided=$request->appliance_provided;
        $attendances->measurement_date=$request->measurement_date;
        $attendances->delivery_date=$request->delivery_date;
        $attendances->remarks=$request->remarks;
        $attendances->save();

        return redirect('orthopedic');
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
        $attendances= OrthopedicRegister::find($id);
        $client=Client::find($attendances->client_id);
        return view('attendances.orthopedic.show',compact('attendances','client'));
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
        $attendances= OrthopedicRegister::find($id);
        $client=Client::find($attendances->client_id);
        return view('attendances.orthopedic.edit',compact('attendances','client'));
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
        $attendances= OrthopedicRegister::find($request->id);
        $attendances->date_attended=$request->date_attended;
        $attendances->diagnosis=$request->diagnosis;
        $attendances->appliance_provided=$request->appliance_provided;
        $attendances->measurement_date=$request->measurement_date;
        $attendances->delivery_date=$request->delivery_date;
        $attendances->remarks=$request->remarks;
        $attendances->save();

        return redirect('orthopedic');
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
        $attendances= OrthopedicRegister::find($id);
        $attendances->delete();
    }

    public function getClients()
    {
        $clients=Client::all();
        return view('attendances.orthopedic.clients',compact('clients'));
    }
}
