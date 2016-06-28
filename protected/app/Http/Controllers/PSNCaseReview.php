<?php

namespace App\Http\Controllers;

use App\Client;
use App\PSNAssessment;
use App\PSNCases;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PSNCaseReview extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $assessment=PSNAssessment::find($id);
        if(is_object($assessment->cReview) && $assessment->cReview !="" && $assessment->cReview != null && count($assessment->cReview)>0)
        {
          
            $client=Client::find($assessment->client_id);
            return view('psn.cases.edit',compact('assessment','client'));
        }
        else
        {
            $client=Client::find($assessment->client_id);
            return view('psn.cases.create',compact('assessment','client'));
        }

        
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
        $case=new PSNCases;
        $case->psn_id=$request->psn_id;
        $case->needs_status=$request->needs_status;
        $case->comments=$request->comments;
        $case->remarks=$request->remarks;
        $case->save();
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
    public function update(Request $request)
    {
        //
        $case= PSNCases::find($request->id);
        $case->needs_status=$request->needs_status;
        $case->comments=$request->comments;
        $case->remarks=$request->remarks;
        $case->save();
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
        $case= PSNCases::find($id);
        $case->delete();
    }
}
