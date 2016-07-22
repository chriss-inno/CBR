<?php

namespace App\Http\Controllers;

use App\OrthopedicServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportsOrthopedicServicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('reports.orthopedicservices.index');
    }
    public function showReportView()
    {
        //
        return view('reports.orthopedicservices.generate');
    }
    public function exportClients()
    {
        //
        $clients=Client::all();

        Excel::create("clients_Details", function ($excel) use ($clients) {
            $excel->sheet('sheet', function ($sheet) use ($clients) {
                $sheet->loadView('reports.orthopedicservices.clients',compact('clients'));
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
                    'V'     =>  25,
                    'W'     =>  25

                ));
                $sheet->getDefaultStyle()->getAlignment()->setWrapText(true);
                // $sheet->setAutoFilter('E2:F2');
                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#CCCCCC');

                });
                $sheet->row(2, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#CCCCCC');

                });
                $sheet->row(3, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#CCCCCC');

                });
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Times New Roman',
                        'size'      =>  12

                    )
                ));
                $sheet->setStyle([
                    'borders' => [
                        'allborders' => [
                            'color' => [
                                'rgb' => 'AAAAAA'
                            ]
                        ]
                    ]
                ]);
            });
        })->download('xlsx');

    }

    public function generateReportView(Request $request)
    {
        //
        $assessment_type=$request->assessment_type;
        $report_type=$request->report_type;
        $date_from=$request->date_from;
        $date_to=$request->date_to;
        $sex=$request->sex;

        $startDate= $date_from;
        $endDate=$date_to;
        $range = [$startDate, $endDate];
        if($startDate != "" && $endDate != "" )
        {
            if($report_type ==1 ) {
                $attendances=OrthopedicServices::whereBetween('attendance_date', $range)->get();

                Excel::create("orthopedic_clients_report", function ($excel) use ($attendances,$startDate,$endDate) {
                    $excel->sheet('sheet', function ($sheet) use ($attendances,$startDate,$endDate) {
                        $sheet->loadView('reports.orthopedicservices.detailed',compact('attendances','startDate','endDate'));
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
                $clients=OrthopedicServices::all();
                return view('reports.orthopedicservices.aggregate',compact('clients','startDate','endDate'));
            }


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
