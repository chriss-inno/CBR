<?php

namespace App\Http\Controllers;

use App\Beneficiary;
use App\Camp;
use App\Centre;
use App\Client;
use App\ClientAssessment;
use App\ClientDisability;
use App\ClientReferral;
use App\Country;
use App\Departments;
use App\District;
use App\InventoryReceived;
use App\ItemsCategories;
use App\ItemsInventory;
use App\LiveliHoodsClient;
use App\LiveliHoodsGroup;
use App\LiveliHoodsMaterial;
use App\MateriaSupport;
use App\OrthopedicServices;
use App\OrthopedicServicesItems;
use App\Region;
use App\RehabilitationRegister;
use App\SiteSetup;
use App\SocialNeed;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BackupImportController extends Controller
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
        return view('backups.imports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       // try{
            $this->validate($request, [
                'uploaded_file' => 'required|mimes:xml',
            ]);

            $file= $request->file('uploaded_file');
            $destinationPath = storage_path() .'/uploads/temp/';
            $filename   = str_replace(' ', '_', $file->getClientOriginalName());

            $file->move($destinationPath, $filename);
            $requiredFile=$destinationPath.$filename;
            $xml = simplexml_load_file($requiredFile,'SimpleXMLElement', LIBXML_NOCDATA);

            if($request->module_choice =="1")
            {
                foreach ($xml->Clients as $clients)
                {
                    foreach ($clients as $clnt)
                    {
                        if(!count(Client::where('file_number','=',$clnt->file_number)->get()) >0) {
                            $client = new Client;
                            $client->file_number = $clnt->file_number;
                            $client->full_name = $clnt->full_name;
                            $client->age = $clnt->age;
                            $client->sex = $clnt->sex;
                            $client->address = $clnt->address;
                            $client->nationality = $clnt->nationality;
                            $client->zone = $clnt->zone;
                            $client->status = $clnt->status;
                            $client->date_registered = $clnt->date_registered;
                            $client->save();
                        }
                    }
                }


                return redirect('clients');

            }
            elseif($request->module_choice =="2")
            {
                foreach ($xml->Clients as $clients)
                {
                    foreach ($clients as $clnt) {
                        if (!count(Client::where('file_number', '=', $clnt->file_number)->get()) > 0) {
                            $client = new Client;
                            $client->file_number = $clnt->file_number;
                            $client->full_name = $clnt->full_name;
                            $client->age = $clnt->age;
                            $client->sex = $clnt->sex;
                            $client->address = $clnt->address;
                            $client->nationality = $clnt->nationality;
                            $client->zone = $clnt->zone;
                            $client->status = $clnt->status;
                            $client->date_registered = $clnt->date_registered;
                            $client->save();

                            foreach ($clnt->Assessments as $assessments) {
                                foreach ($assessments as $asmt) {
                                    if(!count(ClientAssessment::where('client_id','=',$client->id)->get()) >0) {
                                        $Assessments = new ClientAssessment;
                                        $Assessments->consultation_no = $asmt->consultation_no;
                                        $Assessments->diagnosis = $asmt->diagnosis;
                                        $Assessments->medical_history = $asmt->medical_history;
                                        $Assessments->social_history = $asmt->social_history;
                                        $Assessments->employment = $asmt->employment;
                                        $Assessments->skin_condition = $asmt->skin_condition;
                                        $Assessments->daily_activities = $asmt->daily_activities;
                                        $Assessments->remarks = $asmt->remarks;
                                        $Assessments->joint_assessment = $asmt->joint_assessment;
                                        $Assessments->consultation_no = $asmt->consultation_no;
                                        $Assessments->muscle_assessment = $asmt->muscle_assessment;
                                        $Assessments->functional_assessment = $asmt->functional_assessment;
                                        $Assessments->problem_list = $asmt->problem_list;
                                        $Assessments->treatment = $asmt->treatment;
                                        $Assessments->examiner_name = $asmt->examiner_name;
                                        $Assessments->examiner_title = $asmt->examiner_title;
                                        $Assessments->client_id = $client->id;
                                        $Assessments->save();
                                    }
                                }
                            }
                        } else {
                            $client = Client::where('file_number', '=', $clnt->file_number)->get()->first();
                            foreach ($clnt->Assessments as $assessments) {
                                foreach ($assessments as $asmt) {
                                if(!count(ClientAssessment::where('client_id','=',$client->id)->get()) >0) {
                                    $Assessments = new ClientAssessment;
                                    $Assessments->consultation_no = $asmt->consultation_no;
                                    $Assessments->diagnosis = $asmt->diagnosis;
                                    $Assessments->medical_history = $asmt->medical_history;
                                    $Assessments->social_history = $asmt->social_history;
                                    $Assessments->employment = $asmt->employment;
                                    $Assessments->skin_condition = $asmt->skin_condition;
                                    $Assessments->daily_activities = $asmt->daily_activities;
                                    $Assessments->remarks = $asmt->remarks;
                                    $Assessments->joint_assessment = $asmt->joint_assessment;
                                    $Assessments->consultation_no = $asmt->consultation_no;
                                    $Assessments->muscle_assessment = $asmt->muscle_assessment;
                                    $Assessments->functional_assessment = $asmt->functional_assessment;
                                    $Assessments->problem_list = $asmt->problem_list;
                                    $Assessments->treatment = $asmt->treatment;
                                    $Assessments->examiner_name = $asmt->examiner_name;
                                    $Assessments->examiner_title = $asmt->examiner_title;
                                    $Assessments->client_id = $client->id;
                                    $Assessments->save();
                                }
                            }}

                        }
                    }
                }

                return redirect('assessment/roam');
            }
            elseif($request->module_choice =="3")
            {
                foreach ($xml->Clients as $clients)
                {
                    foreach ($clients as $clnt) {
                        if (!count(Client::where('file_number', '=', $clnt->file_number)->get()) > 0) {
                            $client = new Client;
                            $client->file_number = $clnt->file_number;
                            $client->full_name = $clnt->full_name;
                            $client->age = $clnt->age;
                            $client->sex = $clnt->sex;
                            $client->address = $clnt->address;
                            $client->nationality = $clnt->nationality;
                            $client->zone = $clnt->zone;
                            $client->status = $clnt->status;
                            $client->date_registered = $clnt->date_registered;
                            $client->save();

                            foreach ($clnt->Disabilities as $disabilities) {
                                foreach ($disabilities as $dis) {
                                    if(!count(ClientDisability::where('client_id','=',$client->id)->get()) >0) {
                                        $disability = new ClientDisability;
                                        $disability->progress_number = $dis->progress_number;
                                        $disability->category_name = $dis->category_name;
                                        $disability->disability_diagnosis = $dis->disability_diagnosis;
                                        $disability->remarks = $dis->remarks;
                                        $disability->client_id = $client->id;
                                        $disability->save();
                                    }
                                }
                            }
                        } else {
                            $client = Client::where('file_number', '=', $clnt->file_number)->get()->first();
                            foreach ($clnt->Disabilities as $disabilities) {
                                foreach ($disabilities as $dis) {
                                    if(!count(ClientDisability::where('client_id','=',$client->id)->get()) >0) {
                                        $disability = new ClientDisability;
                                        $disability->progress_number = $dis->progress_number;
                                        $disability->category_name = $dis->category_name;
                                        $disability->disability_diagnosis = $dis->disability_diagnosis;
                                        $disability->remarks = $dis->remarks;
                                        $disability->client_id = $client->id;
                                        $disability->save();
                                    }
                                }}

                        }
                    }
                }
                return redirect('disabilities');
            }
            elseif($request->module_choice =="4")
            {
                foreach ($xml->Clients as $clients)
                {
                    foreach ($clients as $clnt) {
                        if (!count(Client::where('file_number', '=', $clnt->file_number)->get()) > 0) {
                            $client = new Client;
                            $client->file_number = $clnt->file_number;
                            $client->full_name = $clnt->full_name;
                            $client->age = $clnt->age;
                            $client->sex = $clnt->sex;
                            $client->address = $clnt->address;
                            $client->nationality = $clnt->nationality;
                            $client->zone = $clnt->zone;
                            $client->status = $clnt->status;
                            $client->date_registered = $clnt->date_registered;
                            $client->save();

                            foreach ($clnt->Referrals as $referrals) {
                                foreach ($referrals as $ref) {
                                    if(!count(ClientReferral::where('client_id','=',$client->id)->where('referral_date','=',$ref->referral_date)->where('referral_reason','=',$ref->referral_reason)->where('referral_to','=',$ref->referral_to)->get()) >0) {
                                        $referral = new ClientReferral;
                                        $referral->client_id = $client->id;
                                        $referral->referral_to = $ref->referral_to;
                                        $referral->referral_date = $ref->referral_date;
                                        $referral->history = $ref->history;
                                        $referral->examination = $ref->examination;
                                        $referral->referral_reason = $ref->referral_reason;
                                        $referral->referred_by_name = $ref->referred_by_name;
                                        $referral->referred_by_title = $ref->referred_by_title;
                                        $referral->referred_by_date = $ref->referred_by_date;
                                        $referral->findings = $ref->findings;
                                        $referral->findings_name = $ref->findings_name;
                                        $referral->findings_title = $ref->findings_title;
                                        $referral->save();
                                    }
                                }
                            }
                        } else {
                            $client = Client::where('file_number', '=', $clnt->file_number)->get()->first();
                            foreach ($clnt->Referrals as $referrals) {
                                foreach ($referrals as $ref) {
                                    if(!count(ClientReferral::where('client_id','=',$client->id)->where('referral_date','=',$ref->referral_date)->where('referral_reason','=',$ref->referral_reason)->where('referral_to','=',$ref->referral_to)->get()) >0) {
                                        $referral = new ClientReferral;
                                        $referral->client_id = $client->id;
                                        $referral->referral_to = $ref->referral_to;
                                        $referral->referral_date = $ref->referral_date;
                                        $referral->history = $ref->history;
                                        $referral->examination = $ref->examination;
                                        $referral->referral_reason = $ref->referral_reason;
                                        $referral->referred_by_name = $ref->referred_by_name;
                                        $referral->referred_by_title = $ref->referred_by_title;
                                        $referral->referred_by_date = $ref->referred_by_date;
                                        $referral->findings = $ref->findings;
                                        $referral->findings_name = $ref->findings_name;
                                        $referral->findings_title = $ref->findings_title;
                                        $referral->save();
                                    }
                                }
                            }

                        }
                    }
                }
                return redirect('referrals');
            }
            elseif($request->module_choice =="5")
            {
                foreach ($xml->Clients as $clients)
                {
                    foreach ($clients as $clnt) {
                        if (!count(Client::where('file_number', '=', $clnt->file_number)->get()) > 0) {
                            $client = new Client;
                            $client->file_number = $clnt->file_number;
                            $client->full_name = $clnt->full_name;
                            $client->age = $clnt->age;
                            $client->sex = $clnt->sex;
                            $client->address = $clnt->address;
                            $client->nationality = $clnt->nationality;
                            $client->zone = $clnt->zone;
                            $client->status = $clnt->status;
                            $client->date_registered = $clnt->date_registered;
                            $client->save();

                            foreach ($clnt->Rehabilitations as $rehabilitations) {
                                foreach ($rehabilitations as $reb) {
                                    if(!count(RehabilitationRegister::where('file_no','=',$client->file_number)->where('diagnosis','=',$reb->diagnosis)->where('attendance_date','=',$reb->attendance_date)->get())>0) {
                                        $attendances=new RehabilitationRegister;
                                        $attendances->attendance_date=$reb->attendance_date;
                                        $attendances->diagnosis=$reb->diagnosis;
                                        $attendances->file_no= $client->file_number;
                                        $attendances->save();
                                    }
                                }
                            }
                        } else {
                            $client = Client::where('file_number', '=', $clnt->file_number)->get()->first();
                            foreach ($clnt->Rehabilitations as $rehabilitations) {
                                foreach ($rehabilitations as $reb) {
                                    if(!count(RehabilitationRegister::where('file_no','=',$client->file_number)->where('diagnosis','=',$reb->diagnosis)->where('attendance_date','=',$reb->attendance_date)->get())>0) {
                                        $attendances=new RehabilitationRegister;
                                        $attendances->attendance_date=$reb->attendance_date;
                                        $attendances->diagnosis=$reb->diagnosis;
                                        $attendances->file_no=$client->file_number;
                                        $attendances->save();
                                    }
                                }}

                        }
                    }
                }
                return redirect('rehabilitation/services');
            }
            elseif($request->module_choice =="6")
            {
                foreach ($xml->Clients as $clients)
                {
                    foreach ($clients as $clnt) {
                        if (!count(Client::where('file_number', '=', $clnt->file_number)->get()) > 0) {
                            $client = new Client;
                            $client->file_number = $clnt->file_number;
                            $client->full_name = $clnt->full_name;
                            $client->age = $clnt->age;
                            $client->sex = $clnt->sex;
                            $client->address = $clnt->address;
                            $client->nationality = $clnt->nationality;
                            $client->zone = $clnt->zone;
                            $client->status = $clnt->status;
                            $client->date_registered = $clnt->date_registered;
                            $client->save();

                            foreach ($clnt->OrthopedicServices as $orthopedicServices) {
                                foreach ($orthopedicServices as $reb) {
                                    if(!count(OrthopedicServices::where('file_no','=',$client->file_number)->where('diagnosis','=',$reb->diagnosis)->where('attendance_date','=',$reb->attendance_date)->get())>0) {
                                        $attendances = new OrthopedicServices;
                                        $attendances->attendance_date = $reb->attendance_date;
                                        $attendances->file_no = $reb->file_no;
                                        $attendances->diagnosis = $reb->diagnosis;
                                        $attendances->save();
                                        foreach ($reb->OrthopedicServicesItems as $items) {
                                            foreach ($items as $itm) {
                                                $items = new OrthopedicServicesItems;
                                                $items->service_received = $itm->service_received;
                                                $items->item_serviced = $itm->item_serviced;
                                                $items->quantity = $itm->quantity;
                                                $items->ors_id = $attendances->id;
                                                $items->save();
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            $client = Client::where('file_number', '=', $clnt->file_number)->get()->first();
                            foreach ($clnt->OrthopedicServices as $orthopedicServices) {
                                foreach ($orthopedicServices as $reb) {
                                    if(!count(OrthopedicServices::where('file_no','=',$client->file_number)->where('diagnosis','=',$reb->diagnosis)->where('attendance_date','=',$reb->attendance_date)->get())>0) {
                                        $attendances = new OrthopedicServices;
                                        $attendances->attendance_date = $reb->attendance_date;
                                        $attendances->file_no = $reb->file_no;
                                        $attendances->diagnosis = $reb->diagnosis;
                                        $attendances->save();
                                        foreach ($reb->OrthopedicServicesItems as $items) {
                                            foreach ($items as $itm) {
                                                $items = new OrthopedicServicesItems;
                                                $items->service_received = $itm->service_received;
                                                $items->item_serviced = $itm->item_serviced;
                                                $items->quantity = $itm->quantity;
                                                $items->ors_id = $attendances->id;
                                                $items->save();
                                            }
                                        }
                                    }
                                }}

                        }
                    }
                }
                return redirect('orthopedic/services');
            }
            elseif($request->module_choice =="7")
            {
                foreach ($xml->Beneficiaries as $beneficiaries)
                {
                    foreach ($beneficiaries as $ben)
                    {
                        if(!count(Beneficiary::where('address','=',$ben->address)->where('full_name','=',ucwords(strtolower($ben->full_name)))->where('progress_number','=',$ben->progress_number)->get()) >0) {
                            $beneficiary = new Beneficiary;
                            $beneficiary->progress_number = $ben->progress_number;
                            $beneficiary->full_name = ucwords(strtolower($ben->full_name));
                            $beneficiary->date_registration = $ben->date_registration;
                            $beneficiary->category = $ben->category;
                            $beneficiary->code = $ben->code;
                            $beneficiary->age = $ben->age;
                            $beneficiary->sex = $ben->sex;
                            $beneficiary->family_size = $ben->family_size;
                            $beneficiary->number_females = $ben->number_females;
                            $beneficiary->number_male = $ben->number_male;
                            $beneficiary->address = $ben->address;
                            $beneficiary->nationality = ucwords(strtolower($ben->nationality));
                            $beneficiary->save();
                        }
                    }
                }
                return redirect('beneficiaries');

            }
            elseif($request->module_choice =="8")
            {
                foreach ($xml->SocialNeeds as $socialNeeds)
                {
                    foreach ($socialNeeds as $son)
                    {

                            $ben = $son->Beneficiary;
                            $ben_id = "";
                            if (!count(Beneficiary::where('address', '=', $ben->address)->where('full_name', '=', ucwords(strtolower($ben->full_name)))->where('progress_number', '=', $ben->progress_number)->get()) > 0) {
                                $beneficiary = new Beneficiary;
                                $beneficiary->progress_number = $ben->progress_number;
                                $beneficiary->full_name = ucwords(strtolower($ben->full_name));
                                $beneficiary->date_registration = $ben->date_registration;
                                $beneficiary->category = $ben->category;
                                $beneficiary->code = $ben->code;
                                $beneficiary->age = $ben->age;
                                $beneficiary->sex = $ben->sex;
                                $beneficiary->family_size = $ben->family_size;
                                $beneficiary->number_females = $ben->number_females;
                                $beneficiary->number_male = $ben->number_male;
                                $beneficiary->address = $ben->address;
                                $beneficiary->nationality = ucwords(strtolower($ben->nationality));
                                $beneficiary->save();
                                $ben_id = $beneficiary->id;
                            } else {
                                $beneficiary = Beneficiary::where('address', '=', $ben->address)
                                    ->where('full_name', '=', ucwords(strtolower($ben->full_name)))
                                    ->where('progress_number', '=', $ben->progress_number)->get()->first();
                                $ben_id = $beneficiary->id;
                            }
                        if(!count(SocialNeed::where('progress_number','=',$son->progress_number)->where('beneficiary_id','=',$ben_id)->where('status','=',$son->status)->where('assistance','=',$son->assistance)->get()) >0) {
                            $need = new SocialNeed;
                            $need->progress_number = $son->progress_number;
                            $need->beneficiary_id = $ben_id;
                            $need->assistance = $son->assistance;
                            $need->status = $son->status;
                            $need->save();
                        }
                    }
                }
                return redirect('social/needs');

            }
            elseif($request->module_choice =="9")
            {
                foreach ($xml->ItemCategories as $itemCategories)
                {
                    foreach ($itemCategories as $cate)
                    {
                        dump($cate);
                        if(!count(ItemsCategories::where('status','=',$cate->status)->where('description','=',$cate->description)->where('category_name','=',$cate->category_name)->get()) > 0){
                           $itmCat = new ItemsCategories;
                           $itmCat->category_name = $cate->category_name;
                           $itmCat->description = $cate->description;
                           $itmCat->status = $cate->status;
                           $itmCat->save();
                       }
                    }
                }


            }

            //return redirect('backup/imports');
       /* }
        catch (\Exception $e) {
            //echo $e->getMessage();
            return  redirect()->back()->with('error',$e->getMessage());
        }
*/
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
    }
}
