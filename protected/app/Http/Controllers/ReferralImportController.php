<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientReferral;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ReferralImportController extends Controller
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
        return view('clients.referral.import');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $row
     * @return \Illuminate\Http\Response
     */
    public function store(Request $row)
    {
        //
        try {
            $this->validate($row, [
                'clients_file' => 'required|mimes:xls,xlsx',
            ]);

            $file= $row->file('clients_file');
            $destinationPath = public_path() .'/uploads/temp/';
            $filename   = str_replace(' ', '_', $file->getClientOriginalName());

            $file->move($destinationPath, $filename);

            Excel::load($destinationPath . $filename, function ($reader) {

                $results = $reader->get();
               // \DB::table('dump_assessments')->truncate();
                $results->each(function($row) {

                    
                    if(count(Client::where('file_number','=',$row->file_number)->get()) >0 && $row->file_number != null && $row->file_number != "")
                    {

                        $client=Client::where('file_number','=',$row->file_number)->get()->first();

                        if(!count(ClientReferral::where('client_id','=',$client->id)->where('referral_to','=', $row->referral_to)->where('referred_by_date','=',date("Y-m-d", strtotime($row->referral_date)))->get()) >0) {
                            $referral = new ClientReferral;
                            $referral->client_id = $client->id;
                            $referral->referral_to = $row->referral_to;
                            if ($row->referral_date != "") {
                                $referral->referral_date = date("Y-m-d", strtotime($row->referral_date));
                            }
                            $referral->history = $row->history;
                            $referral->examination = $row->examination;
                            $referral->referral_reason = $row->reason_for_referral;
                            $referral->referred_by_name = $row->referred_by_name;
                            $referral->referred_by_title = $row->referred_by_title;
                            $referral->referred_by_date = date("Y-m-d", strtotime($row->referral_date));
                            $referral->findings = $row->findings;
                            $referral->findings_name = $row->findings_name;
                            $referral->findings_title = $row->findings_title;
                            $referral->save();
                        }
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
                return  redirect('referrals');
            }
        } catch (\Exception $e) {

            echo $e->getMessage();
            return  redirect()->back()->with('error',$e->getMessage());
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
     * @param  \Illuminate\Http\Request  $row
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $row, $id)
    {
        //
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
    }
}
