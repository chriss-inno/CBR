<?php

namespace App\Http\Controllers;

use App\ItemsDisbursement;
use Illuminate\Http\Request;

use App\Http\Requests;

class ItemsDisbursementController extends Controller
{
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
        $disbursement=new ItemsDisbursement;
        $disbursement->client_id=$request->client_id;
        $disbursement->item_id=$request->item_id;
        $disbursement->quantity=$request->quantity;
        $disbursement->disbursements_date=$request->disbursements_date;
        $disbursement->disbursements_by=$request->disbursements_by;
        $disbursement->save();
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
