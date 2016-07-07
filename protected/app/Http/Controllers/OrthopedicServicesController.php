<?php

namespace App\Http\Controllers;

use App\Client;
use App\DumpOrthopedicServices;
use App\OrthopedicServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;

class OrthopedicServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attendances=OrthopedicServices::all();
        return view('orthopedic.index',compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('orthopedic.create');
    }

    public function showImport()
    {
        //
        return view('orthopedic.import');
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

                \DB::table('dump_orthopedic_services')->truncate();
                $results->each(function($row) {

                    if(count(Client::where('file_number','=',$row->file_number)->get()) >0 && Client::where('file_number','=',$row->file_number)->get() != null)
                    {


                        if(count(OrthopedicServices::where('file_no','=',$row->file_number)->where('attendance_date','=',date("Y-m-d",strtotime($row->attending_date)))->get()) > 0 )
                        {
                            $dump_rs=new DumpOrthopedicServices();
                            $dump_rs->file_no=$row->file_number;
                            $dump_rs->diagnosis=$row->diagnosis;
                            $dump_rs->item_serviced=$row->item_serviced;
                            $dump_rs->service_received=$row->service_received;
                            $dump_rs->quantity=$row->quantity_of_items;
                            $dump_rs->attendance_date=date("Y-m-d",strtotime($row->attending_date)) ;
                            $dump_rs->error_descriptions="Client already registered for service in the same date";
                            $dump_rs->save();
                            $this->error_found="Client already registered for service in the same date";
                        }
                        else
                        {
                            $attendances=new OrthopedicServices;
                            $attendances->attendance_date=date("Y-m-d",strtotime($row->attending_date));
                            $attendances->diagnosis=$row->diagnosis;
                            $attendances->file_no=$row->file_number;
                            $attendances->service_received=$row->service_received;
                            $attendances->item_serviced=$row->item_serviced;
                            $attendances->quantity=$row->quantity_of_items;
                            $attendances->save();
                        }



                    }
                    else
                    {
                        //Save in dump
                        $dump_rs=new DumpOrthopedicServices;
                        $dump_rs->file_no=$row->file_number;
                        $dump_rs->diagnosis=$row->diagnosis;
                        $dump_rs->item_serviced=$row->item_serviced;
                        $dump_rs->service_received=$row->service_received;
                        $dump_rs->quantity=$row->quantity_of_items;
                        $dump_rs->attendance_date=date("Y-m-d",strtotime($row->attending_date)) ;
                        $dump_rs->error_descriptions="Client not found in client list";
                        $dump_rs->save();
                        $this->error_found="Client not found in client list";

                    }

                });

            });

            File::delete($destinationPath . $filename); //Delete after upload
            if($this->error_found != "")
            {
                return  redirect('excel/orthopedic/services/errors');
            }
            else
            {
                return  redirect('orthopedic/services');
            }

        } catch (\Exception $e) {

            echo $e->getMessage();
            //return  redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function showImportErrors()
    {
        //
        $dump_errors=DumpOrthopedicServices::all();
        return view('orthopedic.registererror',compact('dump_errors'));
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
        if(count(Client::where('file_number','=',$request->file_no)->get()) > 0 )
        {
            if(count($request->service_received) >0 && $request->service_received != null) {
                $qcount = 0;
                foreach ($request->service_received as $serv) {
                    if($serv != "" && $request->quantity[$qcount] != "" &&  $request->item_serviced[$qcount] !="")
                    {
                        $attendances = new OrthopedicServices;
                        $attendances->attendance_date = $request->attendance_date;
                        $attendances->file_no = $request->file_no;
                        $attendances->diagnosis = $request->diagnosis;
                        $attendances->service_received = $serv;
                        $attendances->item_serviced = $request->item_serviced[$qcount];
                        $attendances->quantity = $request->quantity[$qcount];
                        $attendances->save();
                    }
                    $qcount++;
                }
            }

            return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
        }
        else
        {
            return "<p><h3 class='text-danger'><i class='fa fa-spinner fa-spin'></i> Error in processing data: Client with file number [".$request->file_no."] is not registered<h3></p>";
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
        $attendance=OrthopedicServices::find($id);
        return view('orthopedic.show',compact('attendance'));
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
        $attendance=OrthopedicServices::find($id);
        return view('orthopedic.edit',compact('attendance'));
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
       
        if(count(Client::where('file_number','=',$request->file_no)->get()) > 0 )
        {
             $attendance=OrthopedicServices::find($request->id);
             $attendance->attendance_date = $request->attendance_date;
             $attendance->file_no = $request->file_no;
             $attendance->diagnosis = $request->diagnosis;
             $attendance->service_received =  $request->service_received;
             $attendance->item_serviced = $request->item_serviced;
             $attendance->quantity =  $request->attendance_quantitydate;
              $attendance->save();
                  

            return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
        }
        else
        {
            return "<p><h3 class='text-danger'><i class='fa fa-spinner fa-spin'></i> Error in processing data: Client with file number [".$request->file_no."] is not registered<h3></p>";
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
        $attendance=OrthopedicServices::find($id);
        $attendance->delete();
    }
}
