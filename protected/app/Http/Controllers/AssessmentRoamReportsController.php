<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AssessmentRoamReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('reports.assessmentroam.index');
    }
    public function showReportView()
    {
        //
        return view('reports.assessmentroam.generate');
    }

    public function generateReportView(Request $request)
    {
        //
        $assessment_type=$request->assessment_type;
        $report_type=$request->report_type;
        $date_from=$request->date_from;
        $date_to=$request->date_to;
        $sex=$request->sex;

        $startDate= date("Y-m-d",strtotime($date_from));
        $endDate=date("Y-m-d",strtotime($date_to));

        $clients="";
        if($assessment_type != "" && $report_type != ""  && $sex !="")
        {
              if($assessment_type =="all" && $sex =="all")
              {
                  $clients=Client::whereBetween('date_registered',array($startDate, $endDate))->get();
              }
              else if($assessment_type =="all")
              {
                  $clients=Client::whereBetween('date_registered',array($startDate, $endDate))->where('sex','=',$sex)->get();
              }
              else if($sex =="all")
              {
                  $clients=Client::whereBetween('date_registered',array($startDate, $endDate))->where('sex','=',$sex)->get();
              }
              else
              {
                  $clients=Client::all();
              }
        }
        else
        {
            echo "No data";
        }

           if( $report_type =="aggregate")
           {
               Excel::create("Assessment_report", function ($excel) use ($clients) {
                   $excel->sheet('sheet', function ($sheet) use ($clients) {
                       $sheet->loadView('reports.assessmentroam.aggregate')->with('clients', $clients);
                       $sheet->setWidth(array(
                           'A'     =>  10,
                           'B'     =>  25,
                           'C'     =>  20,
                           'D'     =>  25,
                           'E'     =>  25,
                           'F'     =>  20,
                           'G'     =>  20,
                           'H'     =>  25,
                           'I'     =>  20,
                           'J'     =>  25,
                           'K'     =>  50,
                           'L'     =>  50,
                           'M'     =>  20,
                           'N'     =>  50,
                           'O'     =>  25,
                           'P'     =>  25,
                           'Q'     =>  25,
                           'R'     =>  25,
                           'S'     =>  25,
                           'T'     =>  25
                       ));
                       $sheet->getDefaultStyle()->getAlignment()->setWrapText(true);
                       // $sheet->setAutoFilter('E2:F2');
                   });
               })->download('xlsx');
           }
           else
           {
               return view('reports.assessmentroam.detailed',compact('clients'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
