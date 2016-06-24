<?php

namespace App\Http\Controllers;

use App\Client;
use App\Disability;
use Illuminate\Http\Request;

use App\Http\Requests;

class DisabilityController extends Controller
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
        $disabilities=Disability::all();
        return view('general.disabilities.index',compact('disabilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('general.disabilities.create');
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
        $disability=new Disability;
        $disability->category=$request->category;
        $disability->descriptions=$request->descriptions;
        $disability->remarks=$request->remarks;
        $disability->save();
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
        $disability= Disability::find($id);
        return view('general.disabilities.show',compact('disability'));
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
        $disability= Disability::find($id);
        return view('general.disabilities.edit',compact('disability'));
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
        $disability= Disability::find($request->id);
        $disability->category=$request->category;
        $disability->descriptions=$request->descriptions;
        $disability->remarks=$request->remarks;
        $disability->save();
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
        $disability= Disability::find($id);
        $disability->delete();
    }
    
    
    
    
    
    
}
