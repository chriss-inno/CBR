<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientDisability;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClientDisabilityController extends Controller
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
        $clients=Client::where('is_disabled','=','Yes')->get();
        return view('general.disabilities.clients.index',compact('clients'));
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
        return view('general.disabilities.clients.create',compact('client'));
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


        $client=Client::find($request->client_id);
        $client->category_id=$request->category_id;
        $client->disability_diagnosis=$request->disability_diagnosis;
        $client->remarks=$request->remarks;
        $client->save();

       return "<span class='text-info'><i class='fa fa-info'></i> Saved successfully </span>";
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
        return view('general.disabilities.clients.show',compact('client'));
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
        $clds= ClientDisability::find($id);
        return view('general.disabilities.clients.edit',compact('clds'));
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
        $client=Client::find($request->client_id);
        $client->category_id=$request->category_id;
        $client->disability_diagnosis=$request->disability_diagnosis;
        $client->remarks=$request->remarks;
        $client->save();

        return "data saved";
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
        $client=Client::find($id);
        $client->category_id="";
        $client->disability_diagnosis="";
        $client->remarks="";
        $client->save();
    }
}
