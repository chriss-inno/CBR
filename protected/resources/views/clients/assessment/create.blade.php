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
                <li class="nav-item  ">
                    <a href="{{url('excel/export/clients')}}" class="nav-link ">
                        <span class="title">Export Client</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('excel/import/clients')}}" class="nav-link ">
                        <span class="title">Import Client</span>
                    </a>
                </li>
                <li class="nav-item  active">
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
    {!! Html::script("assets/global/plugins/bootstrap-summernote/summernote.min.js"  ) !!}
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
                examiner_name_h: "required",
                examiner_title_h: "required"
            },
            messages: {
                examiner_name_h: "Please enter examiner name",
                examiner_title_h: "Please enter examiner status"
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
    <ul class="page-breadcrumb ">
        <li>
            <a href="{{url('home')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Clients/Patient</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Progress Monitoring</a>
            <i class="fa fa-angle-right"></i>
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
                        <div class="btn-group pull-right">
                            <a href="{{url('clients')}}" class=" btn blue-madison"><i class="fa fa-file"></i> New Assessment</a>
                            <a href="{{url('assessment')}}" class="btn blue-madison"><i class="fa fa-users"></i> View All Assessment</a>
                            <a href="{{url('reports/assessment/roam')}}" class="btn blue-madison"><i class="fa fa-line-chart"></i> Assessment Reports</a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body form">
                    {!! Form::open(array('url'=>'assessment/create','role'=>'form','id'=>'DepartmentFormUN')) !!}
                    <div class="form-body">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Personal Details</legend>
                            <div class="form-group">
                                <label for="first_name">File Number</label>
                                <input type="text" class="form-control" name="file_number" id="file_number" placeholder="Enter file number" value="{{$client->file_number}}" disabled>
                            </div>
                            <div class="form-group">

                                        <label for="first_name">Full Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First name" value="{{$client->full_name}}" disabled>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <label for="dob">Age</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Full name"  value="{{$client->age}}"  disabled>
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
                                        <label for="sex">Address</label>
                                         <input type="text" class="form-control" value="{{$client->address}}" disabled>
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
                                            <input type="text" class="form-control" name="consultation_date" id="consultation_date" readonly value="{{$client->date_registered}}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="sex">Consultation No</label>

                                        <input type="text" class="form-control" name="consultation_no" id="consultation_no" placeholder="Enter file number" value="{{$client->file_number}}" readonly>
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