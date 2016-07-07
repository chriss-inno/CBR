<?php

namespace App\Http\Controllers;

use App\Client;
use App\RehabilitationProgress;
use Illuminate\Http\Request;

use App\Http\Requests;

class RehabilitationProgressController extends Controller
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
        $attendances=RehabilitationProgress::all();
        return view('rehabilitation.progress.index',compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rehabilitation.progress.create');
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
            $attendances=new RehabilitationProgress;
            $attendances->attendance_date = $request->attendance_date;
            $attendances->assistance_provided = $request->assistance_provided;
            $attendances->progress = $request->progress;
            $attendances->remarks = $request->remarks;
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
        $attendances=RehabilitationProgress::find($id);
        return view('rehabilitation.progress.edit',compact('attendances'));
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
        //
        if(count(Client::where('file_number','=',$request->file_no)->get()) > 0 ) {
            $attendances = RehabilitationProgress::find($request->id);
            $attendances->attendance_date = $request->attendance_date;
            $attendances->assistance_provided = $request->assistance_provided;
            $attendances->progress = $request->progress;
            $attendances->remarks = $request->remarks;
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
        $attendances=RehabilitationProgress::find($id);
        $attendances->delete();
    }
}
