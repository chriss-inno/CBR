<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientAssessment;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClientAssessmentController extends Controller
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
        $client=Client::find($id);
        if(is_object($client->assessment) && $client->assessment !=null && $client->assessment !="" )
        {
            return view('clients.assessment.edit',compact('client'));
        }
        else
        {
            return view('clients.assessment.create',compact('client'));
        }

    }

    public function newUserCreate($id)
    {
        //
        $client=Client::find($id);
        return view('clients.assessment.userassessment',compact('client'));
    }
    public function postNewUserCreate(Request $request)
    {
        //
        $assessment=new ClientAssessment;
        $assessment->consultation_no=$request->consultation_no;
        $assessment->consultation_date=$request->consultation_date;
        $assessment->diagnosis=$request->diagnosis;
        $assessment->medical_history=$request->medical_history;
        $assessment->social_history=$request->social_history;
        $assessment->employment=$request->employment;
        $assessment->skin_condition=$request->skin_condition;
        $assessment->daily_activities=$request->daily_activities;
        $assessment->remarks=$request->remarks;
        $assessment->joint_assessment=$request->joint_assessment;
        $assessment->muscle_assessment=$request->muscle_assessment;
        $assessment->functional_assessment=$request->functional_assessment;
        $assessment->problem_list=$request->problem_list;
        $assessment->treatment=$request->treatment;
        $assessment->examiner_name=$request->examiner_name;
        $assessment->examiner_title=$request->examiner_title;
        $assessment->client_id=$request->client_id;
        $assessment->save();
        
       return  redirect('clients');
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
        $assessment=new ClientAssessment;
        $assessment->consultation_no=$request->consultation_no;
        $assessment->consultation_date=$request->consultation_date;
        $assessment->diagnosis=$request->diagnosis;
        $assessment->medical_history=$request->medical_history;
        $assessment->social_history=$request->social_history;
        $assessment->employment=$request->employment;
        $assessment->skin_condition=$request->skin_condition;
        $assessment->daily_activities=$request->daily_activities;
        $assessment->remarks=$request->remarks;
        $assessment->joint_assessment=$request->joint_assessment;
        $assessment->muscle_assessment=$request->muscle_assessment;
        $assessment->functional_assessment=$request->functional_assessment;
        $assessment->problem_list=$request->problem_list;
        $assessment->treatment=$request->treatment;
        $assessment->examiner_name=$request->examiner_name;
        $assessment->examiner_title=$request->examiner_title;
        $assessment->client_id=$request->client_id;
        $assessment->save();

        $client=Client::find($request->client_id);
        $client->status=$request->status;
        $client->save();

        return  redirect('clients');
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
        $assessment= ClientAssessment::find($request->assessment_id);
        $assessment->consultation_no=$request->consultation_no;
        $assessment->consultation_date=$request->consultation_date;
        $assessment->diagnosis=$request->diagnosis;
        $assessment->medical_history=$request->medical_history;
        $assessment->social_history=$request->social_history;
        $assessment->employment=$request->employment;
        $assessment->skin_condition=$request->skin_condition;
        $assessment->daily_activities=$request->daily_activities;
        $assessment->remarks=$request->remarks;
        $assessment->joint_assessment=$request->joint_assessment;
        $assessment->muscle_assessment=$request->muscle_assessment;
        $assessment->functional_assessment=$request->functional_assessment;
        $assessment->problem_list=$request->problem_list;
        $assessment->treatment=$request->treatment;
        $assessment->examiner_name=$request->examiner_name;
        $assessment->examiner_title=$request->examiner_title;
        $assessment->client_id=$request->client_id;
        $assessment->save();

        $client=Client::find($request->client_id);
        $client->status=$request->status;
        $client->save();

        return  redirect('clients');
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
        if(is_object($client->assessment) && $client->assessment !=null && $client->assessment !="" )
        {
            $client->assessment->delete();
        }
    }
}
