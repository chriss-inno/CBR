<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientAssessment;
use App\ClientDisability;
use App\Disability;
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

        //Process disability
        if(strtolower($client->is_disabled) =="yes" )
        {
            $clds=new ClientDisability;
            $clds->client_id=$client->id;
            $clds->category_id=$request->category_id;
            $clds->disability_diagnosis=$request->disability_diagnosis;
            $clds->remarks=$request->remarks;
            $clds->save();
        }

        //Assessments details
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
        $assessment->client_id=$client->id;
        $assessment->save();


        return redirect('clients');

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

        //Process disability
        if(strtolower($client->is_disabled) =="yes" )
        {
           
           if($request->clds_id !="")
           {
               $clds= ClientDisability::find($request->clds_id);
               $clds->client_id=$client->id;
               $clds->category_id=$request->category_id;
               $clds->disability_diagnosis=$request->disability_diagnosis;
               $clds->remarks=$request->remarks;
               $clds->save();
           }
            else
            {
                $clds=new ClientDisability;
                $clds->client_id=$client->id;
                $clds->category_id=$request->category_id;
                $clds->disability_diagnosis=$request->disability_diagnosis;
                $clds->remarks=$request->remarks;
                $clds->save();
            }
          
        }

        //Assessments details
        if($request->assessment_id !="") {
            $assessment = ClientAssessment::find($request->assessment_id);
            $assessment->consultation_no = $request->consultation_no;
            $assessment->consultation_date = $request->consultation_date;
            $assessment->diagnosis = $request->diagnosis;
            $assessment->medical_history = $request->medical_history;
            $assessment->social_history = $request->social_history;
            $assessment->employment = $request->employment;
            $assessment->skin_condition = $request->skin_condition;
            $assessment->daily_activities = $request->daily_activities;
            $assessment->remarks = $request->remarks;
            $assessment->joint_assessment = $request->joint_assessment;
            $assessment->muscle_assessment = $request->muscle_assessment;
            $assessment->functional_assessment = $request->functional_assessment;
            $assessment->problem_list = $request->problem_list;
            $assessment->treatment = $request->treatment;
            $assessment->examiner_name = $request->examiner_name;
            $assessment->examiner_title = $request->examiner_title;
            $assessment->client_id = $client->id;
            $assessment->save();
        }
        else
        {
            $assessment= new ClientAssessment;
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
            $assessment->client_id=$client->id;
            $assessment->save();
        }

        return redirect('clients');
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
        if(is_object($client->disabilities) && count($client->disabilities) >0)
        {
            foreach ($client->disabilities as $dis)
            {
                $dis->delete(); 
            }
        }
        if(is_object($client->disabilities) && count($client->disabilities) >0)
        {
            foreach ($client->disabilities as $dis)
            {
                $dis->delete();
            }
        }
        $client->delete();

        //Need safe delete

    }
    
    public function showSummary($id)
    {
        $client=Client::find($id);
        return view('clients.summary',compact('client'));
    }
}
