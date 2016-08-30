<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientReferral;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClientReferralController extends Controller
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
        $referrals= ClientReferral::all();
        return view('clients.referral.index',compact('referrals'));
    }
    
    public function referralRequest()
    {
        $clients=Client::all();
        return view('clients.referral.request',compact('clients')); 
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
        return view('clients.referral.create',compact('client'));
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
        if(!count(ClientReferral::where('client_id','=',$request->id)->where('referred_by_date','=',$request->referral_date)->where('referral_to','=',$request->referral_to)->get()) >0) {
            $referral = new ClientReferral;
            $referral->client_id = $request->client_id;
            $referral->referral_to = $request->referral_to;
            $referral->referral_date = $request->referral_date;
            $referral->history = $request->history;
            $referral->examination = $request->examination;
            $referral->referral_reason = $request->referral_reason;
            $referral->referred_by_name = $request->referred_by_name;
            $referral->referred_by_title = $request->referred_by_title;
            $referral->referred_by_date = $request->referred_by_date;
            $referral->findings = $request->findings;
            $referral->findings_name = $request->findings_name;
            $referral->findings_title = $request->findings_title;
            $referral->save();

            return redirect('referrals');
        }
        else
        {
            return redirect()->back()->with('error','Client was already referred for this date');
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
        $referral= ClientReferral::find($id);
        return view('clients.referral.show',compact('referral'));
    }
    public function download($id)
    {
        //
        $referral= ClientReferral::find($id);
        $pdf = \PDF::loadView('clients.referral.show', compact('referral'))
            ->setOption('footer-right', 'Page [page]')
            ->setOption('page-offset', 0);
        return $pdf->download('clientReferralForm.pdf');
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
        $referral= ClientReferral::find($id);
        return view('clients.referral.edit',compact('referral'));
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
        $referral= ClientReferral::find($request->id);
        $referral->client_id=$request->client_id;
        $referral->referral_to=$request->referral_to;
        $referral->referral_date=$request->referral_date;
        $referral->history=$request->history;
        $referral->examination=$request->examination;
        $referral->referral_reason=$request->referral_reason;
        $referral->referred_by_name=$request->referred_by_name;
        $referral->referred_by_title=$request->referred_by_title;
        $referral->referred_by_date=$request->referred_by_date;
        $referral->findings=$request->findings;
        $referral->findings_name=$request->findings_name;
        $referral->findings_title=$request->findings_title;
        $referral->save();

        return  redirect('referrals');
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
        $referral= ClientReferral::find($id);
        $referral->delete();
    }
    
    public function GetClientList(Request $request)
    {
       $clients=Client::where('first_name','like',$request->searchKeyword)->get();
        return view('clients.referral.list',compact('clients'));
    }
}
