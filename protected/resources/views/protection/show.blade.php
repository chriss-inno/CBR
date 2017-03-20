<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<head>
    <link rel="stylesheet" type="text/css" href="{{asset("assets/global/plugins/bootstrap/css/bootstrap.min.css")}}"  media='all'>
</head>
<body>
<div class="portlet-body form">
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <img src="{{asset('assets/logo.png')}}" width="100px" height="100px"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center text-bold">
            <h3><strong>THE INTERNATIONAL RESCUE COMMITTEE</br>
                VULNERABLE PROTECTION REHABILITATION SECTOR<br/>
                @if(is_object($assessment->client) && is_object($assessment->client->camp) != null)
                    {{$assessment->client->camp->camp_name}} @endif
                    </strong></h3> <br/>

        </div>
    </div>
    <hr style="background-color: #e7ecf1 ; border-color: #e7ecf1 ;margin-bottom: 20px"/>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="col-md-2">Progress Number: </th>
                    <td class="col-md-2">{{$assessment->progress_number}} </td>
                    <th class="col-md-2">F/S: </th>
                    <td class="col-md-2">{{$assessment->fs}} </td>
                    <th class="col-md-2">CODE: </th>
                    <td class="col-md-2">{{$assessment->code}} </td>
                </tr>
                </thead>
                </table>
            </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">
                <tr>
                    <th colspan="4" style="background-color: #000"><span style="background-color: #fff;" class="col-md-8 col-md-offset-2 text-center">INDIVIDUAL PROTECTION SCREENING AND NEEDS IDENTIFICATION FORM </span></th>
                </tr>
                <tr>
                    <th class="col-md-3">Date </th>
                    <td class="col-md-3">{{$assessment->assessment_date}} </td>
                    <th class="col-md-3">Place of assessment: </th>
                    <td class="col-md-3">{{$assessment->assessment_place}} </td>
                </tr>
                <tr>
                    <th colspan="4" style="background-color: #000"><span style="color: #fff;" class="col-md-8 col-md-offset-2 text-center">PWD/PSN BASIC  </span></th>
                </tr>
                <tr>
                    <th class="col-md-3">Name </th>
                    <td class="col-md-9" colspan="3">{{$assessment->name}} </td>
                </tr>
                <tr>
                    <th class="col-md-3">Sex </th>
                    <td class="col-md-3">{{$assessment->sex}} </td>
                    <th class="col-md-3">Date of birth: </th>
                    <td class="col-md-3">{{$assessment->dob}} </td>
                </tr>
                <tr>
                    <th class="col-md-3">Marital Status: </th>
                    <td class="col-md-3">{{$assessment->marital_status}} </td>
                    <th class="col-md-3">Head of household: </th>
                    <td class="col-md-3">{{$assessment->hh_household}} </td>
                </tr>
                <tr>
                    <th class="col-md-3">Address: </th>
                    <td class="col-md-3">{{$assessment->address}} </td>
                    <th class="col-md-3">Mobile Number: </th>
                    <td class="col-md-3">{{$assessment->mobile}} </td>
                </tr>
                <tr>
                    <th class="col-md-3">Residency status: </th>
                    <td class="col-md-9" colspan="3">{{$assessment->residence_status}} </td>
                </tr>
                <tr>
                    <th class="col-md-3">Condition: </th>
                    <td class="col-md-9" colspan="3"><?php echo $assessment->condition;?> </td>
                </tr>

            </table>
             <table class="table table-bordered">
                <tr>
                    <th colspan="4" style="background-color: #000"><span style="color: #fff;" class="col-md-8 col-md-offset-2 text-center">IDENTIFIED PROTECTION NEEDS </span></th>
                </tr>
               <tr>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]"  value="Mental Health Services" {{ checkProtectionNeed($assessment->id,"Mental Health Services") }} >
                            Mental Health Services
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]" value="Psychological Interventions" {{ checkProtectionNeed($assessment->id,"Psychological Interventions") }} >
                            Psychological Interventions
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]" value="Physical HealthCare" {{ checkProtectionNeed($assessment->id,"Physical HealthCare") }} >
                            Physical HealthCare
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]" value="Medical Rehabilitation" {{ checkProtectionNeed($assessment->id,"Medical Rehabilitation") }} >
                            Medical Rehabilitation
                        </label>
                    </td>
                </tr>
               <tr>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]"  value="Protection Support/Services" {{ checkProtectionNeed($assessment->id,"Protection Support/Services") }} >
                            Protection Support/Services
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]" value="Social support" {{ checkProtectionNeed($assessment->id,"Social support") }} >
                            Social support
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]"  value="Family Tracing Services" {{ checkProtectionNeed($assessment->id,"Family Tracing Services") }} >
                            Family Tracing Services
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]" value="Legal Assistance" {{ checkProtectionNeed($assessment->id,"Legal Assistance") }} >
                            Legal Assistance
                        </label>
                    </td>
                </tr>
               <tr>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]" value="Family Tracing Services" {{ checkProtectionNeed($assessment->id,"Family Tracing Services") }} >
                            Family Tracing Services
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]" value="Social rehabilitation" {{ checkProtectionNeed($assessment->id,"Social rehabilitation") }} >
                            Social rehabilitation
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]"  value="Education" {{ checkProtectionNeed($assessment->id,"Education") }} >
                            Education
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]"  value="Material support" {{ checkProtectionNeed($assessment->id,"Material support") }} >
                            Material support
                        </label>
                    </td>
                </tr>
               <tr>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]"  value="Negative att./neglect" {{ checkProtectionNeed($assessment->id,"Negative att./neglect") }} >
                            Negative att./neglect
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]" value="Exclusion from community" {{ checkProtectionNeed($assessment->id,"Exclusion from community") }} >
                            Exclusion from community
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]"  value="Lack of communication" {{ checkProtectionNeed($assessment->id,"Lack of communication") }} >
                            Lack of communication
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]"  value="Accessible latrine" {{ checkProtectionNeed($assessment->id,"Accessible latrine") }} >
                            Accessible latrine
                        </label>
                    </td>
                </tr>
               <tr>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]"  value="House renovation" {{ checkProtectionNeed($assessment->id,"House renovation") }} >
                            House renovation
                        </label>
                    </td>
                    <td class="col-sm-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="service_request[]" value="Shelter assistance" {{ checkProtectionNeed($assessment->id,"Shelter assistance") }} >
                            Shelter assistance
                        </label>
                    </td>
                     <td class="col-sm-6" colspan="2">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]"  value="Other – specify" {{ checkProtectionNeed($assessment->id,"Other – specify") }} >
                                    Other – specify
                                </label>
                     </td>
               </tr>

            </table>
            <table class="table table-bordered">
                <tr>
                    <th style="background-color: #000"><span style="color: #fff;" class="col-md-8 col-md-offset-2 text-center">HISTORY OF CLIENT </span></th>
                </tr>
                <tr>
                    <td class="col-md-12"> <?php echo $assessment->history;?></td>
                </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <th style="background-color: #000"><span style="color: #fff;" class="col-md-8 col-md-offset-2 text-center">HISTORY OF CLIENT </span></th>
                </tr>
                <tr>
                    <td class="col-md-12"> <?php echo $assessment->action_plan;?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">
                <th class="col-md-1">NAME:</th>
                <th class="col-md-2"></th>
                <th class="col-md-1">TITLE:</th>
                <th class="col-md-2"></th>
                <th class="col-md-1">SIGNATURE:</th>
                <th class="col-md-2"></th>
                <th class="col-md-1">DATE:</th>
                <th class="col-md-2"></th>
            </table>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 10px">
    <div class="col-md-8 col-sm-8 pull-left" id="output">

    </div>
    <div class="col-md-4 col-sm-4 pull-right text-right">
        <button type="button" class="btn btn-primary btn-block"  data-dismiss="modal">Close</button>
    </div>

</div>
</body>
</html>