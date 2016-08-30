<?php

namespace App\Http\Controllers;

use App\LiveliHoodsClient;
use App\LiveliHoodsGroup;
use App\LiveliHoodsMaterial;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LiveliHoodsMaterialController extends Controller
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
        $materials=LiveliHoodsMaterial::all();
        return view('livelihood.index',compact('materials'));
    }
    public function showImport()
    {
        //
        return view('livelihood.import');
    }

    public function getGroups()
    {
        //
        return view('livelihood.groups');
    }
    public function getBeneficiaries()
    {
        //
        return view('livelihood.beneficiaries');
    }
    public function getBeneficiariesJSonData()
    {
        //
        $clients = LiveliHoodsClient::all();
        $iTotalRecords =count(LiveliHoodsClient::all());
        $sEcho = intval(10);

        $records = array();
        $records["data"] = array();


        $count=1;
        foreach($clients as $client) {

            $records["data"][] = array(
                $count++,
                $client->progress_number,
                $client->full_name,
                $client->category,
                $client->position,
                $client->group,
                $client->nationality,
                '<span id="'.$client->id.'"> <a href="#" class="addRecord " title="View details"> <i class="fa fa-file green "></i> Open Form </a></span>',
            );
        }


        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        echo json_encode($records);
    }
    public function getJSonData()
    {
        //
        $groups=LiveliHoodsGroup::all();
        $iTotalRecords =count(LiveliHoodsGroup::all());
        $sEcho = intval(10);

        $records = array();
        $records["data"] = array();


        $count=1;
        foreach($groups as $group) {

            $records["data"][] = array(
                $count++,
                $group->group_name,
                $group->category,
                $group->zone,
                $group->activity,
                $group->donor,
                $group->phone,
                $group->nationality,
                '<span id="'.$group->id.'"> <a href="#" class="addRecord " title="View details"> <i class="fa fa-file green "></i> Open Form </a></span>',
            );
        }


        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        echo json_encode($records);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$gtype)
    {
        //
        if($gtype =="Client")
        {
            $client=LiveliHoodsClient::find($id);
            return view('livelihood.create',compact('client','gtype'));
        }
        else
        {
            $group=LiveliHoodsGroup::find($id);
            return view('livelihood.create',compact('group','gtype'));
        }


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


        if(count($request->item) >0 && $request->item != null)
        {
            $qcount=0;
            $error="";
            foreach ($request->item as $items)
            {
                if($items != "" && $items != null)
                {
                    if(!count(LiveliHoodsMaterial::where('supported_name','=',$request->progress_number)->where('item_support','=',$items)->where('support_date','=',date("Y-m-d",strtotime($request->support_date)))->get()) > 0)
                    {
                        $support= new LiveliHoodsMaterial;
                        $support->supported_name=$request->progress_number;
                        $support->client_id=$request->client_id;
                        $support->group_id=$request->client_id;
                        $support->support_date=$request->support_date;
                        $support->venue=$request->venue;
                        $support->donor=$request->donor;
                        $support->category_type=$request->category_type;
                        $support->category=$request->category[$qcount];
                        $support->quantity=$request->quantity[$qcount];
                        $support->item_id=$items;
                        $support->save();
                    }
                    else
                    {
                        $error .= "Beneficiary [".$request->progress_number."] Has already received Item [".$items."] for date [ $request->distributed_date] <br/>" ;
                    }

                    $qcount++;
                }
                else
                {
                    $error ="Save failed no item entered";
                }

            }
            if($error != "")
            {return "<span class='text-danger'><i class='fa fa-info'></i> $error</span>";}
            else{return "<span class='text-success'><i class='fa fa-info'></i> Saved successfully</span>";}

        }
        else
        {
            return "<span class='text-danger'><i class='fa fa-info'></i> Save failed no item entered</span>";
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
        $support=LiveliHoodsMaterial::find($id);
        return view('livelihood.show',compact('support'));
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
        $support=LiveliHoodsMaterial::find($id);
        return view('livelihood.edit',compact('support'));
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
        $support= LiveliHoodsMaterial::find($request->id);
        $support->supported_name=$request->progress_number;
        $support->client_id=$request->client_id;
        $support->group_id=$request->client_id;
        $support->support_date=$request->support_date;
        $support->venue=$request->venue;
        $support->donor=$request->donor;
        $support->category_type=$request->category_type;
        $support->category=$request->category;
        $support->quantity=$request->quantity;
        $support->item_id=$request->item;
        $support->save();
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
        $support= LiveliHoodsMaterial::find($id);
        $support->delete();
    }
}
