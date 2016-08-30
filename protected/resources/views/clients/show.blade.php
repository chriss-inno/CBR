@extends('layout.main')
@section('page-title')
    Clients Managements
@stop
@section('page-style')
    {!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/clockface/css/clockface.css") !!}
@stop
@section('menu-sidebar')
    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="nav-item ">
            <a href="{{url('home')}}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Home</span>
                <span class="selected"></span>
            </a>

        </li>
        <li class="nav-item start active open">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-users fa-2x"></i>
                <span class="title">Clients</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">

                <li class="nav-item  ">
                    <a href="{{url('clients')}}" class="nav-link ">
                        <span class="title">View All Clients</span>
                    </a>
                </li>
                
                <li class="nav-item  active">
                    <a href="{{url('excel/import/clients')}}" class="nav-link ">
                        <span class="title">Import Client</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('assessment/roam')}}" class="nav-link ">
                        <span class="title">Assessment</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('disabilities/clients')}}" class="nav-link ">
                        <span class="title">Disabilities</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('referrals/request')}}" class="nav-link ">
                        <span class="title">Client Referral</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item ">
            <a href="{{url('rehabilitation/services')}}" class="nav-link nav-toggle">
                <i class="fa fa-cogs fa-2x"></i>
                <span class="title">Rehabilitation services</span>
            </a>

        </li>
        <li class="nav-item ">
            <a href="{{url('orthopedic/services')}}" class="nav-link nav-toggle">
                <i class="fa fa-cogs fa-2x"></i>
                <span class="title">Orthopedic services</span>

            </a>

        </li>
        <li class="nav-item ">
            <a href="{{url('beneficiaries')}}" class="nav-link nav-toggle">
                <i class="fa fa-users fa-2x"></i>
                <span class="title">Beneficiaries</span>

            </a>

        </li>
        <li class="nav-item ">
            <a href="{{url('social/needs')}}" class="nav-link nav-toggle">
                <i class="fa fa-users fa-2x"></i>
                <span class="title">Social needs/Support</span>

            </a>

        </li>
        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-list"></i>
                <span class="title">Material support</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('inventory')}}" class="nav-link ">
                        <span class="title">Inventory</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('inventory/received')}}" class="nav-link ">
                        <span class="title">Received Items</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('inventory/disbursement')}}" class="nav-link ">
                        <span class="title">Distribute Items</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title"> LiveliHoods Tracking</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('livelihood/clients')}}" class="nav-link ">
                        <span class="title">Clients</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('livelihood/groups')}}" class="nav-link ">
                        <span class="title">Groups</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('livelihood/materials')}}" class="nav-link ">
                        <span class="title">Material Support</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('livelihood/reports')}}" class="nav-link ">
                        <span class="title">Reports</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-line-chart fa-2x"></i>
                <span class="title"> Reports</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('reports/assessment/roam')}}" class="nav-link ">
                        <span class="title">Assessment roam</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('reports/rehabilitation/services')}}" class="nav-link ">
                        <span class="title">Rehabilitation services</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('reports/orthopedic/services')}}" class="nav-link ">
                        <span class="title">Orthopedic services</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('reports/material/support')}}" class="nav-link ">
                        <span class="title">Material support</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('reports/beneficiaries')}}" class="nav-link ">
                        <span class="title">Beneficiaries  Identification/Registration</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('reports/social/needs')}}" class="nav-link ">
                        <span class="title">Social needs/Support</span>
                    </a>
                </li><li class="nav-item  ">
                    <a href="{{url('reports/livelihood')}}" class="nav-link ">
                        <span class="title">Livelihood Tracking</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="heading">
            <h3 class="uppercase">SYSTEM SETTINGS</h3>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title"> General Settings</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('setting/organization')}}" class="nav-link ">
                        <span class="title">Organization</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('disabilities')}}" class="nav-link ">
                        <span class="title">Disabilities</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('camps')}}" class="nav-link ">
                        <span class="title">Camps</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('centres')}}" class="nav-link ">
                        <span class="title">Centres</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('departments')}}" class="nav-link ">
                        <span class="title">Departments</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('countries')}}" class="nav-link ">
                        <span class="title">Countries</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('regions')}}" class="nav-link ">
                        <span class="title">Regions</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('districts')}}" class="nav-link ">
                        <span class="title">Districts</span>
                    </a>
                </li>

            </ul>
        </li><li class="heading">
            <h3 class="uppercase">SYSTEM BACKUPS</h3>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-database fa-2x"></i>
                <span class="title"> Data Import/Export</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('backup/imports')}}" class="nav-link ">
                        <span class="title">Data Import</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('backup/exports')}}" class="nav-link ">
                        <span class="title">Data Export</span>
                    </a>
                </li>
              </ul>
        </li>
        <li class="heading">
            <h3 class="uppercase"> ADMINISTRATION</h3>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title"> Users</span>
                <span class="arrow"></span>
            </a>
             <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('users')}}" class="nav-link ">
                        <span class="title">List All Users</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('access/roles')}}" class="nav-link ">
                        <span class="title">User Roles</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
