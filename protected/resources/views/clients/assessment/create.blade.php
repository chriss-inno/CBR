@extends('layout.main')
@section('page-title')
    Client Assessment
@stop
@section('page-style')
    {!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/clockface/css/clockface.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" ) !!}
@stop
@section('menu-sidebar')
    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="nav-item start">
            <a href="{{url('home')}}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="selected"></span>
            </a>

        </li>

        <li class="nav-item  active open">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title"> Clients/Patients</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item active ">
                    <a href="{{url('clients/create')}}" class="nav-link ">
                        <span class="title">New client</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('clients')}}" class="nav-link ">
                        <span class="title">View/Search</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('clients')}}" class="nav-link ">
                        <span class="title">Progress Monitoring</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-direction"></i>
                <span class="title"> Referral</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('referrals/request')}}" class="nav-link ">
                        <span class="title">New request</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('referrals')}}" class="nav-link ">
                        <span class="title">View all</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-puzzle"></i>
                <span class="title"> Disabilities</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('disabilities')}}" class="nav-link ">
                        <span class="title">Categories</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('disabilities/clients')}}" class="nav-link ">
                        <span class="title">Client with disabilities</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-puzzle"></i>
                <span class="title"> Client Visit</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('physiotherapy')}}" class="nav-link ">
                        <span class="title">Physiotherapy</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('orthopedic')}}" class="nav-link ">
                        <span class="title">Orthopedic </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-puzzle"></i>
                <span class="title"> Social rehabilitation</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('physiotherapy')}}" class="nav-link ">
                        <span class="title">Physiotherapy</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('orthopedic')}}" class="nav-link ">
                        <span class="title">Orthopedic </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="heading">
            <h3 class="uppercase">GENERAL REPORTS</h3>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-list"></i>
                <span class="title">Reports </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('reports/medical_rehabilitation')}}" class="nav-link ">
                        <span class="title">Medical rehabilitation  </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('physiotherapy')}}" class="nav-link ">
                        <span class="title">Social rehabilitation</span>
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

            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-bulb"></i>
                <span class="title"> Location</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
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
        </li>
        <li class="heading">
            <h3 class="uppercase"> ADMINISTRATION</h3>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title"> Users</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('users/create')}}" class="nav-link ">
                        <span class="title">New User</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('users')}}" class="nav-link ">
                        <span class="title">Manage</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('roles')}}l" class="nav-link ">
                        <span class="title">Permissions setup</span>
                    </a>
                </li>

            </ul>
        </li>

    </ul>
