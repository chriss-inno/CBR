<?php

namespace App\Http\Controllers;

use App\Beneficiary;
use App\DumpMaterialSupport;
use App\ItemsCategories;
use App\ItemsDisbursement;
use App\ItemsInventory;
use App\MaterialSupportItem;
use App\MaterialSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;

class ItemsDisbursementController extends Controller
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
        $disbursements =MaterialSupport::all();
        return view('inventory.disbursement.index',compact('disbursements'));
    }
    public function showBeneficiaries()
    {
        //
        $beneficiaries=Beneficiary::all()->take(10);
        return view('inventory.disbursement.beneficiaries',compact('beneficiaries'));
    }
    public function showImport()
    {
        //
        return view('inventory.disbursement.import');
    }


    public function showImportErrors()
    {
        //
        $disbursements=DumpMaterialSupport::all();
        return view('inventory.disbursement.showerrors',compact('disbursements'));
    }
    public function postImport(Request $request)
    {
        //
        try {
            $this->validate($request, [
                'clients_file' => 'required|mimes:xls,xlsx',
                'donor_type' => 'required',
                'distributed_date' => 'required|before:tomorrow',
            ]);

            $file= $request->file('clients_file');
            $destinationPath = public_path() .'/uploads/temp/';
            $filename   = str_replace(' ', '_', $file->getClientOriginalName());

            $file->move($destinationPath, $filename);

            $distribution = new MaterialSupport;
            $distribution->donor_type = $request->donor_type;
            $distribution->distributed_date = $request->distributed_date;
            $distribution->distributed_by = $request->distributed_by;
            $distribution->save();
            if($distribution != null) {
                Excel::load($destinationPath . $filename, function ($reader) use ($distribution) {

                    $results = $reader->get();

                    \DB::table('dump_material_supports')->truncate();

                    $results->each(function ($row) use ($distribution) {

                        $beneficiary = "";
                        if (count(Beneficiary::where('progress_number', '=', str_replace(".", "", $row->progress_number))->where('full_name', '=', ucwords(strtolower($row->full_name)))->get()) > 0) {
                            $beneficiary = Beneficiary::where('progress_number', '=', str_replace(".", "", $row->progress_number))
                                ->where('full_name', '=', ucwords(strtolower($row->full_name)))->get()->first();


                            if (!count(ItemsCategories::where('category_name', '=', ucwords(strtolower($row->category)))->get()) > 0) {
                                $categories = new ItemsCategories;
                                $categories->category_name = ucwords(strtolower($row->category));
                                $categories->save();
                            } else {
                                $categories = ItemsCategories::where('category_name', '=', ucwords(strtolower($row->category)))->get()->first();
                            }

                            if (!count(ItemsInventory::where('item_name', '=', ucwords(strtolower($row->item)))->get())) {
                                $item = new ItemsInventory;
                                $item->item_name = ucwords(strtolower($row->item));
                                $item->category_id = $categories->id;
                                $item->status = "Available";
                                $item->save();
                            } else {
                                $item = ItemsInventory::where('item_name', '=', ucwords(strtolower($row->item)))->get()->first();
                            }
                            if (count(MaterialSupportItem::where('beneficiary_id', '=', $beneficiary->id)->where('item_id', '=', $item->id)->where('distributed_date', '=', date("Y-m-d", strtotime($row->distributed_date)))->get()) > 0) {
                                $disbursement = new DumpMaterialSupport;
                                $disbursement->progress_number = $row->progress_number;
                                $disbursement->donor_type = $row->donor_type;
                                $disbursement->item = $row->item;
                                $disbursement->quantity = $row->quantity;
                                $disbursement->distributed_date = date("Y-m-d", strtotime($row->distributed_date));
                                $disbursement->error_descriptions = "Beneficiary has received the same item in the date described";
                                $disbursement->save();
                                $this->error_found = "Beneficiary already received the items";
                            } else {

                                $material_items = new MaterialSupportItem;
                                $material_items->support_id = $distribution->id;
                                $material_items->beneficiary_id = $beneficiary->id;
                                $material_items->item_id = $item->id;
                                $material_items->quantity = $row->quantity;
                                $material_items->distributed_date = date("Y-m-d", strtotime($row->distributed_date));
                                $material_items->save();
                            }
                        } else {
                            $disbursement = new DumpMaterialSupport;
                            $disbursement->progress_number = $row->progress_number;
                            $disbursement->donor_type = $row->donor_type;
                            $disbursement->item = $row->item;
                            $disbursement->quantity = $row->quantity;
                            $disbursement->distributed_date = date("Y-m-d", strtotime($row->distributed_date));
                            $disbursement->error_descriptions = "Client Not registered in beneficiary list";
                            $disbursement->save();
                            $this->error_found = "Beneficiary already received the items";
                        }
                    });

                });
            }

            File::delete($destinationPath . $filename); //Delete after upload
            if($this->error_found != "")
            {
                return  redirect('inventory/disbursement/import/errors');
            }
            else
            {
                return  redirect('inventory/disbursement');
            }

       } catch (\Exception $e) {


             return  redirect()->back()->with('error',$e->getMessage());
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
        return view('inventory.disbursement.create');
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
        try {
            $validator = Validator::make($request->all(), [
                'beneficiary_id' => 'required',
                'donor_type' => 'required',
                'distributed_date' => 'required|before:tomorrow',
                'quantity' => 'required',
                'item' => 'required'

            ]);
            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 400); // 400 being the HTTP code for an invalid request.
            } else {
                if(count(Beneficiary::find($request->beneficiary_id)) > 0)
                {
                    $distribution = new MaterialSupport;
                    $distribution->donor_type = $request->donor_type;
                    $distribution->distributed_date = $request->distributed_date;
                    $distribution->distributed_by = $request->distributed_by;
                    $distribution->save();

                    if(count($request->item) >0 && $request->item != null)
                    {
                        $qcount=0;
                        $error="";
                        foreach ($request->item as $items)
                        {
                            if($items != "" && $items != null)
                            {
                                if(!count(MaterialSupportItem::where('beneficiary_id','=',$request->beneficiary_id)->where('item_id','=',$items)->where('distributed_date','=',date("Y-m-d",strtotime($request->distributed_date)))->get()) > 0)
                                {
                                    $material_items = new MaterialSupportItem;
                                    $material_items->support_id = $distribution->id;
                                    $material_items->beneficiary_id = $request->beneficiary_id;
                                    $material_items->item_id = $items;
                                    $material_items->quantity = $request->quantity[$qcount];
                                    $material_items->distributed_date = date("Y-m-d", strtotime($request->distributed_date));
                                    $material_items->save();
                                }
                                else
                                {
                                    $item=ItemsInventory::find($items);
                                    $error .= "Beneficiary has already received Item [".$item->item_name."] </br>" ;
                                }

                                $qcount++;
                            }
                            else
                            {
                                $error ="Save failed no item entered";
                            }

                        }
                        if($error != "")
                        {
                            return Response::json(array(
                                'success' => false,
                                'errors' => 1,
                                'message' => $error
                            ), 400); // 400 being the HTTP code for an invalid request.
                            }
                        else{
                            return Response::json(array(
                                'success' => true,
                                'errors' => 0,
                                'message' => "Saved successfully"
                            ), 200); // 400 being the HTTP code for an invalid request.
                           }

                    }
                    else
                    {
                        return Response::json(array(
                            'success' => false,
                            'errors' => 1,
                            'message' => "Save failed no item entered"
                        ), 400); // 400 being the HTTP code for an invalid request.
                    }

                }
                else
                {
                    return Response::json(array(
                        'success' => false,
                        'errors' => 1,
                        'message' => "Beneficiary not found in beneficiaries list"
                    ), 400); // 400 being the HTTP code for an invalid request.
                }
            }
        }
        catch (\Exception $ex)
        {
            return Response::json(array(
                'success' => false,
                'errors' => 1,
                'message' => $ex->getMessage()
            ), 400); // 400 being the HTTP code for an invalid request.
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
        $disbursement=MaterialSupport::findorfail($id);
        return view('inventory.disbursement.pdf',compact('disbursement'));
    }
    public function downloadPdf($id)
    {
        //
        $disbursement=MaterialSupport::find($id);
        $pdf = \PDF::loadView('inventory.disbursement.pdf',compact('disbursement'))
            ->setOption('footer-right', 'Page [page]')
            ->setOption('page-offset', 0);
        return $pdf->download('client_material_support.pdf');
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
        $disbursement=MaterialSupport::find($id);
        return view('inventory.disbursement.edit',compact('disbursement'));
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
        $disbursement=MaterialSupport::find($request->id);
        $disbursement->donor_type=$request->donor_type;
        $disbursement->item_id=$request->item;
        $disbursement->quantity=$request->quantity;
        $disbursement->distributed_date=$request->distributed_date;
        $disbursement->save();
        return "<span class='text-success'><i class='fa fa-info'></i> Saved successfully</span>";
        
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
        $disbursement=MaterialSupport::find($id);
        if(is_object($disbursement->items) && count($disbursement->items) >0)
            foreach($disbursement->items as $itm)
            {
                $itm->delete();
            }
        $disbursement->delete();
    }
}