@stop
@section('page-scripts-level1')
    {!! Html::script("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"  ) !!}
    {!! Html::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"  ) !!}
    {!! Html::script("assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"  ) !!}
    {!! Html::script("assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"  ) !!}
    {!! Html::script("assets/global/plugins/clockface/js/clockface.js"  ) !!}
@stop
@section('page-scripts-level2')
    {!! Html::script("assets/pages/scripts/components-date-time-pickers.min.js" ) !!}
    {!! Html::script("assets/pages/scripts/ui-confirmations.min.js" ) !!}

@stop
@section('custom-scripts')
    {!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
    <script>

        $("#region_id").change(function () {
            var id1 = this.value;
            if(id1 != "")
            {
                $.get("<?php echo url('fetch/districts') ?>/"+id1,function(data){
                    $("#district_id").html(data);
                });

            }else{$("#district_id").html("<option value=''>----</option>");}
        });
        $("#AssessmentsFRM").validate({
            rules: {
                examiner_name: "required",
                examiner_title: "required"
            },
            messages: {
                examiner_name: "Please enter examiner name",
                examiner_title: "Please enter examiner status"
            }
        });
        $("#DepartmentFormUN").validate({
            rules: {
                category_id: "required",
                disability_diagnosis: "required"
            },
            messages: {
                category_id: "Please select category name",
                disability_diagnosis: "Please enter diagnosis"
            },
            submitHandler: function(form) {
                $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
                var postData = $('#DepartmentFormUN').serializeArray();
                var formURL = $('#DepartmentFormUN').attr("action");
                $.ajax(
                        {
                            url : formURL,
                            type: "POST",
                            data : postData,
                            success:function(data)
                            {
                                console.log(data);
                                //data: return data from server
                                $("#output").html(data);
                                setTimeout(function() {
                                    location.reload();
                                    $("#output").html("");
                                }, 2000);
                            },
                            error: function(data)
                            {
                                console.log(data.responseJSON);
                                //in the responseJSON you get the form validation back.
                                $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Error in processing data try again...</span><h3>");

                                setTimeout(function() {
                                    $("#output").html("");
                                }, 2000);
                            }
                        });
            }
        });

    </script>
@stop
@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('home')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('clients')}}">Clients/Patient</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span class="active">Search Client</span>
        </li>
    </ul>