@stop
@section('page-scripts-level1')
   {!! Html::script("assets/global/plugins/moment.min.js"  ) !!}
   {!! Html::script("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"  ) !!}
   {!! Html::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"  ) !!}
   {!! Html::script("assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"  ) !!}
   {!! Html::script("assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"  ) !!}
   {!! Html::script("assets/global/plugins/clockface/js/clockface.js"  ) !!}
   {!! Html::script("assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" ) !!}
   {!! Html::script("assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"  ) !!}
   {!! Html::script("assets/global/plugins/ckeditor/ckeditor.js" ) !!}
@stop
@section('page-scripts-level2')
   {!! Html::script("assets/pages/scripts/components-date-time-pickers.min.js" ) !!}
   {!! Html::script("assets/pages/scripts/components-editors.min.js"  ) !!}

@stop
@section('custom-scripts')
   {!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
    <script>
        $("#DepartmentFormUN").validate({
            rules: {
                examiner_name: "required",
                examiner_title: "required"
            },
            messages: {
                examiner_name: "Please enter examiner name",
                examiner_title: "Please enter examiner status"
            }
        });
    </script>
    <script>

        $("#addRegion").click(function(){
            var modaldis = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modaldis+= '<div class="modal-dialog" style="width:70%;margin-right: 15% ;margin-left: 15%">';
            modaldis+= '<div class="modal-content">';
            modaldis+= '<div class="modal-header">';
            modaldis+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modaldis+= '<span id="myModalLabel" class="caption caption-subject font-blue-sharp bold uppercase" style="text-align: center"><i class="fa fa-plus font-blue-sharp"></i> Add Camps: Camps details</span>';
            modaldis+= '</div>';
            modaldis+= '<div class="modal-body">';
            modaldis+= ' </div>';
            modaldis+= '</div>';
            modaldis+= '</div>';
            $('body').css('overflow','hidden');

            $("body").append(modaldis);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("camps/create") ?>");
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })

        });

        $(".editRecord").click(function(){
            var id1 = $(this).parent().attr('id');
            var modaldis = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modaldis+= '<div class="modal-dialog" style="width:60%;margin-right: 20% ;margin-left: 20%">';
            modaldis+= '<div class="modal-content">';
            modaldis+= '<div class="modal-header">';
            modaldis+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modaldis+= '<span id="myModalLabel" class="caption caption-subject font-blue-sharp bold uppercase" style="text-align: center"><i class="fa fa-edit font-blue-sharp"></i> Update Camps: Camps details</span>';
            modaldis+= '</div>';
            modaldis+= '<div class="modal-body">';
            modaldis+= ' </div>';
            modaldis+= '</div>';
            modaldis+= '</div>';
            $('body').css('overflow','hidden');

            $("body").append(modaldis);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("camps") ?>/"+id1+"/edit");
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })

        });

        $(".deleteRecord").click(function(){
            var id1 = $(this).parent().attr('id');
            $(".deleteModule").show("slow").parent().parent().find("span").remove();
            var btn = $(this).parent().parent();
            $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            $("#no").click(function(){
                $(this).parent().parent().find(".deleteRecord").show("slow");
                $(this).parent().parent().find("span").remove();
            });
            $("#yes").click(function(){
                $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                $.get("<?php echo url('remove/camps') ?>/"+id1,function(data){
                    btn.hide("slow").next("hr").hide("slow");
                });
            });
        });

        $("#region_id").change(function () {
            var id1 = this.value;
            if(id1 != "")
            {
                $.get("<?php echo url('fetch/districts') ?>/"+id1,function(data){
                    $("#district_id").html(data);
                });

            }else{$("#district_id").html("<option value=''>----</option>");}
        });

        $("#camp_id").change(function () {
            var id1 = this.value;
            if(id1 != "")
            {
                $.get("<?php echo url('fetch/centres') ?>/"+id1,function(data){
                    $("#center_id").html(data);
                });

            }else{$("#center_id").html("<option value=''>----</option>");}
        });
    </script>
@stop
@section('breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{url('home')}}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Clients/Patient</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Progress Monitoring</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Assessment</span>
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
                        <i class="icon-user font-dark"></i>
                        <span class="caption-subject bold uppercase">Client assessment</span>
                    </div>
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-8 pull-right">
                                <div class="btn-group pull-right">
                                    <a href="{{url('clients/create')}}" class="btn blue-madison"><i class="fa fa-file"></i> New Client</a>
                                    <a href="{{url('clients')}}" class="btn blue-madison"><i class="fa fa-bars"></i> Client List</a>
                                    <a href="{{url('progress/monitoring')}}" class="btn blue-madison"><i class="fa fa-refresh"></i> Client Progress</a>
                                    <a href="{{url('progress/assessment')}}" class="btn blue-madison"><i class="fa fa-plus-square"></i> Clients Assessment</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="portlet-body form">
                    {!! Form::open(array('url'=>'assessment/create','role'=>'form','id'=>'DepartmentFormUN')) !!}
                    <div class="form-body">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Personal Details</legend>
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
                            <label for="diagnosis">Diagnosis</label>
                            <textarea class="wysihtml5 form-control" rows="6" name="diagnosis" id="diagnosis" ></textarea>
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
                    </div>
                    <div class="form-actions right">
                        <div class="col-md-3 col-sm-3 pull-right">
                            <input type="hidden" name="client_id" id="client_id" value="{{$client->id}}">
                            <button type="submit" class="btn blue btn-block"><i class="fa fa-save"></i> Submit</button>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@stop