<?php

namespace App\Http\Controllers;

use App\MaterialSupport;
use App\MaterialSupportItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class InventoryReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('reports.inventory.index');
    }
    public function showReportView()
    {
        //
        return view('reports.inventory.generate');
    }

    public function generateReportView(Request $request)
    {
        //
        $startDate=$request->date_from;
        $endDate=$request->date_to;
        $range = [$startDate, $endDate];

        if($startDate != "" && $endDate != "" ) {
            if ($request->report_type == "all") {
                $items = MaterialSupport::whereBetween('distributed_date', $range)->get();
                    Excel::create("material_support_report", function ($excel) use ($items,$startDate,$endDate) {
                        $excel->sheet('sheet', function ($sheet) use ($items,$startDate,$endDate) {
                            $sheet->loadView('reports.inventory.detailed',compact('items','startDate','endDate'));
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

            } else {
                $items = MaterialSupport::whereBetween('distributed_date', $range)->where('item_id','=',$request->report_type)->get();
                Excel::create("material_support_report", function ($excel) use ($items,$startDate,$endDate) {
                    $excel->sheet('sheet', function ($sheet) use ($items,$startDate,$endDate) {
                        $sheet->loadView('reports.inventory.detailed',compact('items','startDate','endDate'));
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
        if ($request->full_name != ""){

            $query->where('full_name','LIKE',"%{$request->full_name}%");
        }
        if ($request->sex != "All" && $request->sex !=""){

            $query->where('sex','=',$request->sex);
        }
        if ($request->nationality != "All" && $request->nationality !=""){

            $query->where('nationality','=',$request->nationality);
        }
        if ($request->diagnosis != ""){

            $query->where('diagnosis','LIKE',"%{$request->diagnosis}%");
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
                    $query->leftjoin('material_support_items', 'beneficiaries.id', '=', 'material_support_items.beneficiary_id')
                        ->where('material_support_items.beneficiary_id','=', null)
                        ->select('beneficiaries.*');

                    $beneficiaries = $query->get();

                    if ($request->export_type == 1){
                        return view('reports.inventory.html.distributionlist', compact('beneficiaries'));
                    }
                    else {
                        \Excel::create("list_of_beneficiaries", function ($excel) use ($beneficiaries) {
                            $excel->sheet('sheet', function ($sheet) use ($beneficiaries) {
                                $sheet->loadView('reports.inventory.excel.distributionlist', compact('beneficiaries'));
                                // $sheet->setAutoFilter('E2:F2');
                            });
                        })->download('xlsx');
                    }

                break;
            case 2:
                if ($request->item != "All" && $request->item !="") {


                    $query->whereNotIn('id',function ($query) use ($request){

                        $query->from('material_support_items')
                            ->select('beneficiary_id')
                            ->where('item_id', $request->item);
                    });

                    $beneficiaries = $query->get();

                    if ($request->export_type == 1) {
                        return view('reports.inventory.html.distributionlist', compact('beneficiaries'));
                    } else {
                        \Excel::create("list_of_beneficiaries", function ($excel) use ($beneficiaries) {
                            $excel->sheet('sheet', function ($sheet) use ($beneficiaries) {
                                $sheet->loadView('reports.inventory.excel.distributionlist', compact('beneficiaries'));
                                // $sheet->setAutoFilter('E2:F2');
                            });
                        })->download('xlsx');
                    }
                }
                else
                {
                    return redirect()->back()->with("message","Please select Item");
                }

                break;
            case 3:
                if ( $request->item !="") {
                    $query->join('material_support_items', 'beneficiaries.id', '=', 'material_support_items.beneficiary_id');

                    if($start_time != "" && $end_time !=""){
                        $range = [$start_time, $end_time];
                        $query->whereBetween('distributed_date', $range);
                    }
                    elseif($start_time != "" && $end_time ==""){
                        $query->where('distributed_date', $start_time);
                    }
                    elseif($start_time == "" && $end_time !=""){
                        $query->where('distributed_date', $end_time);
                    }
                    if ($request->item != "All") {
                        $query->where('item_id', $request->item);
                    }
                    $query->select('material_support_items.*');

                    $items = $query->get();

                    if ($request->export_type == 1) {
                        return view('reports.inventory.html.beneficiaries', compact('items'));
                    } else {
                        \Excel::create("list_of_beneficiaries", function ($excel) use ($items) {
                            $excel->sheet('sheet', function ($sheet) use ($items) {
                                $sheet->loadView('reports.inventory.excel.beneficiaries', compact('items'));
                                // $sheet->setAutoFilter('E2:F2');
                            });
                        })->download('xlsx');
                    }
                }
                else
                {
                    return redirect()->back()->with("message","Please select Item");
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
