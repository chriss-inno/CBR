<?php

namespace App\Http\Controllers;

use App\Centre;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CentreController extends Controller
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
        $centres=Centre::all();
        return view('general.centres.index',compact('centres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('general.centres.create');
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
        $centre=new Centre;
        $centre->centre_name=$request->centre_name;
        $centre->description=$request->description;
        $centre->camp_id=$request->camp_id;
        $centre->status=$request->status;
        $centre->input_by=Auth::user()->user_name;
        $centre->save();

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
        $centre= Centre::find($id);
        return view('general.centres.show',compact('centre'));
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
        $centre= Centre::find($id);
        return view('general.centres.edit',compact('centre'));
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
        $centre= Centre::find($id);
        $centre->centre_name=$request->centre_name;
        $centre->description=$request->description;
        $centre->camp_id=$request->camp_id;
        $centre->status=$request->status;
        $centre->input_by=Auth::user()->user_name;
        $centre->save();
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
        $centre= Centre::find($id);
        $centre->delete();
    }
}
