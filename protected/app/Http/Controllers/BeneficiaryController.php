<?php

namespace App\Http\Controllers;

use App\Beneficiary;
use App\DumpBeneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        $beneficiaries=Beneficiary::all();
        return view('beneficiaries.index',compact('beneficiaries'));
    }
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



                        if(count(Beneficiary::where('progress_number','=',$row->progress_number)->get()) > 0 )
                        {
                            $beneficiary=new DumpBeneficiary;
                            $beneficiary->progress_number = $row->progress_number;
                            $beneficiary->full_name = $row->full_name;
                            $beneficiary->date_registration = date("Y-m-d",strtotime($row->date_of_registration));
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
                            $beneficiary->date_registration = date("Y-m-d",strtotime($row->date_of_registration));
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
                            $beneficiary = new Beneficiary;
                            $beneficiary->progress_number = $row->progress_number;
                            $beneficiary->full_name = $row->full_name;
                            $beneficiary->date_registration = date("Y-m-d",strtotime($row->date_of_registration));
                            $beneficiary->category = $row->category;
                            $beneficiary->code = $row->code;
                            $beneficiary->age = $row->age;
                            $beneficiary->sex = $row->sex;
                            $beneficiary->family_size = $row->family_size;
                            $beneficiary->number_females = $row->number_of_females;
                            $beneficiary->number_male = $row->number_of_males;
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
        if(count(Beneficiary::where('progress_number','=',$request->progress_number)->get()) > 0) {
            $beneficiary = new Beneficiary;
            $beneficiary->progress_number = $request->progress_number;
            $beneficiary->full_name = $request->full_name;
            $beneficiary->date_registration = $request->date_registration;
            $beneficiary->category = $request->category;
            $beneficiary->code = $request->code;
            $beneficiary->age = $request->age;
            $beneficiary->sex = $request->sex;
            $beneficiary->family_size = $request->family_size;
            $beneficiary->number_females = $request->number_females;
            $beneficiary->number_male = $request->number_male;
            $beneficiary->save();
            return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
        }
        else
        {
            return "<span class='text-danger'><i class='fa-info'></i>Save failed: Progress number [".$request->progress_number."] was already used </span>";
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
        $beneficiary= Beneficiary::find($request->id);
        $beneficiary->progress_number=$request->progress_number;
        $beneficiary->full_name=$request->full_name;
        $beneficiary->date_registration=$request->date_registration;
        $beneficiary->category=$request->category;
        $beneficiary->code=$request->code;
        $beneficiary->age=$request->age;
        $beneficiary->sex=$request->sex;
        $beneficiary->family_size=$request->family_size;
        $beneficiary->number_females=$request->number_females;
        $beneficiary->number_male=$request->number_male;
        $beneficiary->save();
        return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
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
        $beneficiary->delete();
    }
}
