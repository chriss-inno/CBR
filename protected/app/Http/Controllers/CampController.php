<?php

namespace App\Http\Controllers;

use App\Camp;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CampController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['fooAction', 'barAction']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $camps=Camp::all();
        return view('general.camps.index',compact('camps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('general.camps.create');
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
        $camp=new Camp;
        $camp->camp_name=$request->camp_name;
        $camp->reg_no=$request->reg_no;
        $camp->description=$request->description;
        $camp->address=$request->address;
        $camp->tel=$request->tel;
        $camp->zone=$request->zone;
        $camp->region_id=$request->region_id;
        $camp->district_id=$request->district_id;
        $camp->status=$request->status;
        $camp->input_by=Auth::user()->user_name;
        $camp->save();


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
        $camp=Camp::find($id);
        return view('general.camps.show',compact('camp'));
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
        $camp=Camp::find($id);
        return view('general.camps.edit',compact('camp'));
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
        $camp=Camp::find($id);
        $camp->camp_name=$request->camp_name;
        $camp->reg_no=$request->reg_no;
        $camp->description=$request->description;
        $camp->address=$request->address;
        $camp->tel=$request->tel;
        $camp->zone=$request->zone;
        $camp->region_id=$request->region_id;
        $camp->district_id=$request->district_id;
        $camp->status=$request->status;
        $camp->input_by=Auth::user()->user_name;
        $camp->save();
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
        $camp=Camp::find($id);
        $camp->delete();
    }
    public function getCentresById($id)
    {
        $camp=Camp::find($id);
        echo "<option value=''>----</option>";
        if($camp->centres != null)
        {
            foreach ($camp->centres as $cen)
            {
                echo "<option value='".$cen->id."'>".$cen->centre_name."</option>";
            }
        }

    }

}