@stop
@section('contents')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-users font-dark"></i>
                        <span class="caption-subject bold uppercase">Client profile</span>
                    </div>
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-12 pull-right">
                                <div class="btn-group pull-right">
                                    <a href="{{url('clients/create')}}" class="btn blue-madison"><i class="fa fa-file"></i> New Client</a>
                                    <a href="{{url('clients')}}" class="btn blue-madison"><i class="fa fa-users"></i> View All Client</a>
                                    <a href="{{url('excel/import/clients')}}" class="btn blue-madison"><i class="fa fa-database"></i> Import Clients</a>
                                    <a href="{{url('reports/assessment/roam')}}" class="btn blue-madison"><i class="fa fa-line-chart"></i> Assessment Reports</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Client Details</legend>
                        <div class="form-group">
                            <label for="first_name">File Number</label>
                            <input type="text" class="form-control" name="file_number" id="file_number" placeholder="Enter file number" value="{{$client->file_number}}" disabled>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First name" value="{{$client->first_name}}" disabled>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last name"value="{{$client->last_name}}" disabled>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="middle_name">Other Name</label>
                                    <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Other name" value="{{$client->middle_name}}"  disabled>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <label for="dob">Date of birth</label>
                                    <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Other name"  value="{{$client->dob}}"  disabled>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="sex">Sex</label>
                                    <select class="form-control" name="sex" id="sex" disabled>
                                        @if($client->sex != "")
                                            <option value="{{$client->sex}}" selected>{{$client->sex}}</option>
                                        @else
                                            <option value="">---Select--</option>
                                        @endif
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="marital_status">Marital Status</label>
                                    <select class="form-control" name="marital_status" id="marital_status" disabled>
                                        @if($client->marital_status != "")
                                            <option value="{{$client->marital_status}}" selected>{{$client->marital_status}}</option>
                                        @else
                                            <option value="">---Select--</option>
                                        @endif
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widow">Widow</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    @if(count($client->assessment) >0 && $client->assessment != null )
                    {!! Form::open(array('url'=>'assessment/edit','role'=>'form','id'=>'AssessmentsFRM')) !!}
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Assessment details</legend>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label for="dob">Date of first consultation</label>
                                    <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                        <input type="text" class="form-control" name="consultation_date" id="consultation_date" readonly value="{{$client->assessment->consultation_date}}">
                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="sex">Consultation No</label>
                                    <input type="text" class="form-control" name="consultation_no" id="consultation_no" value="{{$client->assessment->consultation_no}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group>">
                            <label for="diagnosis">Diagnosis</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="diagnosis" id="diagnosis" >{{$client->assessment->diagnosis}}</textarea>
                        </div>
                        <div class="form-group>">
                            <label for="medical_history">Medical History</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="medical_history" id="medical_history" >{{$client->assessment->medical_history}}</textarea>
                        </div>
                        <div class="form-group>">
                            <label for="social_history">Social History</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="social_history" id="social_history" >{{$client->assessment->social_history}}</textarea>
                        </div>
                        <div class="form-group>">
                            <label for="employment">School/employment</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="employment" id="employment" >{{$client->assessment->employment}}</textarea>
                        </div>
                        <div class="form-group>">
                            <label for="skin_condition">Skin condition</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="skin_condition" id="skin_condition" >{{$client->assessment->skin_condition}}</textarea>
                        </div>
                        <div class="form-group>">
                            <label for="daily_activities">Activities of daily living</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="daily_activities" id="daily_activities" >{{$client->assessment->daily_activities}}</textarea>
                        </div>
                        <div class="form-group>">
                            <label for="joint_assessment">Joint assessment</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="joint_assessment" id="joint_assessment" >{{$client->assessment->joint_assessment}}</textarea>
                        </div>
                        <div class="form-group>">
                            <label for="muscle_assessment">Muscle assessment</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="muscle_assessment" id="muscle_assessment" >{{$client->assessment->muscle_assessment}}</textarea>
                        </div>
                        <div class="form-group>">
                            <label for="functional_assessment">Functional assessment</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="functional_assessment" id="functional_assessment" >{{$client->assessment->functional_assessment}}</textarea>
                        </div>
                        <div class="form-group>">
                            <label for="problem_list">Problem list</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="problem_list" id="problem_list" >{{$client->assessment->problem_list}}</textarea>
                        </div>
                        <div class="form-group>">
                            <label for="treatment">Treatment</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="treatment" id="treatment" >{{$client->assessment->treatment}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Client Assessment Status</label>
                            <select  class="form-control" name="status" id="status">
                                @if(old('status') != "")
                                    <option value="{{old('status')}}">{{old('status')}}</option>
                                @else
                                    <option value="">--Select--</option>
                                @endif
                                <option value="Disabled">Disabled</option>
                                <option value="Soft injury">Soft injury</option>
                            </select>
                            @if($errors->first('status') !="")
                                <span class="help-block help-block-error">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                        <div class="form-group>">
                            <label for="remarks">Remarks</label>
                            <input type="text" class="form-control" name="remarks" id="remarks" value="{{$client->assessment->remarks}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label for="examiner_name">Examiner Name</label>
                                    <input type="text" class="form-control" name="examiner_name" id="examiner_name" value="{{$client->assessment->examiner_name}}">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="examiner_title">Examiner Title</label>
                                    <input type="text" class="form-control" name="examiner_title" id="examiner_title" value="{{$client->assessment->examiner_title}}">
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    {!! Form::close() !!}
                    @else
                        {!! Form::open(array('url'=>'assessment/create','role'=>'form','id'=>'AssessmentsFRM')) !!}
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Assessment details</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label for="dob">Date of first consultation</label>
                                        <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                            <input type="text" class="form-control" name="consultation_date" id="consultation_date" readonly>
                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="sex">Consultation No</label>
                                        <input type="text" class="form-control" name="consultation_no" id="consultation_no">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group>">
                                <label for="diagnosis">Diagnosis</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="diagnosis" id="diagnosis" ></textarea>
                            </div>
                            <div class="form-group>">
                                <label for="medical_history">Medical History</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="medical_history" id="medical_history" ></textarea>
                            </div>
                            <div class="form-group>">
                                <label for="social_history">Social History</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="social_history" id="social_history" ></textarea>
                            </div>
                            <div class="form-group>">
                                <label for="employment">School/employment</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="employment" id="employment" ></textarea>
                            </div>
                            <div class="form-group>">
                                <label for="skin_condition">Skin condition</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="skin_condition" id="skin_condition" ></textarea>
                            </div>
                            <div class="form-group>">
                                <label for="daily_activities">Activities of daily living</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="daily_activities" id="daily_activities" ></textarea>
                            </div>
                            <div class="form-group>">
                                <label for="joint_assessment">Joint assessment</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="joint_assessment" id="joint_assessment" ></textarea>
                            </div>
                            <div class="form-group>">
                                <label for="muscle_assessment">Muscle assessment</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="muscle_assessment" id="muscle_assessment" ></textarea>
                            </div>
                            <div class="form-group>">
                                <label for="functional_assessment">Functional assessment</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="functional_assessment" id="functional_assessment" ></textarea>
                            </div>
                            <div class="form-group>">
                                <label for="problem_list">Problem list</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="problem_list" id="problem_list" ></textarea>
                            </div>
                            <div class="form-group>">
                                <label for="treatment">Treatment</label>
                                <textarea class="wysihtml5 form-control" rows="6" name="treatment" id="treatment" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Client Assessment Status</label>
                                <select  class="form-control" name="status" id="status">
                                    @if(old('status') != "")
                                        <option value="{{old('status')}}">{{old('status')}}</option>
                                    @else
                                        <option value="">--Select--</option>
                                    @endif
                                    <option value="Disabled">Disabled</option>
                                    <option value="Soft injury">Soft injury</option>
                                </select>
                                @if($errors->first('status') !="")
                                    <span class="help-block help-block-error">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div class="form-group>">
                                <label for="remarks">Remarks</label>
                                <input type="text" class="form-control" name="remarks" id="remarks">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label for="examiner_name">Examiner Name</label>
                                        <input type="text" class="form-control" name="examiner_name" id="examiner_name">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="examiner_title">Examiner Title</label>
                                        <input type="text" class="form-control" name="examiner_title" id="examiner_title">
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        {!! Form::close() !!}
                        @endif

                    <fieldset class="scheduler-border" style="margin-top: 20px;">
                        <legend class="scheduler-border text-primary">Disability details</legend>
                        {!! Html::script("assets/tinymce/js/tinymce/tinymce.min.js") !!}
                        <script>tinymce.init({ selector:'textarea' });</script>

                        {!! Form::open(array('url'=>'disabilities/clients/create','role'=>'form','id'=>'DepartmentFormUN')) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label>Disability Category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    @if($client->category_id != "")
                                        <?php $discat=\App\Disability::find($client->category_id);?>
                                        <option value="{{$discat->id}}">{{$discat->category}}</option>
                                    @else
                                        <option value="">--Select--</option>
                                    @endif
                                    @foreach(\App\Disability::all() as $dis)
                                        <option value="{{$dis->id}}">{{$dis->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Disability/Diagnosis</label>
                                <textarea class="form-control" name="disability_diagnosis" rows="6" id="disability_diagnosis">{{$client->disability_diagnosis}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea class="form-control" name="remarks" rows="6" id="remarks">{{$client->remarks}}</textarea>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-8 col-sm-8 pull-left" id="output">

                                </div>


                            </div>

                        </div>
                        {!! Form::close() !!}

                    </fieldset>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@stop