<?php

namespace App\Http\Controllers;

use App\LiveliHoodsGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LiveHoodGroupController extends Controller
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
        $groups=LiveliHoodsGroup::all();
        return view('livelihood.groups.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('livelihood.groups.create');
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
        $group=new LiveliHoodsGroup;
        $group->group_name=$request->group_name;
        $group->category=$request->category;
        $group->position=$request->position;
        $group->zone=$request->zone;
        $group->activity=$request->activity;
        $group->donor=$request->donor;
        $group->registration_date=$request->registration_date;
        $group->phone=$request->phone;
        $group->nationality=$request->nationality;
        $group->save();
        
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
        $group= LiveliHoodsGroup::find($id);
        return view('livelihood.groups.show',compact('group'));
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
        $group= LiveliHoodsGroup::find($id);
        return view('livelihood.groups.edit',compact('group'));
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
        $group= LiveliHoodsGroup::find($id);
        $group->group_name=$request->group_name;
        $group->category=$request->category;
        $group->position=$request->position;
        $group->zone=$request->zone;
        $group->activity=$request->activity;
        $group->donor=$request->donor;
        $group->registration_date=$request->registration_date;
        $group->phone=$request->phone;
        $group->nationality=$request->nationality;
        $group->save();
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
        $group= LiveliHoodsGroup::find($id);
        $group->delete();
    }
}
