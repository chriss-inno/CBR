<!-- BEGIN SAMPLE FORM PORTLET-->
@extends('layout.main')
@section('page-title')
    Clients Referral request
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
                <span class="title">Dashboard</span>

            </a>

        </li>
        <li class="nav-item ">
            <a href="{{url('registration/desk')}}" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title">Registration Desk</span>

            </a>
        </li>
        <li class="heading">
            <h3 class="uppercase">Medical rehabilitation </h3>
        </li>
        <li class="nav-item start active open">
            <a href="{{url('referrals')}}" class="nav-link nav-toggle">
                <i class="icon-direction"></i>
                <span class="title">Patient Referrals</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-puzzle"></i>
                <span class="title"> Progress Monitoring</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{url('physiotherapy')}}" class="nav-link ">
                        <span class="title">Physiotherapy register </span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('orthopedic')}}" class="nav-link ">
                        <span class="title">Orthopedic register </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="heading">
            <h3 class="uppercase">Social rehabilitation</h3>
        </li>
        <li class="nav-item">
            <a href="{{url('social/rehabilitation/clients')}}" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title">People with Special Need</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('sr/cases')}}" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title">Case monitoring</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('sr/materials')}}" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title">Material distribution</span>
            </a>
        </li>
        <li class="heading">
            <h3 class="uppercase">GENERAL REPORTS</h3>
        </li>
        <li class="nav-item  ">
            <a href="{{url('mr/reports')}}" class="nav-link ">
                <span class="title">Medical rehabilitation Reports </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('sr/reports')}}" class="nav-link ">
                <span class="title">Social rehabilitation Reports</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('general/reports')}}" class="nav-link ">
                <span class="title">General Reports</span>
            </a>
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
                referral_date: "required",
                referral_to:"required",
                referred_by_name:"required",
                referred_by_title:"required"
            },
            messages: {
                referral_date: "Please enter referral_date",
                referral_to: "Please enter referral_to",
                referred_by_name: "Please enter referred_by_name",
                referred_by_title: "Please enter referred_by_title"
            }
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
            <a href="{{url('clients')}}">Clients</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span class="active">Process referral</span>
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
                        <span class="caption-subject bold uppercase">Client Referral Request</span>
                    </div>
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-8 pull-right">
                                <div class="btn-group pull-right">
                                    <a href="{{url('referrals/request')}}" class="btn blue-madison"><i class="fa fa-file"></i> Referral Request</a>
                                    <a href="{{url('referrals')}}" class="btn blue-madison"><i class="fa fa-refresh"></i> All referrals</a>
                                    <a href="{{url('excel/import/referrals')}}" class="btn blue-madison"><i class="fa fa-bars"></i> Import referral data</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="portlet-body form">
                    {!! Form::open(array('url'=>'referrals/create','role'=>'form','id'=>'DepartmentFormUN')) !!}
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
                                <legend class="scheduler-border">Referral details</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">
                                        <label>Date</label>
                                        <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                            <input type="text" class="form-control" name="referral_date" id="referral_date" readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
                                        <label>Referred To</label>
                                        <input type="text" class="form-control" name="referral_to" id="referral_to">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Reason for referral</label>
                                <textarea class="wysihtml5 form-control" rows="10" name="referral_reason" id="referral_reason"></textarea>
                            </div>
                            <div class="form-group">
                                <label>History</label>
                                <textarea class="wysihtml5 form-control" rows="10" name="history" id="history"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Examination</label>
                                <textarea class="wysihtml5 form-control" rows="8" name="examination" id="examination"></textarea>
                            </div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Findings</legend>
                                <div class="form-group">
                                    <label>Findings and Feedback on the plans</label>
                                    <textarea class="wysihtml5 form-control" rows="8" name="findings" id="findings"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <label>Findings Name</label>
                                            <input type="text" class="form-control" name="findings_name" id="findings_name">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <label>Findings Title</label>
                                            <input type="text" class="form-control" name="findings_title" id="findings_title">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Referred by</legend>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <label> Name</label>
                                            <input type="text" class="form-control" name="referred_by_name" id="referred_by_name">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="referred_by_title" id="referred_by_title">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </fieldset>

                        <div class="form-actions right">
                            <div class="col-md-3 col-sm-3 pull-right">
                                <input type="hidden" name="client_id" id="client_id" value="{{$client->id}}">
                                <button type="submit" class="btn blue btn-block"><i class="fa fa-save"></i> Submit</button>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@stop

