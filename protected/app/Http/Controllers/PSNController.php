<?php

namespace App\Http\Controllers;

use App\Client;
use App\PSNAssessment;
use App\PSNAssistanceServices;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PSNController extends Controller
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
        $assessment=PSNAssessment::all();
        return view('psn.index',compact('assessment'));
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
        return view('psn.create',compact('client'));
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
        $assessment=new PSNAssessment;
        $assessment->client_id=$request->client_id;
        $assessment->ration_card=$request->ration_card;
        $assessment->family_size=$request->family_size;
        $assessment->progress_number=$request->progress_number;
        $assessment->foster_care=$request->foster_care;
        $assessment->nature_case=$request->nature_case;
        $assessment->nature_case_other=$request->nature_case_other;
        $assessment->family_relationship=$request->family_relationship;
        $assessment->hist_problem=$request->hist_problem;
        $assessment->hist_problem_when=$request->hist_problem_when;
        $assessment->hist_causes=$request->hist_causes;
        $assessment->hist_problem_related=$request->hist_problem_related;
        $assessment->community_initiatives=$request->community_initiatives;
        $assessment->action_planning=$request->action_planning;
        $assessment->general_remarks=$request->general_remarks;
        $assessment->follow_up=$request->follow_up;
        $assessment->caregiver_name=$request->caregiver_name;
        $assessment->caregiver_date=$request->caregiver_date;
        $assessment->interviewer_name=$request->interviewer_name;
        $assessment->interviewer_date=$request->interviewer_date;
        $assessment->reviewer_name=$request->reviewer_name;
        $assessment->reviewer_date=$request->reviewer_date;
        $assessment->save();

        if(count($request->service_name) >0 && $request->service_name !=null && $request->service_name !="")
        {
            foreach ($request->service_name as $serv)
            {
                $psns=New PSNAssistanceServices;
                $psns->service_name=$serv;
                $psns->psn_id= $assessment->id;
                $psns->save();
            }
        }

        return redirect('psn/assessment');
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
        $assessment=PSNAssessment::find($id);
        $client=Client::find($assessment->client_id);
        return view('psn.show',compact('client','assessment'));
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
        $assessment=PSNAssessment::find($id);
        $client=Client::find($assessment->client_id);
        return view('psn.edit',compact('client','assessment'));
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
        $assessment= PSNAssessment::find($request->id);
        $assessment->ration_card=$request->ration_card;
        $assessment->family_size=$request->family_size;
        $assessment->progress_number=$request->progress_number;
        $assessment->foster_care=$request->foster_care;
        $assessment->nature_case=$request->nature_case;
        $assessment->nature_case_other=$request->nature_case_other;
        $assessment->family_relationship=$request->family_relationship;
        $assessment->hist_problem=$request->hist_problem;
        $assessment->hist_problem_when=$request->hist_problem_when;
        $assessment->hist_causes=$request->hist_causes;
        $assessment->hist_problem_related=$request->hist_problem_related;
        $assessment->community_initiatives=$request->community_initiatives;
        $assessment->action_planning=$request->action_planning;
        $assessment->general_remarks=$request->general_remarks;
        $assessment->follow_up=$request->follow_up;
        $assessment->caregiver_name=$request->caregiver_name;
        $assessment->caregiver_date=$request->caregiver_date;
        $assessment->interviewer_name=$request->interviewer_name;
        $assessment->interviewer_date=$request->interviewer_date;
        $assessment->reviewer_name=$request->reviewer_name;
        $assessment->reviewer_date=$request->reviewer_date;
        $assessment->save();


        if(count($request->service_name) >0 && $request->service_name !=null && $request->service_name !="")
        {
           if(is_object($assessment->services) && $assessment->services != null )
           {
               foreach ($assessment->services as $serv)
               {
                   $serv->delete();
               }
           }
            foreach ($request->service_name as $serv)
            {
                $psns=New PSNAssistanceServices;
                $psns->service_name=$serv;
                $psns->psn_id= $assessment->id;
                $psns->save();
            }
        }

        return redirect('psn/assessment');
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
        $assessment=PSNAssessment::find($id);
        if(is_object($assessment->services) && $assessment->services != null )
        {
            foreach ($assessment->services as $serv)
            {
                $serv->delete();
            }
        }
        $assessment->delete();
    }

    public function getClients()
    {
        $clients=Client::where('is_psn','=','Yes')->get();
        return view('psn.clients',compact('clients'));
    }
}
