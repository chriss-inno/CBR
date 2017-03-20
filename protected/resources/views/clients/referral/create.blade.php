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

                <li class="nav-item active ">
                    <a href="{{url('clients')}}" class="nav-link ">
                        <span class="title">Clients</span>
                    </a>
                </li> <li class="nav-item  ">
                    <a href="{{url('assessment/roam')}}" class="nav-link ">
                        <span class="title">Assessment</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('protection/assessment')}}" class="nav-link ">
                        <span class="title">Protection Assessment</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('disabilities')}}" class="nav-link ">
                        <span class="title">Disabilities</span>
                    </a>
                </li>
                <li class="nav-item  active">
                    <a href="{{url('referrals/request')}}" class="nav-link ">
                        <span class="title">Client Referral</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item ">
            <a href="{{url('rehabilitation/services')}}" class="nav-link nav-toggle">
                <i class="fa fa-cogs fa-2x"></i>
                <span class="title">Physiotherapy treatment </span>
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
                        <span class="title">Physiotherapy treatment </span>
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
            },
            messages: {
                referral_date: "Please enter referral_date",
                referral_to: "Please enter referral_to",

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
                                    <a href="{{url('referrals/request')}}" class="btn blue-madison"><i class="fa fa-search"></i> Search Client</a>
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

