<?php

namespace App\Http\Controllers;

use App\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BeneficiariesReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('reports.beneficiaries.index');
    }

    public function showReportView()
    {
        //
        return view('reports.beneficiaries.generate');
    }
    public function exportClients()
    {
        //
        $clients=Client::all();

        Excel::create("clients_Details", function ($excel) use ($clients) {
            $excel->sheet('sheet', function ($sheet) use ($clients) {
                $sheet->loadView('reports.beneficiaries.clients',compact('clients'));
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
        $date_from=$request->date_from;
        $date_to=$request->date_to;
        $sex=$request->sex;

        $startDate= $date_from;
        $endDate=$date_to;
        $range = [$startDate, $endDate];
        if($startDate != "" && $endDate != "" )
        {
            if($request->sex !="" &&  $request->category !="") {
                $beneficiaries=Beneficiary::whereBetween('date_registration', $range)->where('sex','=',$request->sex)->where('category','=',$request->category)->get();

                Excel::create("Beneficiary_report", function ($excel) use ($beneficiaries,$startDate,$endDate) {
                    $excel->sheet('sheet', function ($sheet) use ($beneficiaries,$startDate,$endDate) {
                        $sheet->loadView('reports.beneficiaries.detailed',compact('beneficiaries','startDate','endDate'));
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
            else if($request->sex =="" &&  $request->category !="") {
                $beneficiaries=Beneficiary::whereBetween('date_registration', $range)->where('category','=',$request->category)->get();

                Excel::create("Beneficiary_report", function ($excel) use ($beneficiaries,$startDate,$endDate) {
                    $excel->sheet('sheet', function ($sheet) use ($beneficiaries,$startDate,$endDate) {
                        $sheet->loadView('reports.beneficiaries.detailed',compact('beneficiaries','startDate','endDate'));
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
            else  if($request->sex !="" &&  $request->category =="") {
                $beneficiaries=Beneficiary::whereBetween('date_registration', $range)->where('sex','=',$request->sex)->get();

                Excel::create("Beneficiary_report", function ($excel) use ($beneficiaries,$startDate,$endDate) {
                    $excel->sheet('sheet', function ($sheet) use ($beneficiaries,$startDate,$endDate) {
                        $sheet->loadView('reports.beneficiaries.detailed',compact('beneficiaries','startDate','endDate'));
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
            else {
                $beneficiaries=Beneficiary::whereBetween('date_registration', $range)->get();

                Excel::create("Beneficiary_report", function ($excel) use ($beneficiaries,$startDate,$endDate) {
                    $excel->sheet('sheet', function ($sheet) use ($beneficiaries,$startDate,$endDate) {
                        $sheet->loadView('reports.beneficiaries.detailed',compact('beneficiaries','startDate','endDate'));
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

        $query=\DB::table('beneficiaries');
        $end_time ="";
        $start_time="";
        if($request->start_date != ""){
            $start_time = date("Y-m-d", strtotime($request->start_date));
        }
        if($request->end_date != ""){
            $end_time = date("Y-m-d", strtotime($request->end_date));
        }

        if ($request->progress_number != ""){

            $query->where('progress_number','LIKE',"%{$request->progress_number}%");
        }
        if ($request->diagnosis != ""){

            $query->where('diagnosis','LIKE',"%{$request->diagnosis}%");
        }
        if ($request->full_name != ""){

            $query->where('full_name','LIKE',"%{$request->full_name}%");
        }
        if ($request->sex != "All" && $request->sex !=""){

            $query->where('sex','=',$request->sex);
        }
        if ($request->nationality != "All" && $request->nationality !=""){

            $query->where('nationality','=',$request->nationality);
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




        //Export now
        switch ($request->report_type)
        {
            case 1:

                $beneficiaries = $query->get();

                if ($request->export_type == 1){
                    return view('reports.beneficiaries.html.lists', compact('beneficiaries'));
                }
                else {
                    \Excel::create("list_of_beneficiaries", function ($excel) use ($beneficiaries) {
                        $excel->sheet('sheet', function ($sheet) use ($beneficiaries) {
                            $sheet->loadView('reports.beneficiaries.excel.lists', compact('beneficiaries'));
                            // $sheet->setAutoFilter('E2:F2');
                        });
                    })->download('xlsx');
                }

                break;

            default:
                return redirect()->back();

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
