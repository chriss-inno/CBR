<!-- BEGIN SAMPLE FORM PORTLET-->
@extends('layout.main')
@section('page-title')
    Clients  Attendance register  Physiotherapy unit
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
        <li class="nav-item start active open">
            <a href="{{url('home')}}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Home</span>
                <span class="selected"></span>
            </a>

        </li>
        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-users fa-2x"></i>
                <span class="title">Clients</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">

                <li class="nav-item active ">
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
                date_attended: "required",
                measurement_date: "required",
                delivery_date: "required",
                appliance_provided:"required"
            },
            messages: {
                date_attended: "Please enter date_attended",
                measurement_date: "Please enter measurement_date",
                delivery_date: "Please enter delivery_date",
                appliance_provided: "Please enter appliance_provided"
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
            <span class="active">Attendance Register</span>
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
                        <span class="caption-subject bold uppercase">Attendance register: Orthopedic unit</span>
                    </div>
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-8 pull-right">
                            <div class="btn-group pull-right">
                                <a href="{{url('orthopedic/clients')}}" class="btn blue-madison"><i class="fa fa-file"></i> Register New Case</a>
                                <a href="{{url('orthopedic')}}" class="btn blue-madison"><i class="fa fa-server"></i> Case history</a>
                                <a href="{{url('excel/import/opu')}}" class="btn blue-madison"><i class="fa fa-download"></i> Import attendence data</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(array('url'=>'orthopedic/edit','role'=>'form','id'=>'DepartmentFormUN')) !!}
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
                        <legend class="scheduler-border">Orthopedic  attendance details</legend>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label>Date of attending</label>
                                    <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                        <input type="text" class="form-control" name="date_attended" id="date_attended" readonly value="{{$attendances->date_attended}}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label>Delivery date</label>
                                    <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                        <input type="text" class="form-control" name="delivery_date" id="delivery_date" readonly value="{{$attendances->delivery_date}}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label>Type of appliance provided</label>
                                    <input type="text" class=" form-control"  name="appliance_provided" id="appliance_provided" value="{{$attendances->appliance_provided}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <label>Date of measurement </label>
                                    <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                        <input type="text" class="form-control" name="measurement_date" id="measurement_date" readonly value="{{$attendances->measurement_date}}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Diagnosis</label>
                            <textarea class="wysihtml5 form-control" rows="10" name="diagnosis" id="diagnosis">{{$attendances->diagnosis}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" class=" form-control" rows="10" name="remarks" id="remarks" value="{{$attendances->remarks}}">
                        </div>

                    </fieldset>

                    <div class="form-actions right">
                        <div class="col-md-3 col-sm-3 pull-right">
                            <input type="hidden" name="id" id="id" value="{{$attendances->id}}">
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

