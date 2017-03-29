<?php

namespace App\Http\Controllers;

use App\Beneficiary;
use App\Client;
use App\ProtectionAssessment;
use App\ProtectionAssessmentNeed;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProtectionAssessmentController extends Controller
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
        $assessments=ProtectionAssessment::all();
        return view('protection.index',compact('assessments'));
    }
    public function getClientDetails($id)
    {
        //
        $beneficiary=Beneficiary::find($id);
        return view('protection.clientprofile',compact('beneficiary'));
    }
    public function printForm($id)
    {
        //
        $assessment=ProtectionAssessment::find($id);
        return view('protection.print',compact('assessment'));
    }
    public function downloadForm($id)
    {
        //
        $assessment=ProtectionAssessment::find($id);
        $pdf = \PDF::loadView('protection.print', compact('assessment'));
        return $pdf->download('Protection_Assessments_form.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('protection.create');
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
        try {
            $validator = Validator::make($request->all(), [
                'beneficiary_id' => 'required',
                'progress_number' => 'required',
                'assessment_date' => 'required|before:tomorrow',
                'name' => 'required',
                'sex' => 'required',
                'marital_status' => 'required',

            ]);
            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 400); // 400 being the HTTP code for an invalid request.
            } else {

                $assessment=new ProtectionAssessment;
                $assessment->beneficiary_id =$request->beneficiary_id;
                $assessment->progress_number =$request->progress_number;
                $assessment->fs =$request->fs;
                $assessment->code =$request->code;
                $assessment->assessment_date =date("Y-m-d",strtotime($request->assessment_date));
                $assessment->assessment_place =$request->assessment_place;
                $assessment->name =$request->name;
                $assessment->sex =$request->sex;
                if ($request->dob != ""){
                    $assessment->dob =date("Y-m-d",strtotime($request->dob));
                }
                $assessment->hh_household =$request->hh_household;
                $assessment->marital_status =$request->marital_status;
                $assessment->address =$request->address;
                $assessment->mobile =$request->mobile;
                $assessment->residence_status =$request->residence_status;
                $assessment->condition =$request->condition;
                $assessment->history =$request->history;
                $assessment->action_plan =$request->action_plan;
                $assessment->save();

                //Needs
                if (isset($request->service_request)) {
                    foreach ($request->service_request as $need ){

                        $needs=new ProtectionAssessmentNeed();
                        $needs->assessment_id=$assessment->id;
                        $needs->needs=$need;
                        $needs->save();
                    }
                }

                return response()->json([
                    'success' => true,
                    'message' => " Saved Successful"
                ], 200);

            }
        }
       catch (\Exception $ex)
        {
            return Response::json(array(
                'success' => false,
                'errors' => 1,
                'message' => $ex->getMessage()
            ), 400); // 400 being the HTTP code for an invalid request.
        }

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
        $assessment=ProtectionAssessment::find($id);
        return view('protection.show',compact('assessment'));
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
        $assessment=ProtectionAssessment::find($id);
        return view('protection.edit',compact('assessment'));
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
        try {
            $validator = Validator::make($request->all(), [
                'progress_number' => 'required',
                'assessment_date' => 'required|before:tomorrow',
                'name' => 'required',
                'sex' => 'required',
                'marital_status' => 'required',

            ]);
            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 400); // 400 being the HTTP code for an invalid request.
            } else {

                $assessment= ProtectionAssessment::find($id);
                $assessment->progress_number =$request->progress_number;
                $assessment->fs =$request->fs;
                $assessment->code =$request->code;
                $assessment->assessment_date =date("Y-m-d",strtotime($request->assessment_date));
                $assessment->assessment_place =$request->assessment_place;
                $assessment->name =$request->name;
                $assessment->sex =$request->sex;
                if ($request->dob != ""){
                    $assessment->dob =date("Y-m-d",strtotime($request->dob));
                }
                $assessment->hh_household =$request->hh_household;
                $assessment->marital_status =$request->marital_status;
                $assessment->address =$request->address;
                $assessment->mobile =$request->mobile;
                $assessment->residence_status =$request->residence_status;
                $assessment->condition =$request->condition;
                $assessment->history =$request->history;
                $assessment->action_plan =$request->action_plan;
                $assessment->save();

                //Needs
                $needs =ProtectionAssessmentNeed::where("assessment_id",'=',$assessment->id)->delete();
                if (isset($request->service_request)) {
                    foreach ($request->service_request as $need ){

                        $needs=new ProtectionAssessmentNeed();
                        $needs->assessment_id=$assessment->id;
                        $needs->needs=$need;
                        $needs->save();
                    }
                }

                return response()->json([
                    'success' => true,
                    'message' => " Saved Successful"
                ], 200);

            }
        }
        catch (\Exception $ex)
        {
            return Response::json(array(
                'success' => false,
                'errors' => 1,
                'message' => $ex->getMessage()
            ), 400); // 400 being the HTTP code for an invalid request.
        }
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
        $assessment=ProtectionAssessment::find($id)->delete();
    }
}
