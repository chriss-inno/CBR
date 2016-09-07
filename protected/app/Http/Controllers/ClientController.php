<?php

namespace App\Http\Controllers;

use App\Camp;
use App\Centre;
use App\Client;
use App\ClientAssessment;
use App\ClientDisability;
use App\Disability;
use App\District;
use App\DumpAssessment;
use App\DumpDisability;
use App\Region;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    protected  $error_found;
    public function __construct()
    {
        $this->middleware('auth');
        $this->error_found="";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients=Client::orderBy('first_name','ASC')->get()->take(10);
        return view('clients.index',compact('clients'));
    }
    public function getJSonData()
    {
        //
        $clients=Client::orderBy('full_name','ASC')->get();
        $iTotalRecords =count(Client::all());
        $sEcho = intval(10);

        $records = array();
        $records["data"] = array();


        $count=1;
        foreach($clients as $client) {
            $cent="";
            if($client->centre != null && is_object($client->centre))
            {
                $cent= $client->centre->centre_name;
            }

            $records["data"][] = array(
                $count++,
                $client->file_number,
                $client->full_name,
                $client->sex,
                $client->age,
                $client->nationality,
                $cent,
                $client->address,
                '<span id="'.$client->id.'">  <a href="'.url("assessment/create").'/'.$client->id.'"  class="btn" > <i class="fa fa-file green "> Open</i></a><a href="'.url("assessment").'/'.$client->id.'"  class="btn" ><i class="fa fa-eye green "> View</i> </a></span>',
                '<span id="'.$client->id.'">  <a href="#" class="editRecord btn" title="Edit"> <i class="fa fa-edit "></i>  </a> <a href="#" class="deleteRecord btn" title="Delete"> <i class="fa fa-trash text-danger "></i> </a></span>',
            );
        }


        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        echo json_encode($records);
    }
    public function getJSonDataSearch()
    {
        //
        $clients=Client::orderBy('full_name','ASC')->get();
        $iTotalRecords =count(Client::all());
        $sEcho = intval(10);

        $records = array();
        $records["data"] = array();


        $count=1;
        foreach($clients as $client) {
            $cent="";
            if($client->centre != null && is_object($client->centre))
            {
                $cent= $client->centre->centre_name;
            }

            $records["data"][] = array(
                $count++,
                $client->file_number,
                $client->full_name,
                $client->sex,
                $client->age,
                $client->nationality,
                $cent,
                $client->address,
                '<span id="'.$client->id.'">  <a href="#"  class="addRecord btn" > <i class="fa fa-file green "> Register </i></a></span>',
            );
        }


        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        echo json_encode($records);
    }
    public function showDisabilityImportError()
    {
        //
        $dump_errors=DumpDisability::all();
        return view('clients.disabilityerror',compact('dump_errors'));
    }

    public function showClientImportError()
    {
        //
        $dump_errors=DumpAssessment::all();
        return view('clients.clientimporterror',compact('dump_errors'));
    }
    
    //Import
    public function showImport()
    {
        //
        return view('clients.import');
    }

    public function postDisabilityImport(Request $request)
    {
        //
        try {
            $this->validate($request, [
                'clients_file' => 'required|mimes:xls,xlsx',
            ]);

            $file= $request->file('clients_file');
            $destinationPath = public_path() .'/uploads/temp/';
            $filename   = str_replace(' ', '_', $file->getClientOriginalName());

            $file->move($destinationPath, $filename);

            Excel::load($destinationPath . $filename, function ($reader) {

                $results = $reader->get();

                \DB::table('dump_disabilities')->truncate();
                $results->each(function($row) {

                    if(count(Client::where('file_number','=',$row->file_number)->get()) >0 && Client::where('file_number','=',$row->file_number)->get() != null)
                    {

                        $category_id="";
                        $client= Client::where('file_number','=',$row->file_number)->get()->first();
                        if(count(Disability::where('','=',$row->file_number)->get()) > 0 )
                        {
                            $dis=Disability::where('','=',$row->file_number)->get()->first();
                            $category_id=$dis->id;
                        }
                        else
                        {
                            $dis=new Disability;
                            $dis->category=$row->disability_category;
                            $dis->save();
                            $category_id= $dis->id;
                        }

                        $client->category_id=$category_id;
                        $client->disability_diagnosis=$row->disability_diagnosis;
                        $client->remarks=$row->remarks;
                        $client->save();

                    }
                    else
                    {
                        //Save in dump


                        $dump_disability=new DumpDisability;
                        $dump_disability->file_number=$row->file_number;
                        $dump_disability->disability_category=$row->disability_category;
                        $dump_disability->disability_diagnosis=$row->disability_diagnosis;
                         $dump_disability->remarks=$row->remarks;
                        $dump_disability->error_descriptions="Client not exist";
                        $dump_disability->save();

                        $this->error_found="Client not exist";
                    }

                });

            });

            File::delete($destinationPath . $filename); //Delete after upload
            if($this->error_found != "")
            {
                return  redirect('excel/import/disabilities'); 
            }
            else
            {
                return  redirect('clients');
            }

        } catch (\Exception $e) {

            //echo $e->getMessage();
            return  redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function postImport(Request $request)
    {
        //
        try {
            $this->validate($request, [
                'clients_file' => 'required|mimes:xls,xlsx',
            ]);

            $file= $request->file('clients_file');
            $destinationPath = public_path() .'/uploads/temp/';
            $filename   = str_replace(' ', '_', $file->getClientOriginalName());

            $file->move($destinationPath, $filename);

            Excel::load($destinationPath . $filename, function ($reader) {

                $results = $reader->get();
                \DB::table('dump_assessments')->truncate();
                $results->each(function($row) {

                    $age=date("Y")-date("Y",strtotime($row->date_of_birth));
                    if(count(Client::where('file_number','=',$row->file_number)->get()) >0 && Client::where('file_number','=',$row->file_number)->get() != null)
                    {
                       //Save in dump
                    }
                    else
                    {
                        $region_id="";
                        $regi=Region::where('region_name','=',$row->region_name)->get()->first();
                        if(count($regi) >0 && $regi != null)
                        {
                            $region_id=$regi->id;
                        }
                        else
                        {
                            $regi= new Region;
                            $regi->region_name=$row->region_name;
                            $regi->save();
                            $region_id=$regi->id;
                        }

                        //Districts
                        $district_id="";
                        $distr=District::where('district_name','=',$row->district)->get()->first();
                        if(count($distr) >0 && $distr != null)
                        {
                            $district_id=$distr->id;
                        }
                        else
                        {
                            $distr= new District;
                            $distr->district_name=$row->district;
                            $distr->region_id=$region_id;
                            $distr->save();
                            $district_id=$distr->id;
                        }

                        $camp_id="";
                        $camp=Camp::where('camp_name','=',$row->camp_name)->get()->first();
                        if(count($camp) >0 && $camp != null)
                        {
                            $camp_id=$camp->id;
                        }
                        else
                        {
                            $camp= new Camp;
                            $camp->camp_name=$row->camp_name;
                            $camp->region_id=$region_id;
                            $camp->district_id=$district_id;
                            $camp->save();
                            $camp_id=$camp->id;
                        }

                        //Centres
                        $center_id="";
                        $centre=Centre::where('centre_name','=',$row->service_center)->get()->first();
                        if(count($centre) >0 && $centre != null)
                        {
                            $center_id=$centre->id;
                        }
                        else
                        {
                            $centre= new Centre;
                            $centre->centre_name=$row->service_center;
                            $centre->camp_id=$camp_id;
                            $centre->save();
                            $center_id=$centre->id;
                        }


                        $client=new Client;
                        $client->file_number=$row->file_number;
                        $client->full_name=$row->full_name;
                        //$client->middle_name=$row->middle_name;
                       // $client->last_name=$row->last_name;
                        $client->sex=$row->sex;
                        $client->age=$row->age;
                       // $client->marital_status=$row->marital_status;
                        $client->address=$row->address;
                       // $client->phone=$row->phone;
                        $client->nationality=ucwords(strtolower($row->nationality));
                        $client->camp_id=$camp_id;
                        $client->center_id=$center_id;
                        $client->region_id=$region_id;
                        $client->district_id=$district_id;
                       // $client->ward=$row->ward;
                        //$client->street=$row->street;
                        $client->status=$row->client_assessment_status;
                        $client->input_by=Auth::user()->user_name;
                        $client->date_registered =date("Y-m-d",strtotime($row->date_of_first_consultation));
                        $client->save();

                        $assessment=new ClientAssessment;
                        $assessment->consultation_no=$row->full_name;
                        $assessment->consultation_date=date("Y-m-d",strtotime($row->date_of_first_consultation));
                        $assessment->diagnosis=$row->diagnosis;
                        $assessment->medical_history=$row->medical_history;
                        $assessment->social_history=$row->social_history;
                        $assessment->employment=$row->school_or_employment;
                        $assessment->skin_condition=$row->skin_condition;
                        $assessment->daily_activities=$row->activities_of_daily_living;
                        $assessment->remarks=$row->remarks;
                        $assessment->joint_assessment=$row->joint_assessment;
                        $assessment->muscle_assessment=$row->muscle_assessment;
                        $assessment->functional_assessment=$row->functional_assessment;
                        $assessment->problem_list=$row->problem_list;
                        $assessment->treatment=$row->treatment;
                        $assessment->examiner_name=$row->examiner_name;
                        $assessment->examiner_title=$row->examiner_title;
                        $assessment->client_id=$client->id;
                        $assessment->save();
                    }

                });

            });

            File::delete($destinationPath . $filename); //Delete after upload

            if($this->error_found != "")
            {
                return  redirect()->back();
            }
            else
            {
                return  redirect('clients');
            }
        } catch (\Exception $e) {

            echo $e->getMessage();
            return  redirect()->back()->with('error',$e->getMessage());
        }
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
        if(count(Client::where('file_number','=',$request->file_number)->get()) > 0) {

            return "<span class='text-danger'><i class='fa fa-info'></i>Save failed: File number [".$request->file_number."] was already used </span>";

        }
        else {


            $client = new Client;
            $client->full_name = $request->fullname;
            $client->sex = $request->sex;
            $client->age = $request->age;
            //$client->marital_status=$request->marital_status;
            $client->address = $request->address;
            //$client->phone=$request->phone;
            $client->nationality = $request->nationality;
            $client->camp_id = $request->camp_id;
            $client->center_id = $request->center_id;
            $client->region_id = $request->region_id;
            $client->district_id = $request->district_id;
            //$client->ward=$request->ward;
            // $client->street=$request->street;
            // $client->status=$request->status;

            $client->input_by = Auth::user()->user_name;
            $client->file_number = $request->file_number;
            $client->date_registered = $request->date_registered;
            $client->save();

            //Create registration no
            //$client->file_number="CBR".date("Y")."CL".$client->id;
            // $client->save();

            //Assessments details
            /*
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

            //Process disability
            if(strtolower($client->status) =="disabled")
            {
                return redirect('disabilities/clients/show/'.$client->id);
            }
            else
            {
                return redirect('clients');
            }
            */
            return "<span class='text-success'><i class='fa fa-info'></i> Saved successfully</span>";
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
        if( count(Client::where('id','<>',$id)->where('file_number','=',$request->file_number)->get()) > 0) {

            return "<span class='text-danger'><i class='fa-info'></i>Save failed: File number [".$request->file_number."] was not found </span>";

        }
        else {
            $age = date("Y") - date("Y", strtotime($request->dob));

            $client = Client::find($id);
            $client->full_name = $request->fullname;
            //$client->middle_name=$request->middle_name;
            // $client->last_name=$request->last_name;
            $client->sex = $request->sex;
            $client->age = $request->age;
            //$client->marital_status=$request->marital_status;
            $client->address = $request->address;
            // $client->phone=$request->phone;
            $client->nationality = $request->nationality;
            $client->camp_id = $request->camp_id;
            $client->center_id = $request->center_id;
            $client->region_id = $request->region_id;
            $client->district_id = $request->district_id;
            // $client->ward=$request->ward;
            //$client->street=$request->street;
            //$client->status=$request->status;
            //$client->age=$age;
            $client->file_number = $request->file_number;
            $client->date_registered = $request->date_registered;
            $client->input_by = Auth::user()->user_name;
            $client->save();

            //Process disability/
            /*
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

            if(strtolower($client->status) =="disabled")
            {
                return redirect('disabilities/clients/show/'.$client->id);
            }
            else
            {
                return redirect('clients');
            }
      */
            return "<span class='text-success'><i class='fa fa-info'></i> Saved successfully</span>";
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
        $client= Client::find($id);
        if(is_object($client->assessment) && $client->assessment != null){
           $client->assessment->delete();}
        if(is_object($client->disabilities) && $client->disabilities != null){
            foreach ($client->disabilities as $dt){$dt->delete();}
        }
        if(is_object($client->rehabilitations) && $client->rehabilitations != null){
            foreach ($client->rehabilitations as $dt){$dt->delete();}
        }
        if(is_object($client->referrals) && $client->referrals != null){
            foreach ($client->referrals as $dt){$dt->delete();}
        }
        if(is_object($client->orthopedics) && $client->orthopedics != null){
            foreach ($client->orthopedics as $dt){
                if(is_object($dt->items) && $dt->items != null)
                {
                    foreach ($dt->items as $oss){
                        $oss->delete();
                    }
                }
                $dt->delete();
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
