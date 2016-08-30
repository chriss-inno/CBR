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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class BackupExportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->error_found="";
    } /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backups.exports.index');
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
        if($request->module_choice =="all")
        {
            $clients=Client::all();
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Clients>";
            foreach($clients as $client)
            {
                $xml.= "<Client>";
                $xml.= "<file_number>".$client->file_number."</file_number>";
                $xml.= "<full_name>".$client->full_name."</full_name>";
                $xml.= "<age>".$client->age."</age>";
                $xml.= "<sex>".$client->sex."</sex>";
                $xml.= "<address>".$client->address."</address>";
                $xml.= "<nationality>".$client->nationality."</nationality>";
                $xml.= "<zone>".$client->zone."</zone>";
                $xml.= "<status>".$client->status."</status>";
                $xml.= "<date_registered>".$client->date_registered."</date_registered>";
                $xml.= "<Assessments>";
                $assessments=ClientAssessment::where('client_id','=',$client->id)->get();
                foreach ($assessments as $asmnt)
                {
                    $xml.= "<Assessment>";
                    $xml.= "<consultation_no>".$asmnt->consultation_no."</consultation_no>";
                    $xml.= "<consultation_date>".$asmnt->consultation_date."</consultation_date>";
                    $xml.= "<diagnosis>".$asmnt->diagnosis."</diagnosis>";
                    $xml.= "<medical_history>".$asmnt->medical_history."</medical_history>";
                    $xml.= "<social_history>".$asmnt->social_history."</social_history>";
                    $xml.= "<employment>".$asmnt->employment."</employment>";
                    $xml.= "<skin_condition>".$asmnt->skin_condition."</skin_condition>";
                    $xml.= "<daily_activities>".$asmnt->daily_activities."</daily_activities>";
                    $xml.= "<remarks>".$asmnt->remarks."</remarks>";
                    $xml.= "<joint_assessment>".$asmnt->joint_assessment."</joint_assessment>";
                    $xml.= "<muscle_assessment>".$asmnt->consultation_no."</muscle_assessment>";
                    $xml.= "<functional_assessment>".$asmnt->functional_assessment."</functional_assessment>";
                    $xml.= "<problem_list>".$asmnt->problem_list."</problem_list>";
                    $xml.= "<treatment>".$asmnt->consultation_no."</treatment>";
                    $xml.= "<examiner_name>".$asmnt->consultation_no."</examiner_name>";
                    $xml.= "<examiner_title>".$asmnt->consultation_no."</examiner_title>";
                    $xml.= "</Assessment>";
                }
                $xml.= "</Assessments>";
                $xml.= "<Disabilities>";
                $disabilities=ClientDisability::where('client_id','=',$client->id)->get();
                foreach ($disabilities as $dis) {
                    $xml .= "<Disability>";
                    $xml.= "<category_name>".$dis->category_name."</category_name>";
                    $xml.= "<disability_diagnosis>".$dis->disability_diagnosis."</disability_diagnosis>";
                    $xml.= "<remarks>".$dis->remarks."</remarks>";
                    $xml.= "<progress_number>".$dis->progress_number."</progress_number>";
                    $xml .= "</Disability>";
                }
                $xml.= "</Disabilities>";
                $xml.= "<Referrals>";
                $referrals=ClientReferral::where('client_id','=',$client->id)->get();
                foreach ($referrals as $referral) {
                    $xml .= "<Referral>";
                    $xml.= "<referral_to>".$referral->referral_to."</referral_to>";
                    $xml.= "<referral_date>".$referral->referral_date."</referral_date>";
                    $xml.= "<history>".$referral->history."</history>";
                    $xml.= "<examination>".$referral->examination."</examination>";
                    $xml.= "<referral_reason>".$referral->referral_reason."</referral_reason>";
                    $xml.= "<referred_by_name>".$referral->referred_by_name."</referred_by_name>";
                    $xml.= "<referred_by_title>".$referral->referred_by_title."</referred_by_title>";
                    $xml.= "<referred_by_date>".$referral->referred_by_date."</referred_by_date>";
                    $xml.= "<findings>".$referral->findings."</findings>";
                    $xml.= "<findings_name>".$referral->findings_name."</findings_name>";
                    $xml.= "<findings_title>".$referral->findings_title."</findings_title>";
                    $xml .= "</Referral>";
                }
                $xml.= "</Referrals>";
                $xml.= "<Rehabilitations>";
                $attendances=RehabilitationRegister::where('file_no','=',$client->file_number)->get();
                foreach ($attendances as $attend) {
                    $xml.= "<Rehabilitation>";
                    $xml.= "<attendance_date>".$attend->attendance_date."</attendance_date>";
                    $xml.= "<diagnosis>".$attend->diagnosis."</diagnosis>";
                    $xml.= "<file_no>".$attend->file_no."</file_no>";
                    $xml.= "</Rehabilitation>";
                }
                $xml.= "</Rehabilitations>";
                $xml.= "<OrthopedicServices>";
                $attendances=OrthopedicServices::where('file_no','=',$client->file_number)->get();
                foreach ($attendances as $attend) {
                    $xml.= "<OrthopedicService>";
                    $xml.= "<attendance_date>".$attend->attendance_date."</attendance_date>";
                    $xml.= "<diagnosis>".$attend->diagnosis."</diagnosis>";
                    $xml.= "<file_no>".$attend->file_no."</file_no>";
                    $xml.= "<OrthopedicServicesItems>";
                    $items=OrthopedicServicesItems::where('ors_id','=',$attend->id)->get();
                    foreach ($items as $item)
                    {
                        $xml.= "<OrthopedicServicesItem>";
                        $xml.= "<service_received>".$item->service_received."</service_received>";
                        $xml.= "<item_serviced>".$item->item_serviced."</item_serviced>";
                        $xml.= "<quantity>".$item->quantity."</quantity>";
                        $xml.= "</OrthopedicServicesItem>";
                    }
                    $xml.= "</OrthopedicServicesItems>";
                    $xml.= "</OrthopedicService>";
                }
                $xml.= "</OrthopedicServices>";
                $xml.= "</Client>";
            }
            $xml.= "</Clients>";
            $xml.= "<Beneficiaries>";
            foreach(Beneficiary::all() as $beneficiary)
            {
                $xml.= "<Beneficiary>";
                $xml.= "<progress_number>".$beneficiary->progress_number."</progress_number>";
                $xml.= "<full_name>".$beneficiary->full_name."</full_name>";
                $xml.= "<date_registration>".$beneficiary->date_registration."</date_registration>";
                $xml.= "<category>".$beneficiary->category."</category>";
                $xml.= "<code>".$beneficiary->code."</code>";
                $xml.= "<age>".$beneficiary->age."</age>";
                $xml.= "<sex>".$beneficiary->sex."</sex>";
                $xml.= "<family_size>".$beneficiary->family_size."</family_size>";
                $xml.= "<number_females>".$beneficiary->number_females."</number_females>";
                $xml.= "<number_male>".$beneficiary->number_male."</number_male>";
                $xml.= "<address>".$beneficiary->address."</address>";
                $xml.= "<nationality>".$beneficiary->nationality."</nationality>";
                $xml.= "</Beneficiary>";
            }
            $xml.= "</Beneficiaries>";
            $xml.= "<SocialNeeds>";
            foreach (SocialNeed::all() as $need)
            {
                $beneficiary=Beneficiary::find($need->beneficiary_id);
                $xml.= "<SocialNeed>";
                $xml.= "<progress_number>".$need->progress_number."</progress_number>";
                $xml.= "<assistance>".$need->assistance."</assistance>";
                $xml.= "<status>".$need->status."</status>";
                $xml.= "<Beneficiary>";
                $xml.= "<progress_number>".$beneficiary->progress_number."</progress_number>";
                $xml.= "<full_name>".$beneficiary->full_name."</full_name>";
                $xml.= "<date_registration>".$beneficiary->date_registration."</date_registration>";
                $xml.= "<category>".$beneficiary->category."</category>";
                $xml.= "<code>".$beneficiary->code."</code>";
                $xml.= "<age>".$beneficiary->age."</age>";
                $xml.= "<sex>".$beneficiary->sex."</sex>";
                $xml.= "<family_size>".$beneficiary->family_size."</family_size>";
                $xml.= "<number_females>".$beneficiary->number_females."</number_females>";
                $xml.= "<number_male>".$beneficiary->number_male."</number_male>";
                $xml.= "<address>".$beneficiary->address."</address>";
                $xml.= "<nationality>".$beneficiary->nationality."</nationality>";
                $xml.= "</Beneficiary>";
                $xml.= "</SocialNeed>";
            }
            $xml.= "</SocialNeeds>";
            $xml.= "<Inventory>";
            $xml.= "<ItemCategories>";
            foreach(ItemsCategories::all() as $category)
            {
                $xml.= "<ItemCategory>";
                $xml.= "<category_name>".$category->category_name."</category_name>";
                $xml.= "<description>".$category->description."</description>";
                $xml.= "<status>".$category->status."</status>";
                $xml.= "</ItemCategory>";
            }
            $xml.= "</ItemCategories>";
            $xml.= "<Items>";
            $items=ItemsInventory::all();
            foreach($items as $item)
            {
                $category=ItemsCategories::find($item->category_id);
                $xml.= "<Item>";
                $xml.= "<item_name>".$item->item_name."</item_name>";
                $xml.= "<description>".$item->description."</description>";
                $xml.= "<quantity>".$item->quantity."</quantity>";
                $xml.= "<remarks>".$item->remarks."</remarks>";
                $xml.= "<status>".$item->status."</status>";
                $xml.= "<ItemCategory>";
                $xml.= "<category_name>".$category->category_name."</category_name>";
                $xml.= "<description>".$category->description."</description>";
                $xml.= "<status>".$category->status."</status>";
                $xml.= "</ItemCategory>";
                $xml.= "</Item>";
            }
            $xml.= "</Items>";
            $xml.= "<ReceivedItems>";
            foreach (InventoryReceived::all() as $item)
            {
                $xml.= "<ReceivedItem>";
                $xml.= "<way_bill_number>".$item->way_bill_number."</way_bill_number>";
                $xml.= "<received_from>".$item->received_from."</received_from>";
                $xml.= "<donor>".$item->donor."</donor>";
                $xml.= "<population>".$item->population."</population>";
                $xml.= "<receiver>".$item->receiver."</receiver>";
                $xml.= "<quantity>".$item->quantity."</quantity>";
                $xml.= "<received_date>".$item->received_date."</received_date>";
                $xml.= "</ReceivedItem>";
            }
            $xml.= "</ReceivedItems>";
            $xml.= "<MaterialSupports>";
            foreach (MateriaSupport::all() as $disbursement)
            {
                $beneficiary=Beneficiary::find($disbursement->beneficiary_id);
                $xml.= "<MaterialSupport>";
                $xml.= "<progress_number>".$disbursement->progress_number."</progress_number>";
                $xml.= "<donor_type>".$disbursement->donor_type."</donor_type>";
                $xml.= "<address>".$disbursement->address."</address>";
                $xml.= "<item>".$disbursement->item."</item>";
                $xml.= "<category>".$disbursement->category."</category>";
                $xml.= "<quantity>".$disbursement->quantity."</quantity>";
                $xml.= "<distributed_date>".$disbursement->distributed_date."</distributed_date>";
                $xml.= "<Beneficiary>";
                $xml.= "<progress_number>".$beneficiary->progress_number."</progress_number>";
                $xml.= "<full_name>".$beneficiary->full_name."</full_name>";
                $xml.= "<date_registration>".$beneficiary->date_registration."</date_registration>";
                $xml.= "<category>".$beneficiary->category."</category>";
                $xml.= "<code>".$beneficiary->code."</code>";
                $xml.= "<age>".$beneficiary->age."</age>";
                $xml.= "<sex>".$beneficiary->sex."</sex>";
                $xml.= "<family_size>".$beneficiary->family_size."</family_size>";
                $xml.= "<number_females>".$beneficiary->number_females."</number_females>";
                $xml.= "<number_male>".$beneficiary->number_male."</number_male>";
                $xml.= "<address>".$beneficiary->address."</address>";
                $xml.= "<nationality>".$beneficiary->nationality."</nationality>";
                $xml.= "</Beneficiary>";
                $xml.= "</MaterialSupport>";
            }
            $xml.= "</MaterialSupports>";
            $xml.= "</Inventory>";
            $xml.= "<LiveliHoodTracking>";
            $xml.= "<Groups>";
            foreach(LiveliHoodsGroup::all() as $group)
            {
                $xml.= "<Group>";
                $xml.= "<group_name>".$group->group_name."</group_name>";
                $xml.= "<category>".$group->category."</category>";
                $xml.= "<zone>".$group->zone."</zone>";
                $xml.= "<activity>".$group->activity."</activity>";
                $xml.= "<donor>".$group->donor."</donor>";
                $xml.= "<address>".$group->address."</address>";
                $xml.= "<funding_source>".$group->funding_source."</funding_source>";
                $xml.= "<registration_date>".$group->registration_date."</registration_date>";
                $xml.= "<phone>".$group->phone."</phone>";
                $xml.= "<nationality>".$group->nationality."</nationality>";
                $xml.= "</Group>";
            }
            $xml.= "</Groups>";
            $xml.= "<MaterialSupports>";
            foreach(LiveliHoodsMaterial::all() as $supports)
            {
                $xml.= "<Support>";
                $xml.= "<supported_name>".$supports->supported_name."</supported_name>";
                $xml.= "<venue>".$supports->venue."</venue>";
                $xml.= "<support_date>".$supports->support_date."</support_date>";
                $xml.= "<item_support>".$supports->item_support."</item_support>";
                $xml.= "<donor>".$supports->donor."</donor>";
                $xml.= "<category_type>".$supports->category_type."</category_type>";
                $xml.= "<category>".$supports->category."</category>";
                $xml.= "<quantity>".$supports->quantity."</quantity>";

                $xml.= "</Support>";
            }
            $xml.= "</MaterialSupports>";
            $xml.= "<Clients>";
            foreach(LiveliHoodsClient::all() as $client)
            {
                $xml.= "<Client>";
                $xml.= "<progress_number>".$client->progress_number."</progress_number>";
                $xml.= "<full_name>".$client->full_name."</full_name>";
                $xml.= "<sex>".$client->sex."</sex>";
                $xml.= "<age>".$client->age."</age>";
                $xml.= "<category>".$client->category."</category>";
                $xml.= "<position>".$client->position."</position>";
                $xml.= "<zone>".$client->zone."</zone>";
                $xml.= "<activity>".$client->activity."</activity>";
                $xml.= "<donor>".$client->donor."</donor>";
                $xml.= "<registration_date>".$client->registration_date."</registration_date>";
                $xml.= "<phone>".$client->phone."</phone>";
                $xml.= "<nationality>".$client->nationality."</nationality>";
                $xml.= "<Group>";
                $group= LiveliHoodsGroup::find($client->group);
                if(count($group) >0 && $group != null){
                    $xml.= "<group_name>".$group->group_name."</group_name>";
                    $xml.= "<category>".$group->category."</category>";
                    $xml.= "<zone>".$group->zone."</zone>";
                    $xml.= "<activity>".$group->activity."</activity>";
                    $xml.= "<donor>".$group->donor."</donor>";
                    $xml.= "<address>".$group->address."</address>";
                    $xml.= "<funding_source>".$group->funding_source."</funding_source>";
                    $xml.= "<registration_date>".$group->registration_date."</registration_date>";
                    $xml.= "<phone>".$group->phone."</phone>";
                    $xml.= "<nationality>".$group->nationality."</nationality>";
                }
                $xml.= "</Group>";
                $xml.= "</Client>";
            }
            $xml.= "</Clients>";
            $xml.= "</LiveliHoodTracking>";
            $xml.= "<Organisation>";
            $site=SiteSetup::all()->first();
            if(count($site) >0) {
                $xml .= "<organization_name>" . $site->organization_name . "</organization_name>";
                $xml .= "<app_name>" . $site->app_name . "</app_name>";
                $xml .= "<phone>" . $site->phone . "</age>";
                $xml .= "<tel>" . $site->tel . "</tel>";
                $xml .= "<fax>" . $site->fax . "</fax>";
                $xml .= "<email>" . $site->email . "</email>";
                $xml .= "<address>" . $site->address . "</address>";
                $xml .= "<contact_person>" . $site->contact_person . "</contact_person>";
                $xml .= "<website>" . $site->website . "</website>";
                $xml .= "<profile>" . $site->profile . "</profile>";
            }
            $xml.= "</Organisation>";
            $xml.= "<Camps>";
            foreach (Camp::all() as $camp){
                $xml.= "<Camp>";
                $xml .= "<reg_no>" . $camp->reg_no . "</reg_no>";
                $xml .= "<camp_name>" . $camp->camp_name . "</camp_name>";
                $xml .= "<description>" . $camp->description . "</description>";
                $xml .= "<address>" . $camp->address . "</address>";
                $xml .= "<tel>" . $camp->tel . "</tel>";
                $xml .= "<zone>" . $camp->zone . "</zone>";
                $xml .= "<status>" . $camp->status . "</status>";
                $xml .= "<input_by>" . $camp->input_by . "</input_by>";
                $xml .= "<Region>";
                $region=Region::find($camp->region_id);
                if(count($region) >0 && $region != null)
                {
                    $xml .= "<region_name>" . $region->region_name . "</region_name>";
                }
                $xml .="</Region>";
                $xml .= "<District>";
                $district=District::find($camp->district_id);
                if(count($district) >0 && $district != null)
                {
                    $xml .= "<district_name>" . $district->district_name . "</district_name>";
                    $xml .= "<Region>";
                    $region=Region::find($district->region_id);
                    if(count($region) >0 && $region != null)
                    {
                        $xml .= "<region_name>" . $region->region_name . "</region_name>";
                    }
                    $xml .="</Region>";
                }
                $xml .="</District>";

                $xml.= "</Camp>";
            }
            $xml.= "</Camps>";
            $xml.= "<Centres>";
            foreach (Centre::all() as $center)
            {
                $xml.= "<Centre>";
                $xml.= "<centre_name>".$center->centre_name."</centre_name>";
                $xml.= "<description>".$center->description."</description>";
                $xml.= "<remarks>".$center->remarks."</remarks>";
                $xml.= "<status>".$center->status."</status>";
                $xml.= "<input_by>".$center->input_by."</input_by>";
                $xml.= "<Camp>";
                $camp=Camp::find($center->camp_id);
                if(count($camp) >0 && $camp != null)
                {
                    $xml .= "<reg_no>" . $camp->reg_no . "</reg_no>";
                    $xml .= "<camp_name>" . $camp->camp_name . "</camp_name>";
                    $xml .= "<description>" . $camp->description . "</description>";
                    $xml .= "<address>" . $camp->address . "</address>";
                    $xml .= "<tel>" . $camp->tel . "</tel>";
                    $xml .= "<zone>" . $camp->zone . "</zone>";
                    $xml .= "<status>" . $camp->status . "</status>";
                    $xml .= "<input_by>" . $camp->input_by . "</input_by>";
                    $xml .= "<Region>";
                    $region=Region::find($camp->region_id);
                    if(count($region) >0 && $region != null)
                    {
                        $xml .= "<region_name>" . $region->region_name . "</region_name>";
                    }
                    $xml .="</Region>";
                    $xml .= "<District>";
                    $district=District::find($camp->district_id);
                    if(count($district) >0 && $district != null)
                    {
                        $xml .= "<district_name>" . $district->district_name . "</district_name>";
                        $xml .= "<Region>";
                        $region=Region::find($district->region_id);
                        if(count($region) >0 && $region != null)
                        {
                            $xml .= "<region_name>" . $region->region_name . "</region_name>";
                        }
                        $xml .="</Region>";
                    }
                    $xml .="</District>";
                }
                $xml.= "</Camp>";
                $xml.= "</Centre>";
            }
            $xml.= "</Centres>";
            $xml.= "<Departments>";
            foreach (Departments::all() as $depatment)
            {
                $xml.= "<Department>";
                $xml.= "<department_name>".$depatment->department_name."</department_name>";
                $xml.= "<department_description>".$depatment->department_description."</department_description>";
                $xml.= "<status>".$depatment->status."</status>";
                $xml.= "</Department>";
            }
            $xml.= "</Departments>";
            $xml.= "<Countries>";
            foreach (Country::all() as $country)
            {
                $xml.= "<Country>";
                $xml.= "<country_name>".$country->country_name."</country_name>";
                $xml.= "<country_code>".$country->country_code."</country_code>";
                $xml.= "</Country>";
            }
            $xml.= "</Countries>";
            $xml.= "<Regions>";
            foreach (Region::all() as $region)
            {
                $xml.= "<Region>";
                $xml.= "<region_name>".$region->region_name."</region_name>";
                $xml.= "<Districts>";
                foreach (District::where('region_id','=',$region->id)->get() as $district)
                {
                    $xml.= "<District>";
                    $xml.= "<district_name>".$district->district_name."</district_name>";
                    $xml.= "</District>";
                }
                $xml.= "</Districts>";
                $xml.= "</Region>";
            }
            $xml.= "</Regions>";
            $xml.= "<Users>";
            foreach(User::all() as $client)
            {
                $xml.= "<User>";
                $xml.= "<first_name>".$client->first_name."</first_name>";
                $xml.= "<middle_name>".$client->middle_name."</middle_name>";
                $xml.= "<last_name>".$client->last_name."</age>";
                $xml.= "<phone>".$client->phone."</phone>";
                $xml.= "<email>".$client->email."</email>";
                $xml.= "<address>".$client->address."</address>";
                $xml.= "<status>".$client->status."</status>";
                $xml.= "<user_name>".$client->user_name."</user_name>";
                $xml.= "</User>";
            }
            $xml.= "</Users>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/SystemDataExport.xml', $xml);
            return Response::download(storage_path().'/SystemDataExport.xml');
        }
        elseif($request->module_choice =="1")
        {
            $clients=Client::all();
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Clients>";
            foreach($clients as $client)
            {
                $xml.= "<Client>";
                    $xml.= "<file_number>".$client->file_number."</file_number>";
                    $xml.= "<full_name>".$client->full_name."</full_name>";
                    $xml.= "<age>".$client->age."</age>";
                    $xml.= "<sex>".$client->sex."</sex>";
                    $xml.= "<address>".$client->address."</address>";
                    $xml.= "<nationality>".$client->nationality."</nationality>";
                    $xml.= "<zone>".$client->zone."</zone>";
                    $xml.= "<status>".$client->status."</status>";
                    $xml.= "<date_registered>".$client->date_registered."</date_registered>";
                $xml.= "</Client>";
            }
            $xml.= "</Clients>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/Clients.xml', $xml);
            return Response::download(storage_path().'/Clients.xml');
        }
        elseif($request->module_choice =="2")
        {
            $clients=Client::all();
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Clients>";
            foreach($clients as $client)
            {
                $xml.= "<Client>";
                    $xml.= "<file_number>".$client->file_number."</file_number>";
                    $xml.= "<full_name>".$client->full_name."</full_name>";
                    $xml.= "<age>".$client->age."</age>";
                    $xml.= "<sex>".$client->sex."</sex>";
                    $xml.= "<address>".$client->address."</address>";
                    $xml.= "<nationality>".$client->nationality."</nationality>";
                    $xml.= "<zone>".$client->zone."</zone>";
                    $xml.= "<status>".$client->status."</status>";
                    $xml.= "<date_registered>".$client->date_registered."</date_registered>";
                    $xml.= "<Assessments>";
                         $assessments=ClientAssessment::where('client_id','=',$client->id)->get();
                         foreach ($assessments as $asmnt)
                         {
                             $xml.= "<Assessment>";
                                 $xml.= "<consultation_no>".$asmnt->consultation_no."</consultation_no>";
                                 $xml.= "<consultation_date>".$asmnt->consultation_date."</consultation_date>";
                                 $xml.= "<diagnosis>".$asmnt->diagnosis."</diagnosis>";
                                 $xml.= "<medical_history>".$asmnt->medical_history."</medical_history>";
                                 $xml.= "<social_history>".$asmnt->social_history."</social_history>";
                                 $xml.= "<employment>".$asmnt->employment."</employment>";
                                 $xml.= "<skin_condition>".$asmnt->skin_condition."</skin_condition>";
                                 $xml.= "<daily_activities>".$asmnt->daily_activities."</daily_activities>";
                                 $xml.= "<remarks>".$asmnt->remarks."</remarks>";
                                 $xml.= "<joint_assessment>".$asmnt->joint_assessment."</joint_assessment>";
                                 $xml.= "<muscle_assessment>".$asmnt->consultation_no."</muscle_assessment>";
                                 $xml.= "<functional_assessment>".$asmnt->functional_assessment."</functional_assessment>";
                                 $xml.= "<problem_list>".$asmnt->problem_list."</problem_list>";
                                 $xml.= "<treatment>".$asmnt->consultation_no."</treatment>";
                                 $xml.= "<examiner_name>".$asmnt->consultation_no."</examiner_name>";
                                 $xml.= "<examiner_title>".$asmnt->consultation_no."</examiner_title>";
                             $xml.= "</Assessment>";
                         }
                    $xml.= "</Assessments>";
                $xml.= "</Client>";
            }
            $xml.= "</Clients>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/ClientsAssessments.xml', $xml);
            return Response::download(storage_path().'/ClientsAssessments.xml');
        }
        elseif($request->module_choice =="3")
        {
            $clients=Client::all();
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Clients>";
            foreach($clients as $client)
            {
                $xml.= "<Client>";
                $xml.= "<file_number>".$client->file_number."</file_number>";
                $xml.= "<full_name>".$client->full_name."</full_name>";
                $xml.= "<age>".$client->age."</age>";
                $xml.= "<sex>".$client->sex."</sex>";
                $xml.= "<address>".$client->address."</address>";
                $xml.= "<nationality>".$client->nationality."</nationality>";
                $xml.= "<zone>".$client->zone."</zone>";
                $xml.= "<status>".$client->status."</status>";
                $xml.= "<date_registered>".$client->date_registered."</date_registered>";
                    $xml.= "<Disabilities>";
                        $disabilities=ClientDisability::where('client_id','=',$client->id)->get();
                        foreach ($disabilities as $dis) {
                            $xml .= "<Disability>";
                                $xml.= "<category_name>".$dis->category_name."</category_name>";
                                $xml.= "<disability_diagnosis>".$dis->disability_diagnosis."</disability_diagnosis>";
                                $xml.= "<remarks>".$dis->remarks."</remarks>";
                                $xml.= "<progress_number>".$dis->progress_number."</progress_number>";
                            $xml .= "</Disability>";
                        }
                    $xml.= "</Disabilities>";
                $xml.= "</Client>";
            }
            $xml.= "</Clients>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/ClientsDisabilities.xml', $xml);
            return Response::download(storage_path().'/ClientsDisabilities.xml');
        }
        elseif($request->module_choice =="4")
        {
            $clients=Client::all();
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Clients>";
            foreach($clients as $client)
            {
                $xml.= "<Client>";
                $xml.= "<file_number>".$client->file_number."</file_number>";
                $xml.= "<full_name>".$client->full_name."</full_name>";
                $xml.= "<age>".$client->age."</age>";
                $xml.= "<sex>".$client->sex."</sex>";
                $xml.= "<address>".$client->address."</address>";
                $xml.= "<nationality>".$client->nationality."</nationality>";
                $xml.= "<zone>".$client->zone."</zone>";
                $xml.= "<status>".$client->status."</status>";
                $xml.= "<date_registered>".$client->date_registered."</date_registered>";
                    $xml.= "<Referrals>";
                    $referrals=ClientReferral::where('client_id','=',$client->id)->get();
                    foreach ($referrals as $referral) {
                        $xml .= "<Referral>";
                            $xml.= "<referral_to>".$referral->referral_to."</referral_to>";
                            $xml.= "<referral_date>".$referral->referral_date."</referral_date>";
                            $xml.= "<history>".$referral->history."</history>";
                            $xml.= "<examination>".$referral->examination."</examination>";
                            $xml.= "<referral_reason>".$referral->referral_reason."</referral_reason>";
                            $xml.= "<referred_by_name>".$referral->referred_by_name."</referred_by_name>";
                            $xml.= "<referred_by_title>".$referral->referred_by_title."</referred_by_title>";
                            $xml.= "<referred_by_date>".$referral->referred_by_date."</referred_by_date>";
                            $xml.= "<findings>".$referral->findings."</findings>";
                            $xml.= "<findings_name>".$referral->findings_name."</findings_name>";
                            $xml.= "<findings_title>".$referral->findings_title."</findings_title>";
                        $xml .= "</Referral>";
                    }
                    $xml.= "</Referrals>";
                $xml.= "</Client>";
            }
            $xml.= "</Clients>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/ClientsReferrals.xml', $xml);
            return Response::download(storage_path().'/ClientsReferrals.xml');
        }
        elseif($request->module_choice =="5")
        {
            $clients=Client::all();
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Clients>";
            foreach($clients as $client)
            {
                $xml.= "<Client>";
                $xml.= "<file_number>".$client->file_number."</file_number>";
                $xml.= "<full_name>".$client->full_name."</full_name>";
                $xml.= "<age>".$client->age."</age>";
                $xml.= "<sex>".$client->sex."</sex>";
                $xml.= "<address>".$client->address."</address>";
                $xml.= "<nationality>".$client->nationality."</nationality>";
                $xml.= "<zone>".$client->zone."</zone>";
                $xml.= "<status>".$client->status."</status>";
                $xml.= "<date_registered>".$client->date_registered."</date_registered>";
                    $xml.= "<Rehabilitations>";
                        $attendances=RehabilitationRegister::where('file_no','=',$client->file_number)->get();
                        foreach ($attendances as $attend) {
                            $xml.= "<Rehabilitation>";
                                $xml.= "<attendance_date>".$attend->attendance_date."</attendance_date>";
                                $xml.= "<diagnosis>".$attend->diagnosis."</diagnosis>";
                                $xml.= "<file_no>".$attend->file_no."</file_no>";
                            $xml.= "</Rehabilitation>";
                        }
                    $xml.= "</Rehabilitations>";
                $xml.= "</Client>";
            }
            $xml.= "</Clients>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/RehabilitationsRegister.xml', $xml);
            return Response::download(storage_path().'/RehabilitationsRegister.xml');
        }
        elseif($request->module_choice =="6")
        {
            $clients=Client::all();
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Clients>";
            foreach($clients as $client)
            {
                $xml.= "<Client>";
                $xml.= "<file_number>".$client->file_number."</file_number>";
                $xml.= "<full_name>".$client->full_name."</full_name>";
                $xml.= "<age>".$client->age."</age>";
                $xml.= "<sex>".$client->sex."</sex>";
                $xml.= "<address>".$client->address."</address>";
                $xml.= "<nationality>".$client->nationality."</nationality>";
                $xml.= "<zone>".$client->zone."</zone>";
                $xml.= "<status>".$client->status."</status>";
                $xml.= "<date_registered>".$client->date_registered."</date_registered>";
                $xml.= "<OrthopedicServices>";
                    $attendances=OrthopedicServices::where('file_no','=',$client->file_number)->get();
                    foreach ($attendances as $attend) {
                        $xml.= "<OrthopedicService>";
                            $xml.= "<attendance_date>".$attend->attendance_date."</attendance_date>";
                            $xml.= "<diagnosis>".$attend->diagnosis."</diagnosis>";
                            $xml.= "<file_no>".$attend->file_no."</file_no>";
                            $xml.= "<OrthopedicServicesItems>";
                                  $items=OrthopedicServicesItems::where('ors_id','=',$attend->id)->get();
                                  foreach ($items as $item)
                                  {
                                      $xml.= "<OrthopedicServicesItem>";
                                          $xml.= "<service_received>".$item->service_received."</service_received>";
                                          $xml.= "<item_serviced>".$item->item_serviced."</item_serviced>";
                                          $xml.= "<quantity>".$item->quantity."</quantity>";
                                      $xml.= "</OrthopedicServicesItem>";
                                  }
                            $xml.= "</OrthopedicServicesItems>";
                        $xml.= "</OrthopedicService>";
                    }
                $xml.= "</OrthopedicServices>";
                $xml.= "</Client>";
            }
            $xml.= "</Clients>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/OrthopedicServices.xml', $xml);
            return Response::download(storage_path().'/OrthopedicServices.xml');
        }
        elseif($request->module_choice =="7")
        {
            $beneficiaries=Beneficiary::all();
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Beneficiaries>";
            foreach($beneficiaries as $beneficiary)
            {
                $xml.= "<Beneficiary>";
                    $xml.= "<progress_number>".$beneficiary->progress_number."</progress_number>";
                    $xml.= "<full_name>".$beneficiary->full_name."</full_name>";
                    $xml.= "<date_registration>".$beneficiary->date_registration."</date_registration>";
                    $xml.= "<category>".$beneficiary->category."</category>";
                    $xml.= "<code>".$beneficiary->code."</code>";
                    $xml.= "<age>".$beneficiary->age."</age>";
                    $xml.= "<sex>".$beneficiary->sex."</sex>";
                    $xml.= "<family_size>".$beneficiary->family_size."</family_size>";
                    $xml.= "<number_females>".$beneficiary->number_females."</number_females>";
                    $xml.= "<number_male>".$beneficiary->number_male."</number_male>";
                    $xml.= "<address>".$beneficiary->address."</address>";
                    $xml.= "<nationality>".$beneficiary->nationality."</nationality>";
                $xml.= "</Beneficiary>";
            }
            $xml.= "</Beneficiaries>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/Beneficiaries.xml', $xml);
            return Response::download(storage_path().'/Beneficiaries.xml');
        }
        elseif($request->module_choice =="8")
        {
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<SocialNeeds>";
            $needs=SocialNeed::all();
            foreach ($needs as $need)
            {
                $beneficiary=Beneficiary::find($need->beneficiary_id);
                $xml.= "<SocialNeed>";
                    $xml.= "<progress_number>".$need->progress_number."</progress_number>";
                    $xml.= "<assistance>".$need->assistance."</assistance>";
                    $xml.= "<status>".$need->status."</status>";
                    $xml.= "<Beneficiary>";
                        $xml.= "<progress_number>".$beneficiary->progress_number."</progress_number>";
                        $xml.= "<full_name>".$beneficiary->full_name."</full_name>";
                        $xml.= "<date_registration>".$beneficiary->date_registration."</date_registration>";
                        $xml.= "<category>".$beneficiary->category."</category>";
                        $xml.= "<code>".$beneficiary->code."</code>";
                        $xml.= "<age>".$beneficiary->age."</age>";
                        $xml.= "<sex>".$beneficiary->sex."</sex>";
                        $xml.= "<family_size>".$beneficiary->family_size."</family_size>";
                        $xml.= "<number_females>".$beneficiary->number_females."</number_females>";
                        $xml.= "<number_male>".$beneficiary->number_male."</number_male>";
                        $xml.= "<address>".$beneficiary->address."</address>";
                        $xml.= "<nationality>".$beneficiary->nationality."</nationality>";
                    $xml.= "</Beneficiary>";
                $xml.= "</SocialNeed>";
            }
            $xml.= "</SocialNeeds>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/SocialNeeds.xml', $xml);
            return Response::download(storage_path().'/SocialNeeds.xml');
        }
        elseif($request->module_choice =="9")
        {
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Inventory>";
                $xml.= "<ItemCategories>";
                  foreach(ItemsCategories::all() as $category)
                  {
                      $xml.= "<ItemCategory>";
                          $xml.= "<category_name>".$category->category_name."</category_name>";
                          $xml.= "<description>".$category->description."</description>";
                          $xml.= "<status>".$category->status."</status>";
                      $xml.= "</ItemCategory>";
                  }
                $xml.= "</ItemCategories>";
               $xml.= "<Items>";
                    $items=ItemsInventory::all();
                    foreach($items as $item)
                    {
                        $category=ItemsCategories::find($item->category_id);
                        $xml.= "<Item>";
                            $xml.= "<item_name>".$item->item_name."</item_name>";
                            $xml.= "<description>".$item->description."</description>";
                            $xml.= "<quantity>".$item->quantity."</quantity>";
                            $xml.= "<remarks>".$item->remarks."</remarks>";
                            $xml.= "<status>".$item->status."</status>";
                            $xml.= "<ItemCategory>";
                                $xml.= "<category_name>".$category->category_name."</category_name>";
                                $xml.= "<description>".$category->description."</description>";
                                $xml.= "<status>".$category->status."</status>";
                            $xml.= "</ItemCategory>";
                        $xml.= "</Item>";
                    }
               $xml.= "</Items>";
            $xml.= "<ReceivedItems>";
                  foreach (InventoryReceived::all() as $item)
                  {
                      $xml.= "<ReceivedItem>";
                          $xml.= "<way_bill_number>".$item->way_bill_number."</way_bill_number>";
                          $xml.= "<received_from>".$item->received_from."</received_from>";
                          $xml.= "<donor>".$item->donor."</donor>";
                          $xml.= "<population>".$item->population."</population>";
                          $xml.= "<receiver>".$item->receiver."</receiver>";
                          $xml.= "<quantity>".$item->quantity."</quantity>";
                          $xml.= "<received_date>".$item->received_date."</received_date>";
                      $xml.= "</ReceivedItem>";
                  }
            $xml.= "</ReceivedItems>";
            $xml.= "<MaterialSupports>";
                foreach (MateriaSupport::all() as $disbursement)
                {
                    $beneficiary=Beneficiary::find($disbursement->beneficiary_id);
                    $xml.= "<MaterialSupport>";
                        $xml.= "<progress_number>".$disbursement->progress_number."</progress_number>";
                        $xml.= "<donor_type>".$disbursement->donor_type."</donor_type>";
                        $xml.= "<address>".$disbursement->address."</address>";
                        $xml.= "<item>".$disbursement->item."</item>";
                        $xml.= "<category>".$disbursement->category."</category>";
                        $xml.= "<quantity>".$disbursement->quantity."</quantity>";
                        $xml.= "<distributed_date>".$disbursement->distributed_date."</distributed_date>";
                        $xml.= "<Beneficiary>";
                            $xml.= "<progress_number>".$beneficiary->progress_number."</progress_number>";
                            $xml.= "<full_name>".$beneficiary->full_name."</full_name>";
                            $xml.= "<date_registration>".$beneficiary->date_registration."</date_registration>";
                            $xml.= "<category>".$beneficiary->category."</category>";
                            $xml.= "<code>".$beneficiary->code."</code>";
                            $xml.= "<age>".$beneficiary->age."</age>";
                            $xml.= "<sex>".$beneficiary->sex."</sex>";
                            $xml.= "<family_size>".$beneficiary->family_size."</family_size>";
                            $xml.= "<number_females>".$beneficiary->number_females."</number_females>";
                            $xml.= "<number_male>".$beneficiary->number_male."</number_male>";
                            $xml.= "<address>".$beneficiary->address."</address>";
                            $xml.= "<nationality>".$beneficiary->nationality."</nationality>";
                        $xml.= "</Beneficiary>";
                    $xml.= "</MaterialSupport>";
                }
            $xml.= "</MaterialSupports>";
            $xml.= "</Inventory>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/MaterialSupports.xml', $xml);
            return Response::download(storage_path().'/MaterialSupports.xml');
        }
        elseif($request->module_choice =="10")
        {
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<LiveliHoodTracking>";
                $xml.= "<Groups>";
                foreach(LiveliHoodsGroup::all() as $group)
                {
                    $xml.= "<Group>";
                        $xml.= "<group_name>".$group->group_name."</group_name>";
                        $xml.= "<category>".$group->category."</category>";
                        $xml.= "<zone>".$group->zone."</zone>";
                        $xml.= "<activity>".$group->activity."</activity>";
                        $xml.= "<donor>".$group->donor."</donor>";
                        $xml.= "<address>".$group->address."</address>";
                        $xml.= "<funding_source>".$group->funding_source."</funding_source>";
                        $xml.= "<registration_date>".$group->registration_date."</registration_date>";
                        $xml.= "<phone>".$group->phone."</phone>";
                        $xml.= "<nationality>".$group->nationality."</nationality>";
                    $xml.= "</Group>";
                }
                $xml.= "</Groups>";
                $xml.= "<MaterialSupports>";
                foreach(LiveliHoodsMaterial::all() as $supports)
                {
                    $xml.= "<Support>";
                        $xml.= "<supported_name>".$supports->supported_name."</supported_name>";
                        $xml.= "<venue>".$supports->venue."</venue>";
                        $xml.= "<support_date>".$supports->support_date."</support_date>";
                        $xml.= "<item_support>".$supports->item_support."</item_support>";
                        $xml.= "<donor>".$supports->donor."</donor>";
                        $xml.= "<category_type>".$supports->category_type."</category_type>";
                        $xml.= "<category>".$supports->category."</category>";
                        $xml.= "<quantity>".$supports->quantity."</quantity>";
                       
                    $xml.= "</Support>";
                }
                $xml.= "</MaterialSupports>";
               $xml.= "<Clients>";
                foreach(LiveliHoodsClient::all() as $client)
                {
                    $xml.= "<Client>";
                        $xml.= "<progress_number>".$client->progress_number."</progress_number>";
                        $xml.= "<full_name>".$client->full_name."</full_name>";
                        $xml.= "<sex>".$client->sex."</sex>";
                        $xml.= "<age>".$client->age."</age>";
                        $xml.= "<category>".$client->category."</category>";
                        $xml.= "<position>".$client->position."</position>";
                        $xml.= "<zone>".$client->zone."</zone>";
                        $xml.= "<activity>".$client->activity."</activity>";
                        $xml.= "<donor>".$client->donor."</donor>";
                        $xml.= "<registration_date>".$client->registration_date."</registration_date>";
                        $xml.= "<phone>".$client->phone."</phone>";
                        $xml.= "<nationality>".$client->nationality."</nationality>";
                        $xml.= "<Group>";
                             $group= LiveliHoodsGroup::find($client->group);
                            if(count($group) >0 && $group != null){
                                $xml.= "<group_name>".$group->group_name."</group_name>";
                                $xml.= "<category>".$group->category."</category>";
                                $xml.= "<zone>".$group->zone."</zone>";
                                $xml.= "<activity>".$group->activity."</activity>";
                                $xml.= "<donor>".$group->donor."</donor>";
                                $xml.= "<address>".$group->address."</address>";
                                $xml.= "<funding_source>".$group->funding_source."</funding_source>";
                                $xml.= "<registration_date>".$group->registration_date."</registration_date>";
                                $xml.= "<phone>".$group->phone."</phone>";
                                $xml.= "<nationality>".$group->nationality."</nationality>";
                            }
                        $xml.= "</Group>";
                    $xml.= "</Client>";
                }
                $xml.= "</Clients>";
            $xml.= "</LiveliHoodTracking>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/LiveliHood.xml', $xml);
            return Response::download(storage_path().'/LiveliHood.xml');
        }
        elseif($request->module_choice =="11")
        {
            $site=SiteSetup::all()->first();
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Organisation>";
            if(count($site) >0) {
                $xml .= "<organization_name>" . $site->organization_name . "</organization_name>";
                $xml .= "<app_name>" . $site->app_name . "</app_name>";
                $xml .= "<phone>" . $site->phone . "</age>";
                $xml .= "<tel>" . $site->tel . "</tel>";
                $xml .= "<fax>" . $site->fax . "</fax>";
                $xml .= "<email>" . $site->email . "</email>";
                $xml .= "<address>" . $site->address . "</address>";
                $xml .= "<contact_person>" . $site->contact_person . "</contact_person>";
                $xml .= "<website>" . $site->website . "</website>";
                $xml .= "<profile>" . $site->profile . "</profile>";
            }
            $xml.= "</Organisation>";
            $xml.= "<Camps>";
            foreach (Camp::all() as $camp){
                $xml.= "<Camp>";
                    $xml .= "<reg_no>" . $camp->reg_no . "</reg_no>";
                    $xml .= "<camp_name>" . $camp->camp_name . "</camp_name>";
                    $xml .= "<description>" . $camp->description . "</description>";
                    $xml .= "<address>" . $camp->address . "</address>";
                    $xml .= "<tel>" . $camp->tel . "</tel>";
                    $xml .= "<zone>" . $camp->zone . "</zone>";
                    $xml .= "<status>" . $camp->status . "</status>";
                    $xml .= "<input_by>" . $camp->input_by . "</input_by>";
                    $xml .= "<Region>";
                        $region=Region::find($camp->region_id);
                        if(count($region) >0 && $region != null)
                        {
                           $xml .= "<region_name>" . $region->region_name . "</region_name>";
                        }
                        $xml .="</Region>";
                    $xml .= "<District>";
                            $district=District::find($camp->district_id);
                            if(count($district) >0 && $district != null)
                            {
                                $xml .= "<district_name>" . $district->district_name . "</district_name>";
                                $xml .= "<Region>";
                                    $region=Region::find($district->region_id);
                                    if(count($region) >0 && $region != null)
                                    {
                                        $xml .= "<region_name>" . $region->region_name . "</region_name>";
                                    }
                                $xml .="</Region>";
                            }
                    $xml .="</District>";

                $xml.= "</Camp>";
            }
            $xml.= "</Camps>";
            $xml.= "<Centres>";
               foreach (Centre::all() as $center)
               {
                   $xml.= "<Centre>";
                       $xml.= "<centre_name>".$center->centre_name."</centre_name>";
                       $xml.= "<description>".$center->description."</description>";
                       $xml.= "<remarks>".$center->remarks."</remarks>";
                       $xml.= "<status>".$center->status."</status>";
                       $xml.= "<input_by>".$center->input_by."</input_by>";
                       $xml.= "<Camp>";
                           $camp=Camp::find($center->camp_id);
                          if(count($camp) >0 && $camp != null)
                          {
                              $xml .= "<reg_no>" . $camp->reg_no . "</reg_no>";
                              $xml .= "<camp_name>" . $camp->camp_name . "</camp_name>";
                              $xml .= "<description>" . $camp->description . "</description>";
                              $xml .= "<address>" . $camp->address . "</address>";
                              $xml .= "<tel>" . $camp->tel . "</tel>";
                              $xml .= "<zone>" . $camp->zone . "</zone>";
                              $xml .= "<status>" . $camp->status . "</status>";
                              $xml .= "<input_by>" . $camp->input_by . "</input_by>";
                              $xml .= "<Region>";
                              $region=Region::find($camp->region_id);
                              if(count($region) >0 && $region != null)
                              {
                                  $xml .= "<region_name>" . $region->region_name . "</region_name>";
                              }
                              $xml .="</Region>";
                              $xml .= "<District>";
                              $district=District::find($camp->district_id);
                              if(count($district) >0 && $district != null)
                              {
                                  $xml .= "<district_name>" . $district->district_name . "</district_name>";
                                  $xml .= "<Region>";
                                  $region=Region::find($district->region_id);
                                  if(count($region) >0 && $region != null)
                                  {
                                      $xml .= "<region_name>" . $region->region_name . "</region_name>";
                                  }
                                  $xml .="</Region>";
                              }
                              $xml .="</District>";
                          }
                       $xml.= "</Camp>";
                   $xml.= "</Centre>";
               }
            $xml.= "</Centres>";
            $xml.= "<Departments>";
            foreach (Departments::all() as $depatment)
            {
                $xml.= "<Department>";
                    $xml.= "<department_name>".$depatment->department_name."</department_name>";
                    $xml.= "<department_description>".$depatment->department_description."</department_description>";
                    $xml.= "<status>".$depatment->status."</status>";
                $xml.= "</Department>";
            }
            $xml.= "</Departments>";
            $xml.= "<Countries>";
            foreach (Country::all() as $country)
            {
                $xml.= "<Country>";
                    $xml.= "<country_name>".$country->country_name."</country_name>";
                    $xml.= "<country_code>".$country->country_code."</country_code>";
                $xml.= "</Country>";
            }
            $xml.= "</Countries>";
            $xml.= "<Regions>";
            foreach (Region::all() as $region)
            {
                $xml.= "<Region>";
                    $xml.= "<region_name>".$region->region_name."</region_name>";
                    $xml.= "<Districts>";
                    foreach (District::where('region_id','=',$region->id)->get() as $district)
                    {
                        $xml.= "<District>";
                        $xml.= "<district_name>".$district->district_name."</district_name>";
                        $xml.= "</District>";
                    }
                    $xml.= "</Districts>";
                $xml.= "</Region>";
            }
            $xml.= "</Regions>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/GeneralSettings.xml', $xml);
            return Response::download(storage_path().'/GeneralSettings.xml');
        }
        elseif($request->module_choice =="12")
        {
            $clients=User::all();
            $xml= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<ApplicationData>";
            $xml.= "<Users>";
            foreach($clients as $client)
            {
                $xml.= "<User>";
                $xml.= "<first_name>".$client->first_name."</first_name>";
                $xml.= "<middle_name>".$client->middle_name."</middle_name>";
                $xml.= "<last_name>".$client->last_name."</age>";
                $xml.= "<phone>".$client->phone."</phone>";
                $xml.= "<email>".$client->email."</email>";
                $xml.= "<address>".$client->address."</address>";
                $xml.= "<status>".$client->status."</status>";
                $xml.= "<user_name>".$client->user_name."</user_name>";
                $xml.= "</User>";
            }
            $xml.= "</Users>";
            $xml.= "</ApplicationData>";

            File::put(storage_path().'/Users.xml', $xml);
            return Response::download(storage_path().'/Users.xml');
        }
        else
        {
            return redirect()->back();
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
