{!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
{!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/clockface/css/clockface.css" ) !!}
{!! Html::script("assets/tinymce/js/tinymce/tinymce.min.js") !!}
<script>
    tinymce.init({ selector:'textarea' });

    $("#region_id").change(function () {
        var id1 = this.value;
        if(id1 != "")
        {
            $.get("<?php echo url('fetch/districts') ?>/"+id1,function(data){
                $("#district_id").html(data);
            });
        }else{$("#district_id").html("<option value=''>----</option>");}
    });
    function getPSNProfile(id1){
        if(id1 != "")
        {
            $.get("<?php echo url('getpasprofile') ?>/"+id1,function(data){
                $("#psnprofile").html(data);
            });
        }else{$("#psnprofile").html("");}
    }
</script>
<!-- END SAMPLE FORM PORTLET-->
{!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
{!! Html::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/clockface/js/clockface.js" ) !!}
{!! Html::script("assets/pages/scripts/components-date-time-pickers.min.js" ) !!}


<script>
    $("#formAssessmentProtections").validate({
        rules: {
            client_id: "required",
            progress_number: "required",
            fs: "required",
            name: "required",
            sex: "required",
            assessment_date: "required",
            assessment_place: "required"
        },
        messages: {
            client_id: "Field is required",
            progress_number: "Field is required",
            fs: "Field is required",
            name: "Field is required",
            sex: "Field is required",
            assessment_date: "Field is required",
            assessment_place: "Field is required"
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#formAssessmentProtections').serializeArray();
            var formURL = $('#formAssessmentProtections').attr("action");
            $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    success: function (data) {
                        $("#output").html("<h3><span class='text-info'><i class='fa fa-info'></i>"+ data.message +"</span><h3>");
                        setTimeout(function () {
                            location.replace("{{url('protection/assessment')}}");
                            $("#output").html("");
                        }, 2000);
                    },
                    error: function (jqXhr, status, response) {
                        console.log(jqXhr);
                        if (jqXhr.status === 401) {
                            location.replace('{{url('login')}}');
                        }
                        if (jqXhr.status === 400) {
                            if(jqXhr.responseJSON.errors ==1){
                                errorsHtml = '<div class="alert alert-danger"><p class="text-uppercase text-bold">There are errors kindly check</p>';
                                errorsHtml += '<p>'+ jqXhr.responseJSON.message +'</p></div>';
                                $('#output').html(errorsHtml);
                            }else {
                                var errors = jqXhr.responseJSON.errors;
                                errorsHtml = '<div class="alert alert-danger"><p class="text-uppercase text-bold">There are errors kindly check</p><ul>';
                                $.each(errors, function (key, value) {
                                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                                });
                                errorsHtml += '</ul></di>';
                                $('#output').html(errorsHtml);
                            }
                        }
                        else {
                            $('#output').html(jqXhr.message);
                        }

                    }
                });
        }
    });
</script>

<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::model($assessment, array('route' => array('protection.assessment.update', $assessment->id), 'method' => 'PUT','role'=>'form','id'=>'formAssessmentProtections')) !!}
        <div class="panel panel-flat">

            <div class="panel-body">
                <fieldset class="scheduler-border">
                    <legend class="text-bold">Assessments Details </legend>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Progress Number</label>
                                <input type="text" class="form-control" name="progress_number" id="progress_number"  value="{{$assessment->progress_number}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">F/S:</label>
                                <input type="text" class="form-control" name="fs" id="fs"  value="{{$assessment->fs}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">CODE:</label>
                                <input type="text" class="form-control" name="code" id="code"  value="{{$assessment->code}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Date of Assessment</label>
                                <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                    <input type="text" class="form-control" name="assessment_date" id="assessment_date" readonly value="{{$assessment->assessment_date}}">
                                    <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Place of assessment:</label>
                                <input type="text" class="form-control" name="assessment_place" id="assessment_place"  value="{{$assessment->assessment_place}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Date of birth:</label>
                                <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                    <input type="text" class="form-control" name="dob" id="dob" readonly value="{{$assessment->dob}}">
                                    <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                </div>
                            </div>
                        </div>

                    </div>

                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="text-bold">PWD/PSNBASIC  </legend>
                    <div class="form-group ">
                        <label class="control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name"  value="{{$assessment->name}}" readonly="">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Sex:</label>
                                <select class="form-control" name="sex" id="sex" data-placeholder="Choose an option..." readonly="">
                                    <option >{{$assessment->sex}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Marital Status</label>
                                <select class="form-control" name="marital_status" id="marital_status" data-placeholder="Choose an option...">
                                    <option>{{$assessment->marital_status}}</option>
                                    <option value=""></option>
                                    <option value="Child">Child</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widow">Widow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Head of household:</label>
                                <input type="text" class="form-control" name="hh_household" id="hh_household"  value="{{$assessment->hh_household}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Address:</label>
                                <input type="text" class="form-control" name="address" id="address"  value="{{$assessment->address}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Mobile Number:</label>
                                <input type="text" class="form-control" name="mobile" id="mobile"  value="{{$assessment->mobile}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Residency status:</label>
                                <input type="text" class="form-control" name="residence_status" id="residence_status"  value="{{$assessment->residence_status}}">
                            </div>
                        </div>

                    </div>
                    <div class="form-group ">
                        <label class="control-label">Condition:</label>
                        <textarea class="textEditor form-control" name="condition" id="condition" ><?php echo $assessment->condition; ?></textarea>
                    </div>


                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="text-bold">IDENTIFIED PROTECTION NEEDS</legend>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]"  value="Mental Health Services" {{ checkProtectionNeed($assessment->id,"Mental Health Services") }} >
                                Mental Health Services
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]" value="Psychological Interventions" {{ checkProtectionNeed($assessment->id,"Psychological Interventions") }} >
                                Psychological Interventions
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]" value="Physical HealthCare" {{ checkProtectionNeed($assessment->id,"Physical HealthCare") }} >
                                Physical HealthCare
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]" value="Medical Rehabilitation" {{ checkProtectionNeed($assessment->id,"Medical Rehabilitation") }} >
                                Medical Rehabilitation
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]"  value="Protection Support/Services" {{ checkProtectionNeed($assessment->id,"Protection Support/Services") }} >
                                Protection Support/Services
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]" value="Social support" {{ checkProtectionNeed($assessment->id,"Social support") }} >
                                Social support
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]"  value="Family Tracing Services" {{ checkProtectionNeed($assessment->id,"Family Tracing Services") }} >
                                Family Tracing Services
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]" value="Legal Assistance" {{ checkProtectionNeed($assessment->id,"Legal Assistance") }} >
                                Legal Assistance
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]" value="Family Tracing Services" {{ checkProtectionNeed($assessment->id,"Family Tracing Services") }} >
                                Family Tracing Services
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]" value="Social rehabilitation" {{ checkProtectionNeed($assessment->id,"Social rehabilitation") }} >
                                Social rehabilitation
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]"  value="Education" {{ checkProtectionNeed($assessment->id,"Education") }} >
                                Education
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]"  value="Material support" {{ checkProtectionNeed($assessment->id,"Material support") }} >
                                Material support
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]"  value="Negative att./neglect" {{ checkProtectionNeed($assessment->id,"Negative att./neglect") }} >
                                Negative att./neglect
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]" value="Exclusion from community" {{ checkProtectionNeed($assessment->id,"Exclusion from community") }} >
                                Exclusion from community
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]"  value="Lack of communication" {{ checkProtectionNeed($assessment->id,"Lack of communication") }} >
                                Lack of communication
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]"  value="Accessible latrine" {{ checkProtectionNeed($assessment->id,"Accessible latrine") }} >
                                Accessible latrine
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]"  value="House renovation" {{ checkProtectionNeed($assessment->id,"House renovation") }} >
                                House renovation
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="service_request[]" value="Shelter assistance" {{ checkProtectionNeed($assessment->id,"Shelter assistance") }} >
                                Shelter assistance
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="service_request[]"  value="Other – specify" {{ checkProtectionNeed($assessment->id,"Other – specify") }} >
                                        Other – specify
                                    </label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="other"  value="">
                                </div>
                            </div>

                        </div>
                    </div>

                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="text-bold">History of Client</legend>
                    <textarea  class="form-control" name="history" id="history">{{$assessment->history}}</textarea>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="text-bold">Action Plan</legend>
                    <textarea  class="form-control" name="action_plan" id="action_plan">{{$assessment->action_plan}}</textarea>
                </fieldset>

                <div class="row" style="margin-top: 10px">
                    <div class="col-md-8 col-sm-8 pull-left" id="output">

                    </div>
                    <div class="col-md-4 col-sm-4 pull-right text-right">
                        <button type="button" class="btn btn-danger "  data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Submit Form </button>
                    </div>

                </div>


            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>



