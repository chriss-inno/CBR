<?php

namespace App\Http\Controllers;

use App\SocialNeed;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportSocialNeedController extends Controller
{
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
        return view('reports.socialneeds.index');
    }
    public function showReportView()
    {
        //
        return view('reports.socialneeds.generate');
    }

    public function generateReportView(Request $request)
    {
        //
        $startDate=$request->date_from;
        $endDate=$request->date_to;

        $range = [date("Y-m-d H:i",strtotime($startDate)), date("Y-m-d H:i",strtotime($endDate))];
        if($startDate != "" && $endDate != "" )
        {
                $needs=SocialNeed::whereBetween('date_attended', $range)->get();

                Excel::create("social_needs_report", function ($excel) use ($needs,$startDate,$endDate) {
                    $excel->sheet('sheet', function ($sheet) use ($needs,$startDate,$endDate) {
                        $sheet->loadView('reports.socialneeds.detailed',compact('needs','startDate','endDate'));
                        $sheet->setWidth(array(
                            'A'     =>  25,
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
                            'T'     =>  25,
                            'U'     =>  25,
                            'V'     =>  25

                        ));
                        $sheet->getDefaultStyle()->getAlignment()->setWrapText(true);
                        // $sheet->setAutoFilter('E2:F2');
                    });
                })->download('xlsx');


        }
        else
        {
            return redirect()->back()->with('error','Please select date range');
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
