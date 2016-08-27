<?php

namespace App\Http\Controllers;

use App\Beneficiary;
use App\DumpSocialNeed;
use App\SocialNeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;

class SocialNeedController extends Controller
{
    protected $error_found;
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
        $needs=SocialNeed::all();
        return view('socialneeds.index',compact('needs'));
    }
    public function searchBeneficiaries()
    {
        //
        $beneficiaries=Beneficiary::all()->take(10);
        return view('socialneeds.beneficiaries',compact('beneficiaries'));
    }
    public function getJSonData()
    {
        //
        $beneficiaries=Beneficiary::all();
        $iTotalRecords =count(Beneficiary::all());
        $sEcho = intval(10);

        $records = array();
        $records["data"] = array();


        $count=1;
        foreach($beneficiaries as $beneficiary) {

            $records["data"][] = array(
                $count++,
                $beneficiary->progress_number,
                $beneficiary->full_name,
                $beneficiary->sex,
                $beneficiary->category,
                $beneficiary->code,
                $beneficiary->address,
                $beneficiary->nationality,
                '<span id="'.$beneficiary->id.'"> <a href="#" class="addRecord " title="Process form"> <i class="fa fa-file green "> </i> Open </a></span>',
            );
        }


        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        echo json_encode($records);
    }

    public function showImport()
    {
        //
        return view('socialneeds.import');
    }
    public function showImportErrors()
    {
        //
        $needs=DumpSocialNeed::all();
        return view('socialneeds.showerrors',compact('needs'));
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

                \DB::table('dump_social_needs')->truncate();
                $results->each(function($row) {



                    if(count(Beneficiary::where('progress_number','=',$row->progress_number)->get()) > 0 )
                    {
                        $beneficiary=new SocialNeed;
                        $beneficiary->progress_number = $row->progress_number;
                        $beneficiary->assistance = $row->assistance_needs;
                        $beneficiary->status = $row->status;
                        $beneficiary->save();
                    }
                    elseif ($row->progress_number =="" )
                    {
                        $beneficiary=new DumpSocialNeed;
                        $beneficiary->progress_number = $row->progress_number;
                        $beneficiary->assistance = $row->assistance_needs;
                        $beneficiary->status = $row->status;
                        $beneficiary->error_descriptions="Beneficiary progress number can not be empty";
                        $beneficiary->save();
                        $this->error_found="Client already registered for service in the same date";
                    }
                    else
                    {

                        $beneficiary=new DumpSocialNeed;
                        $beneficiary->progress_number = $row->progress_number;
                        $beneficiary->assistance = $row->assistance_needs;
                        $beneficiary->status = $row->status;
                        $beneficiary->error_descriptions="progress_number not found in Beneficiary list ";
                        $beneficiary->save();
                        $this->error_found="Client already registered for service in the same date";
                    }
                });

            });

            File::delete($destinationPath . $filename); //Delete after upload
            if($this->error_found != "")
            {
                return  redirect('excel/social/needs/errors');
            }
            else
            {
                return  redirect('social/needs');
            }

        } catch (\Exception $e) {

            echo $e->getMessage();
            // return  redirect()->back()->with('error',$e->getMessage());
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $beneficiary=Beneficiary::find($id);
        return view('socialneeds.create',compact('beneficiary'));
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
            $need=new SocialNeed;
            $need->progress_number=$request->progress_number;
            $need->assistance=$request->assistance;
            $need->status=$request->status;
            $need->save();
            return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
        }
        else
        {
            return "<span class='text-danger'><i class='fa-info'></i> Progress number not found in beneficiaries list</span>";
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
        $need=SocialNeed::find($id);
        return view('socialneeds.show',compact('need'));
    }
    public function showPrint($id)
    {
        //
        $need=SocialNeed::find($id);
        return view('socialneeds.pdf',compact('need'));
    }
    public function getPdf($id)
    {
        //
        $need=SocialNeed::find($id);
        $fo = 'This form is applicable for identification of functional needs of PWDs/PSNs according to the components <br/>of the Global CBR matrix ( Health , Education ,  Livelihood , social and Empowerment ).';
        $pdf = \PDF::loadView('socialneeds.pdf', compact('need'))
            ->setOption('footer-right', 'Page [page]')
            ->setOption('page-offset', 0);
        return $pdf->download('client_social_needs.pdf');
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
        $need=SocialNeed::find($id);
        return view('socialneeds.edit',compact('need'));
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
        if(count(Beneficiary::where('progress_number','=',$request->progress_number)->get()) > 0)
        {
            $need= SocialNeed::find($request->id);
            $need->progress_number=$request->progress_number;
            $need->assistance=$request->assistance;
            $need->status=$request->status;
            $need->save();
            return "<span class='text-success'><i class='fa-info'></i> Saved successfully</span>";
        }
        else
        {
            return "<span class='text-danger'><i class='fa-info'></i> Progress number not found in beneficiaries list</span>";
        }
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
        $need=SocialNeed::find($id);
        $need->delete();
    }
}
