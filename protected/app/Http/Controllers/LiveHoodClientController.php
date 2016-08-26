<?php

namespace App\Http\Controllers;

use App\LiveliHoodsClient;
use App\LiveliHoodsGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class livehoodClientController extends Controller
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
        $clients=LiveliHoodsClient::all();
        return view('livelihood.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('livelihood.clients.create');
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
        if(!count(LiveliHoodsClient::where('progress_number','=',$request->progress_number)->get()) > 0) {

            return "<span class='text-danger'><i class='fa-info'></i>Save failed: Progress number [".$request->progress_number."] was not available in beneficiary list </span>";

        }
        else {
            $client = new LiveliHoodsClient;
            $client->progress_number = $request->progress_number;
            $client->full_name = $request->full_name;
            $client->sex = $request->sex;
            $client->age = $request->age;
            $client->category = $request->category;
            $client->position = $request->position;
            $client->group = $request->group;
            $client->zone = $request->zone;
            $client->activity = $request->activity;
            $client->donor = $request->donor;
            $client->registration_date = $request->registration_date;
            $client->phone = $request->phone;
            $client->nationality = $request->nationality;
            $client->save();

            return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
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
        $client=LiveliHoodsClient::find($id);
        return view('livelihood.clients.show',compact('client'));
    }
    public function showImport()
    {
        //
        return view('livelihood.clients.import');
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

                    if(!count(LiveliHoodsClient::where('progress_number','=',$row->progress_number)->get()) >0 && Client::where('file_number','=',$row->progress_number)->get() != null)
                    {
                        //Save in dump
                        $this->error_found="error occured";
                    }
                    else
                    {

                        $camp_name="";
                        $groups=LiveliHoodsGroup::where('group_name','=',ucwords(strtolower($row->group)))->get()->first();
                        if(count($groups) >0 && $groups != null)
                        {
                            $camp_name=$groups->group_name;
                        }
                        else
                        {
                           $groups= new LiveliHoodsGroup;
                           $groups->group_name=ucwords(strtolower($row->group));
                           $groups->category=$row->category;
                           $groups->zone=$row->zone;
                           $groups->activity=$row->activity;
                           $groups->donor=$row->donor;
                           $groups->registration_date=date(strtotime($row->registration_date));
                           $groups->phone=$row->phone;
                           $groups->nationality=$row->nationality;
                           $groups->save();

                           $camp_name=$groups->group_name;
                        }

                       
                        $client=new LiveliHoodsClient;
                        $client->full_name=$row->full_name;
                        $client->sex=$row->gender;
                        $client->age=$row->age;
                        $client->category=$row->category;
                        $client->position=$row->position;
                        $client->group=$camp_name;
                        $client->zone=$row->zone;
                        $client->activity=$row->activity;
                        $client->donor=$row->donor;
                        $client->registration_date=$row->registration_date;
                        $client->progress_number=$row->progress_number;
                        $client->phone=$row->phone;
                        $client->nationality=$row->nationality;
                        $client->save();
                    }

                });

            });

            File::delete($destinationPath . $filename); //Delete after upload

            if($this->error_found != "")
            {
                return  redirect()->back()->with('error',$this->error_found);
            }
            else
            {
                return  redirect('livelihood/clients');
            }
        } catch (\Exception $e) {

            echo $e->getMessage();
            return  redirect()->back()->with('error',$e->getMessage());
        }
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
        $client=LiveliHoodsClient::find($id);
        return view('livelihood.clients.edit',compact('client'));
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
        if(!count(LiveliHoodsClient::where('progress_number','=',$request->progress_number)->get()) > 0) {

            return "<span class='text-danger'><i class='fa-info'></i>Save failed: Progress number [".$request->progress_number."] was not available in beneficiary list </span>";

        }
        else {
            $client = LiveliHoodsClient::find($id);
            $client->full_name = $request->full_name;
            $client->sex = $request->sex;
            $client->age = $request->age;
            $client->category = $request->category;
            $client->position = $request->position;
            $client->group = $request->group;
            $client->zone = $request->zone;
            $client->activity = $request->activity;
            $client->donor = $request->donor;
            $client->registration_date = $request->registration_date;
            $client->progress_number = $request->progress_number;
            $client->phone = $request->phone;
            $client->nationality = $request->nationality;
            $client->save();

            return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
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
        $client=LiveliHoodsClient::find($id);
        $client->delete();
    }
}
