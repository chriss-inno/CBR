<?php

namespace App\Http\Controllers;

use App\Beneficiary;
use App\DumpMaterialSupport;
use App\ItemsDisbursement;
use App\MateriaSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        $disbursements =MateriaSupport::all();
        return view('inventory.disbursement.index',compact('disbursements'));
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
            ]);

            $file= $request->file('clients_file');
            $destinationPath = public_path() .'/uploads/temp/';
            $filename   = str_replace(' ', '_', $file->getClientOriginalName());

            $file->move($destinationPath, $filename);

            Excel::load($destinationPath . $filename, function ($reader) {

                $results = $reader->get();

                \DB::table('dump_material_supports')->truncate();
                $results->each(function($row) {



                    if(count(Beneficiary::where('progress_number','=',$row->progress_number)->get()) > 0 )
                    {
                        if(count(MateriaSupport::where('progress_number','=',$row->progress_number)->where('item','=',$row->item)->where('quantity','=',$row->quantity)->where('distributed_date','=',date("Y-m-d",strtotime($row->distributed_date)))->get()) > 0)
                        {
                            $disbursement=new DumpMaterialSupport;
                            $disbursement->progress_number=$row->progress_number;
                            $disbursement->donor_type=$row->donor_type;
                            $disbursement->address=$row->address;
                            $disbursement->item=$row->item;
                            $disbursement->quantity=$row->quantity;
                            $disbursement->distributed_date=date("Y-m-d",strtotime($row->distributed_date));
                            $disbursement->error_descriptions="Item details already exist";
                            $disbursement->save();
                            $this->error_found="Client already registered for service in the same date";
                        }
                        else
                        {
                            $disbursement=new MateriaSupport;
                            $disbursement->progress_number=$row->progress_number;
                            $disbursement->donor_type=$row->donor_type;
                            $disbursement->address=$row->address;
                            $disbursement->item=$row->item;
                            $disbursement->quantity=$row->quantity;
                            $disbursement->distributed_date=date("Y-m-d",strtotime($row->distributed_date));

                            $disbursement->save();
                        }

                    }
                    elseif ($row->progress_number =="" )
                    {
                        $disbursement=new DumpMaterialSupport;
                        $disbursement->progress_number=$row->progress_number;
                        $disbursement->donor_type=$row->donor_type;
                        $disbursement->address=$row->address;
                        $disbursement->item=$row->item;
                        $disbursement->quantity=$row->quantity;
                        $disbursement->distributed_date=date("Y-m-d",strtotime($row->distributed_date));
                        $disbursement->error_descriptions="Beneficiary progress number can not be empty";
                        $disbursement->save();
                        $this->error_found="Client already registered for service in the same date";
                    }
                    else
                    {

                        $disbursement=new DumpMaterialSupport;
                        $disbursement->progress_number=$row->progress_number;
                        $disbursement->donor_type=$row->donor_type;
                        $disbursement->address=$row->address;
                        $disbursement->item=$row->item;
                        $disbursement->quantity=$row->quantity;
                        $disbursement->distributed_date=date("Y-m-d",strtotime($row->distributed_date));
                        $disbursement->error_descriptions="progress_number not found in Beneficiary list ";
                        $disbursement->save();
                        $this->error_found="progress_number not found in Beneficiary list";
                    }
                });

            });

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

           // echo $e->getMessage();
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
        if(count(Beneficiary::where('progress_number','=',$request->progress_number)->get()) > 0)
        {
            if(count($request->item) >0 && $request->item != null)
            {
                $qcount=0;
                foreach ($request->item as $items)
                {
                    if($items != "" && $items != null)
                    {
                        $disbursement=new MateriaSupport;
                        $disbursement->progress_number=$request->progress_number;
                        $disbursement->donor_type=$request->donor_type;
                        $disbursement->address=$request->address;
                        $disbursement->item=$items;
                        $disbursement->quantity=$request->quantity[$qcount];
                        $disbursement->distributed_date=$request->distributed_date;

                        $disbursement->save();
                        $qcount++;
                    }

                }
                return "<span class='text-success'><i class='fa fa-info'></i> Saved successfully</span>";
            }
            else
            {
                return "<span class='text-danger'><i class='fa fa-info'></i> Save failed no item entered</span>";
            }

        }
        else
        {
            return "<span class='text-danger'><i class='fa fa-info'></i> Progress number not found in beneficiaries list</span>";
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
        $disbursement=MateriaSupport::find($id);
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
        $disbursement=MateriaSupport::find($request->id);
        $disbursement->progress_number=$request->progress_number;
        $disbursement->donor_type=$request->donor_type;
        $disbursement->address=$request->address;
        $disbursement->item=$request->item;
        $disbursement->quantity=$request->quantity;
        $disbursement->distributed_date=$request->distributed_date;
        $disbursement->save();
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
        $disbursement=MateriaSupport::find($id);
        $disbursement->delete();
    }
}
