<?php

namespace App\Http\Controllers;

use App\Beneficiary;
use App\DumpBeneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;

class BeneficiaryController extends Controller
{
   protected $error_found;
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
        $beneficiaries=Beneficiary::all()->take(10);
        return view('beneficiaries.index',compact('beneficiaries'));
    }
    public function advancedSearchClient(Request $request)
    {
        try {
            $query=\DB::table('beneficiaries');
            $end_time ="";
            $start_time="";
            if($request->start_date != ""){
                $start_time = date("Y-m-d", strtotime($request->start_date));
            }
            if($request->end_date != ""){
                $end_time = date("Y-m-d", strtotime($request->end_date));
            }
            if($request->progress_number != ""){
                $query->where('progress_number','LIKE',"%{$request->progress_number}%");
            }
            if($request->full_name != ""){
                $query->where('full_name','LIKE',"%{$request->full_name}%");
            }
            if($request->sex != "" && $request->sex != "All"){
                $query->where('sex','=',"$request->sex");
            }
            if($request->nationality != "" && $request->nationality != "All"){
                $query->where('nationality','LIKE',"%{$request->nationality}%");
            }
            if($request->address != ""){
                $query->where('address','LIKE',"%{$request->address}%");
            }
            if($request->category != ""){
                $query->where('category','LIKE',"%{$request->category}%");
            }
            if($start_time != "" && $end_time !=""){
                $range = [$start_time, $end_time];
                $query->whereBetween('date_registration', $range);
            }
            elseif($start_time != "" && $end_time ==""){
                $query->where('date_registration', $start_time);
            }
            elseif($start_time == "" && $end_time !=""){
                $query->where('date_registration', $end_time);
            }

            $beneficiaries = $query->get();

            $records = array();

            $count = 1;
            foreach ($beneficiaries as $beneficiary) {
                $camp = "";
                $records[] = array(
                    $count++,
                    $beneficiary->progress_number,
                    $beneficiary->full_name,
                    $beneficiary->sex,
                    $beneficiary->age,
                    $beneficiary->nationality,
                    $beneficiary->address,
                    '<label><input type="radio" name="beneficiary_id" value="' . $beneficiary->id . ' " onclick="getPSNProfile(this.value);"></label>',
                );
            }

            echo json_encode($records);
        }
        catch (\Exception $ex)
        {
            return Response::json(array(
                'success' => false,
                'errors' => 1,
                'messagge' => $ex->getMessage()
            ), 402); // 400 being the HTTP code for an invalid request.
        }

    }

    //
    public function getJSonData()
    {
        //
        $beneficiaries=Beneficiary::all();
        $iTotalRecords =count(Beneficiary::all());
        $sEcho = intval(10);

        $records = array();
        $records["data"] = array();


        $count=1;
        foreach($beneficiaries as $beneficiary) {

            $records["data"][] = array(
                $count++,
                $beneficiary->date_registration,
                $beneficiary->progress_number,
                $beneficiary->full_name,
                $beneficiary->age,
                $beneficiary->sex,
                $beneficiary->diagnosis,
                $beneficiary->code,
                $beneficiary->address,
                $beneficiary->nationality,
                $beneficiary->status,
                '<span id="'.$beneficiary->id.'"> <a href="#" class="showRecord " title="View details"> <i class="fa fa-eye "></i>  </a></span>',
                '<span id="'.$beneficiary->id.'">  <a href="#" class="editRecord btn" title="Edit"> <i class="fa fa-edit "></i>  </a> <a href="#" class="deleteRecord btn" title="Delete"> <i class="fa fa-trash text-danger "></i> </a></span>',
            );
        }


        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        echo json_encode($records);
    }
    //
    public function showImport()
    {
        //
        return view('beneficiaries.import');
    }
    public function showImportErrors()
    {
        //
        $beneficiaries=DumpBeneficiary::all();
        return view('beneficiaries.showerrors',compact('beneficiaries'));
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

                \DB::table('dump_beneficiaries')->truncate();
                $results->each(function($row) {



                        if(count(Beneficiary::where('progress_number','=',str_replace(".","",$row->progress_number))->where('full_name','=',ucwords(strtolower($row->full_name)))->get()) > 0 )
                        {
                            $beneficiary=new DumpBeneficiary;
                            $beneficiary->progress_number = $row->progress_number;
                            $beneficiary->full_name = $row->full_name;
                            if($row->date_of_registration != "")
                            {
                                $beneficiary->date_registration = date("Y-m-d",strtotime($row->date_of_registration));
                            }
                            $beneficiary->category = $row->category;
                            $beneficiary->code = $row->code;
                            $beneficiary->age = $row->age;
                            $beneficiary->sex = $row->sex;
                            $beneficiary->family_size = $row->family_size;
                            $beneficiary->number_females = $row->number_of_females;
                            $beneficiary->number_male = $row->number_of_males;
                            $beneficiary->error_descriptions="Beneficiary already registered ";
                            $beneficiary->save();
                            $this->error_found="Client already registered for service in the same date";
                        }
                        elseif ($row->progress_number =="" )
                        {
                            $beneficiary=new DumpBeneficiary;
                            $beneficiary->progress_number = $row->progress_number;
                            $beneficiary->full_name = $row->full_name;
                            if($row->date_of_registration != "")
                            {
                                $beneficiary->date_registration = date("Y-m-d",strtotime($row->date_of_registration)); 
                            }
                            $beneficiary->category = $row->category;
                            $beneficiary->code = $row->code;
                            $beneficiary->age = $row->age;
                            $beneficiary->sex = $row->sex;
                            $beneficiary->family_size = $row->family_size;
                            $beneficiary->number_females = $row->number_of_females;
                            $beneficiary->number_male = $row->number_of_males;
                            $beneficiary->error_descriptions="Beneficiary progress number can not be empty";
                            $beneficiary->save();
                            $this->error_found="Client already registered for service in the same date";
                        }
                        else
                        {
                           $sex="";
                            if(strtolower($row->sex) == "f")
                            {
                                $sex="Female";  
                            }
                            else
                            {
                                $sex="Male";
                            }
                            $beneficiary = new Beneficiary;
                            $beneficiary->progress_number = str_replace(".","",$row->progress_number);
                            $beneficiary->full_name = ucwords(strtolower($row->full_name));
                            if($row->date_of_registration != "")
                            {
                                $beneficiary->date_registration = date("Y-m-d",strtotime($row->date_of_registration));
                            }
                            $beneficiary->category = $row->category;
                            $beneficiary->code = $row->code;
                            $beneficiary->age = $row->age;
                            $beneficiary->sex =$sex;
                            $beneficiary->diagnosis = $row->diagnosis;
                            $beneficiary->family_size = $row->family_size;
                            $beneficiary->number_females = $row->number_of_females;
                            $beneficiary->number_male = $row->number_of_males;
                            $beneficiary->address = $row->address;
                            $beneficiary->nationality = ucwords(strtolower($row->nationality));
                            $beneficiary->save();
                        }
                });

            });

            File::delete($destinationPath . $filename); //Delete after upload
            if($this->error_found != "")
            {
                return  redirect('excel/beneficiaries/errors');
            }
            else
            {
                return  redirect('beneficiaries');
            }

        } catch (\Exception $e) {

           echo $e->getMessage();
           // return  redirect()->back()->with('error',$e->getMessage());
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
        return view('beneficiaries.create');
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
        try{
            $validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'id' => 'required',
                'sex' => 'required',
                'age' => 'required',
                'progress_number' => 'required|unique:beneficiaries',
                'family_size' => 'required',
                'date_registration' => 'required|before:tomorrow',
                'number_male' => 'required|numeric',
                'number_females' => 'required|numeric',
                'diagnosis'=> 'required',
            ]);
            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 400); // 400 being the HTTP code for an invalid request.
            }
            else
            {

                $beneficiary = new Beneficiary;
                $beneficiary->progress_number = $request->progress_number;
                $beneficiary->full_name = ucwords(strtolower($request->full_name));
                $beneficiary->date_registration = $request->date_registration;
                $beneficiary->category = $request->category;
                $beneficiary->code = $request->code;
                $beneficiary->age = $request->age;
                $beneficiary->sex = $request->sex;
                $beneficiary->diagnosis = $request->diagnosis;
                $beneficiary->family_size = $request->family_size;
                $beneficiary->number_females = $request->number_females;
                $beneficiary->number_male = $request->number_male;
                $beneficiary->address = $request->address;
                $beneficiary->nationality = ucwords(strtolower($request->nationality));
                $beneficiary->save();

                return Response::json(array(
                    'success' => true,
                    'errors' => 0,
                    'messages' => "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>"
                ), 200); // 400 being the HTTP code for an invalid request.

            }

        }
        catch(\Exception $ex)
        {
            return Response::json(array(
                'success' => true,
                'errors' => 1,
                'messages' => "<span class='text-danger'><i class='fa-info'></i> $ex->getMessage()</span>"
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
        $beneficiary= Beneficiary::find($id);
        return view('beneficiaries.show',compact('beneficiary'));
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
        $beneficiary= Beneficiary::find($id);
        return view('beneficiaries.edit',compact('beneficiary'));
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
		try{
			$validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'id' => 'required',
                'sex' => 'required',
                'age' => 'required',
                'progress_number' => 'required|unique:beneficiaries,id,'.$request->id,
                'family_size' => 'required',
                'date_registration' => 'required|before:tomorrow',
                'number_male' => 'required|numeric',
                'number_females' => 'required|numeric',
                'diagnosis'=> 'required',
            ]);
            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 400); // 400 being the HTTP code for an invalid request.
            }
            else
            {

                $beneficiary = Beneficiary::find($request->id);
                $beneficiary->progress_number = $request->progress_number;
                $beneficiary->full_name = ucwords(strtolower($request->full_name));
                $beneficiary->date_registration = $request->date_registration;
                $beneficiary->category = $request->category;
                $beneficiary->code = $request->code;
                $beneficiary->age = $request->age;
                $beneficiary->sex = $request->sex;
                $beneficiary->diagnosis = $request->diagnosis;
                $beneficiary->family_size = $request->family_size;
                $beneficiary->number_females = $request->number_females;
                $beneficiary->number_male = $request->number_male;
                $beneficiary->address = $request->address;
                $beneficiary->nationality = ucwords(strtolower($request->nationality));
                $beneficiary->save();

                return Response::json(array(
                    'success' => true,
                    'errors' => 0,
                    'messages' => "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>"
                ), 200); // 400 being the HTTP code for an invalid request.

            }
		
		}
		catch(\Exception $ex)
		{
            return Response::json(array(
                'success' => true,
                'errors' => 1,
                'messages' => "<span class='text-danger'><i class='fa-info'></i> $ex->getMessage()</span>"
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
        $beneficiary= Beneficiary::find($id);
        if(is_object($beneficiary->socialneeds) && $beneficiary->socialneeds != null)
        {
            foreach ($beneficiary->socialneeds as $dt)
            {
                $dt->delete();
            }
        }
        if(is_object($beneficiary->supports) && $beneficiary->supports != null)
        {
            foreach ($beneficiary->supports as $dt)
            {
                $dt->delete();
            }
        }
        $beneficiary->delete();
    }
}
