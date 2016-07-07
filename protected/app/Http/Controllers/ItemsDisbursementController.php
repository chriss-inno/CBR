<?php

namespace App\Http\Controllers;

use App\ItemsDisbursement;
use Illuminate\Http\Request;

use App\Http\Requests;

class ItemsDisbursementController extends Controller
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
        $disbursements=ItemsDisbursement::all();
        return view('inventory.disbursement.index',compact('disbursements'));
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
        if(count($request->item_id) >0 && $request->item_id != null)
        {
            $qcount=0;
            foreach ($request->item_id as $items)
            {
                $disbursement=new ItemsDisbursement;
                $disbursement->client_id=$request->client_id;
                $disbursement->item_id=$items;
                $disbursement->quantity=$request->quantity[$qcount];
                $disbursement->disbursements_date=$request->disbursements_date;
                $disbursement->disbursements_by=$request->disbursements_by;
                $disbursement->save();
                $qcount++;
            }

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
        $disbursement=ItemsDisbursement::find($id);
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
        $disbursement=ItemsDisbursement::find($request->id);
        $disbursement->client_id=$request->client_id;
        $disbursement->item_id=$request->item_id;
        $disbursement->quantity=$request->quantity;
        $disbursement->disbursements_date=$request->disbursements_date;
        $disbursement->disbursements_by=$request->disbursements_by;
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
        $disbursement=ItemsDisbursement::find($id);
        $disbursement->delete();
    }
}
