<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientDisability;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClientDisabilityController extends Controller
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
        $disabilities=ClientDisability::all();
        return view('general.disabilities.clients.index',compact('disabilities'));
    }
    public function showRegister($id)
    {
        //
        $client=Client::find($id);
        return view('general.disabilities.clients.register',compact('client'));
    }

    public function getClients()
    {
        //
        $clients=Client::where('status','=','Disabled')->orderBy('full_name','ASC')->get();
        $iTotalRecords =count(Client::all());
        $sEcho = intval(10);

        $records = array();
        $records["data"] = array();


        $count=1;
        foreach($clients as $client) {
            $cent="";
            if($client->centre != null && is_object($client->centre))
            {
                $cent= $client->centre->centre_name;
            }

            $records["data"][] = array(
                $count++,
                $client->file_number,
                $client->full_name,
                $client->sex,
                $client->age,
                $client->nationality,
                $cent,
                $client->address,
                '<span id="'.$client->id.'">  <a href="#"  class="addRecord btn" > <i class="fa fa-file green "> Register </i></a></span>',
            );
        }


        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        echo json_encode($records);
    }

    public function searchClient()
    {
        //
        $clients=Client::all();
        return view('general.disabilities.clients.clients',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $client=Client::find($id);
        return view('general.disabilities.clients.create',compact('client'));
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
        $disability=new ClientDisability;
        $disability->category_name=$request->category_name;
        $disability->disability_diagnosis=$request->disability_diagnosis;
        $disability->remarks=$request->remarks;
        $disability->client_id=$request->client_id;
        $disability->save();
       return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
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
        $disability=ClientDisability::find($id);
        return view('general.disabilities.clients.show',compact('disability'));
    }
    public function showPrint($id)
    {
        //
        $disability=ClientDisability::find($id);
        return view('general.disabilities.clients.pdf',compact('disability'));
    }
    public function getPdf($id)
    {
        //
        $disability=ClientDisability::find($id);
        $fo = 'This form is applicable for identification of functional needs of PWDs/PSNs according to the components <br/>of the Global CBR matrix ( Health , Education ,  Livelihood , social and Empowerment ).';
        $pdf = \PDF::loadView('general.disabilities.clients.pdf', compact('disability'))
            ->setOption('footer-right', 'Page [page]')
            ->setOption('page-offset', 0);
        return $pdf->download('client_disability_form.pdf');
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
        $clds= ClientDisability::find($id);
        return view('general.disabilities.clients.edit',compact('clds'));
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
        $disability=ClientDisability::find($request->id);
        $disability->category_name=$request->category_name;
        $disability->disability_diagnosis=$request->disability_diagnosis;
        $disability->remarks=$request->remarks;
        $disability->save();
        return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
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
        $disability=ClientDisability::find($id);
        $disability->delete();
    }
}
