<?php

namespace App\Http\Controllers;

use App\Client;
use App\DumpRPRegister;
use App\DumpRSRegister;
use App\PhysiotherapyRegister;
use App\RehabilitationProgress;
use App\RehabilitationRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;

class RehabilitationServicesController extends Controller
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
        $attendances=RehabilitationRegister::all();
        return view('rehabilitation.index',compact('attendances'));
    }
    public function searchClient()
    {
        //
        $clients=Client::all();
        return view('rehabilitation.clients',compact('clients'));
    }

    public function showRSImport()
    {
        //
        return view('rehabilitation.import');
    }
    public function showRSImportError()
    {
        //

        $dump_errors=DumpRSRegister::all();
        return view('rehabilitation.registererror',compact('dump_errors'));
    }
    public function showProgressImporterrors()
    {
        //
        $dump_errors=DumpRPRegister::all();
        return view('rehabilitation.progress.registererror',compact('dump_errors'));
    }
    public function postRSImport(Request $request)
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

                \DB::table('dump_r_s_registers')->truncate();
                $results->each(function($row) {

                    if(count(Client::where('file_number','=',$row->file_number)->get()) >0 && Client::where('file_number','=',$row->file_number)->get() != null)
                    {


                        if(count(RehabilitationRegister::where('file_no','=',$row->file_number)->where('attendance_date','=',date("Y-m-d",strtotime($row->attending_date)))->get()) > 0 )
                        {
                            $dump_rs=new DumpRSRegister;
                            $dump_rs->file_no=$row->file_number;
                            $dump_rs->diagnosis=$row->diagnosis;
                            $dump_rs->attendance_date=date("Y-m-d",strtotime($row->attending_date)) ;
                            $dump_rs->error_description="Client already registered for service in the same date";
                            $dump_rs->save();
                            $this->error_found="Client already registered for service in the same date";
                        }
                        else
                        {
                            $attendances=new RehabilitationRegister;
                            $attendances->attendance_date=date("Y-m-d",strtotime($row->attending_date));
                            $attendances->diagnosis=$row->diagnosis;
                            $attendances->file_no=$row->file_number;
                            $attendances->save();
                        }



                    }
                    else
                    {
                        //Save in dump
                        $dump_rs=new DumpRSRegister;
                        $dump_rs->file_no=$row->file_number;
                        $dump_rs->diagnosis=$row->diagnosis;
                        $dump_rs->attendance_date=date("Y-m-d",strtotime($row->attending_date)) ;
                        $dump_rs->error_description="Client not found in clients list";
                        $dump_rs->save();
                        $this->error_found="Client not found in clients list";

                    }

                });

            });

            File::delete($destinationPath . $filename); //Delete after upload
            if($this->error_found != "")
            {
                return  redirect('excel/rehabilitation/services/errors');
            }
            else
            {
                return  redirect('rehabilitation/services');
            }

        } catch (\Exception $e) {

            echo $e->getMessage();
            //return  redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function postProgressImport(Request $request)
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

                \DB::table('dump_r_p_registers')->truncate();
                $results->each(function($row) {

                    if(count(Client::where('file_number','=',$row->file_number)->get()) >0 && Client::where('file_number','=',$row->file_number)->get() != null)
                    {


                        if(count(RehabilitationProgress::where('file_no','=',$row->file_number)->where('attendance_date','=',date("Y-m-d",strtotime($row->attending_date)))->get()) > 0 )
                        {
                            $dump_rs=new DumpRPRegister;
                            $dump_rs->file_no=$row->file_number;
                            $dump_rs->assistance_provided = $row->treatment_or_assistance_provided;
                            $dump_rs->progress = $row->progress;
                            $dump_rs->remarks = $row->remarks;
                            $dump_rs->attendance_date=date("Y-m-d",strtotime($row->date)) ;
                            $dump_rs->error_descriptions="Client progress was  already registered in the same date";
                            $dump_rs->save();
                            $this->error_found="Client already registered for service in the same date";
                        }
                        else
                        {
                            $attendances=new RehabilitationProgress;
                            $attendances->attendance_date=date("Y-m-d",strtotime($row->date));
                            $attendances->file_no=$row->file_number;
                            $attendances->assistance_provided = $row->treatment_or_assistance_provided;
                            $attendances->progress = $row->progress;
                            $attendances->remarks = $row->remarks;
                            $attendances->save();
                        }



                    }
                    else
                    {
                        //Save in dump
                        $dump_rs=new DumpRPRegister;
                        $dump_rs->file_no=$row->file_number;
                        $dump_rs->assistance_provided = $row->treatment_or_assistance_provided;
                        $dump_rs->progress = $row->progress;
                        $dump_rs->remarks = $row->remarks;
                        $dump_rs->attendance_date=date("Y-m-d",strtotime($row->date)) ;
                        $dump_rs->error_descriptions="Client does not exist in client list";
                        $dump_rs->save();
                        $this->error_found="Client does not exist in client list";

                    }

                });

            });

            File::delete($destinationPath . $filename); //Delete after upload
            if($this->error_found != "")
            {
                return  redirect('excel/rehabilitation/progress/errors');
            }
            else
            {
                return  redirect('rehabilitation/services/progress');
            }

        } catch (\Exception $e) {

            echo $e->getMessage();
            //return  redirect()->back()->with('error',$e->getMessage());
        }
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
        return view('rehabilitation.create',compact('client'));
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
            if(!count(RehabilitationRegister::where('file_no','=',$request->file_no)->where('diagnosis','=',$request->diagnosis)->where('attendance_date','=',$request->attendance_date)->get())>0) {
                $attendances = new RehabilitationRegister;
                $attendances->attendance_date = $request->attendance_date;
                $attendances->diagnosis = $request->diagnosis;
                $attendances->file_no = $request->file_no;
                $attendances->save();
                return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
            }
            else{
                return "<span class='text-danger'><i class='fa-info'></i> Save failed, data exist</span>"; 
            }

            
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
        $attendances=RehabilitationRegister::find($id);
        return view('rehabilitation.show',compact('attendances'));
    }
    public function showPrint($id)
    {
        //
        $attendances=RehabilitationRegister::find($id);
        return view('rehabilitation.pdf',compact('attendances'));
    }
    public function getPdf($id)
    {
        //
        $attendances=RehabilitationRegister::find($id);
        $fo = 'This form is applicable for identification of functional needs of PWDs/PSNs according to the components <br/>of the Global CBR matrix ( Health , Education ,  Livelihood , social and Empowerment ).';
        $pdf = \PDF::loadView('rehabilitation.pdf', compact('attendances'))
            ->setOption('footer-right', 'Page [page]')
            ->setOption('page-offset', 0);
        return $pdf->download('client_rehabilitation.pdf');
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
        $attendances=RehabilitationRegister::find($id);
        return view('rehabilitation.edit',compact('attendances'));

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
        if(count(Client::where('file_number','=',$request->file_no)->get()) > 0 ) {
            $attendances = RehabilitationRegister::find($request->id);
            $attendances->attendance_date = $request->attendance_date;
            $attendances->diagnosis = $request->diagnosis;
            $attendances->file_no = $request->file_no;
            $attendances->save();
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
        $attendances=RehabilitationRegister::find($id);
        $attendances->delete();
    }
}
