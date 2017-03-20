<!-- BEGIN SAMPLE FORM PORTLET-->
@extends('layout.main')
@section('page-title')
    PSN Clients assessment
@stop
@section('page-style')
    {!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/clockface/css/clockface.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" ) !!}
    {!! Html::style("assets/global/plugins/jquery-multi-select/css/multi-select.css" ) !!}
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
        <li class="nav-item  ">
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
                <li class="nav-item  ">
                    <a href="{{url('referrals')}}" class="nav-link ">
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
        <li class="nav-item start active open">
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
        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title"> LiveliHoods Tracking</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item active ">
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
                <li class="nav-item ">
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
        <li class="nav-item ">
            <a href="{{url('referrals')}}" class="nav-link nav-toggle">
                <i class="icon-direction"></i>
                <span class="title">Patient Referrals</span>

            </a>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-puzzle"></i>
                <span class="title"> Progress Monitoring</span>
                <span class="arrow"></span>
                <span class="selected"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item active ">
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
        <li class="nav-item start active open">
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
                <i class="icon-user"></i>
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
    {!! Html::script("assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" ) !!}
    {!! Html::script("assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" ) !!}
    {!! Html::script("assets/global/plugins/select2/js/select2.full.js" ) !!}


@stop
@section('page-scripts-level2')
    {!! Html::script("assets/pages/scripts/components-date-time-pickers.min.js" ) !!}
    {!! Html::script("assets/pages/scripts/components-editors.js"  ) !!}
    {!! Html::script("assets/pages/scripts/components-multi-select.js" ) !!}

@stop
@section('custom-scripts')
    {!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
    <script>
        $("#DepartmentFormUN").validate({
            rules: {
                nature_case: "required",
                nature_case_other: "required",
                delivery_date: "required",
                appliance_provided:"required"
            },
            messages: {
                nature_case: "Select nature of case",
                nature_case_other: "Please this filed is mandatory",
                delivery_date: "Please enter delivery_date",
                appliance_provided: "Please enter appliance_provided"
            }
        });
     function showDivNaration(v) {
         var data="<label for='last_name'>if old case what was it?</label><input type='text'class='form-control'name='nature_case_other'id='nature_case_other'>";

         if(v.value=="Old Case")
         {
             document.getElementById("caseNarrations").innerHTML=data;
         }
         else
         {
             document.getElementById("caseNarrations").innerHTML="<input type='hidden'class='form-control'name='nature_case_other'id='nature_case_other'>";
         }
     }

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
            <span class="active">PSN Assessment</span>
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
                        <span class="caption-subject bold uppercase">PSN Assessment form</span>
                    </div>
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-8 pull-right">
                            <div class="btn-group pull-right">
                                <a href="{{url('social/rehabilitation/clients')}}" class="btn blue-madison"><i class="fa fa-file"></i> New Case</a>
                                <a href="{{url('psn/assessment')}}" class="btn blue-madison"><i class="fa fa-server"></i> All Cases </a>
                                <a href="{{url('excel/import/opu')}}" class="btn blue-madison"><i class="fa fa-download"></i> Import data</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="portlet-body form">
                    {!! Form::open(array('url'=>'psn/assessment/create','role'=>'form','id'=>'DepartmentFormUN')) !!}
                    <div class="form-body">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Client Details</legend>
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
                            <legend class="scheduler-border text-primary">PSN Assessment details</legend>
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold">Preliminary introduction</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <label for="first_name">Ration card: </label>
                                                <input type="text" class="form-control" name="ration_card" id="ration_card" placeholder="Enter ration_card"  >
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label for="last_name">Family size: </label>
                                                <input type="text" class="form-control" name="family_size" id="family_size" placeholder="Enter family_size"  >
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label for="middle_name">progress number</label>
                                                <input type="text" class="form-control" name="progress_number" id="progress_number" placeholder="Enter progress_number"  >
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <label for="first_name">Name of foster care:  </label>
                                                <input type="text" class="form-control" name="foster_care" id="foster_care"  >
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="last_name">Family relationship: </label>
                                                <input type="text" class="form-control" name="family_relationship" id="family_relationship" >
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <label for="first_name">Nature of case:  </label>
                                                <select class="form-control" name="nature_case" onchange="showDivNaration(this);">
                                                    <option value="">--Select--</option>
                                                    <option value="New Case">New Case</option>
                                                    <option value="Old Case">Old Case</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6" id="caseNarrations">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold">History of the client problem</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-group">
                                        <label>What is the problem?</label>
                                        <textarea class="wysihtml5 form-control" rows="4" name="hist_problem" id="hist_problem"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>When did  it happen?</label>
                                        <textarea class="wysihtml5 form-control" rows="4" name="hist_problem_when" id="hist_problem_when"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>How  did  it  happen /causes of the problem:</label>
                                        <textarea class="wysihtml5 form-control" rows="4" name="hist_causes" id="hist_causes"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>What are the related problems caused by the initial problem?</label>
                                        <textarea class="wysihtml5 form-control" rows="4" name="hist_problem_related" id="hist_problem_related"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Other relevant information: </label>
                                        <textarea class="wysihtml5 form-control" rows="4" name="hist_relevant" id="hist_relevant"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold ">Needs of the client</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-group">
                                        <label>Assistance or services need</label>
                                        <select multiple="multiple" class="form-control multi-select" id="my_multi_select2" name="service_name[]">
                                            <option>Health</option>
                                            <option>Psychosocial counseling</option>
                                            <option>Security</option>
                                            <option>Justice</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Community initiatives done to solve the problem:</label>
                                        <textarea class="wysihtml5 form-control" rows="4" name="community_initiatives " id="community_initiatives"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Action planning:</label>
                                        <textarea class="wysihtml5 form-control" rows="4" name="action_planning" id="action_planning"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>General Remarks (case conference): </label>
                                        <textarea class="wysihtml5 form-control" rows="4" name="general_remarks" id="general_remarks"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Follow up:  </label>
                                        <textarea class="wysihtml5 form-control" rows="4" name="follow_up" id="follow_up"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                <label>Name of Caregiver: </label>
                                                <input type="text" class=" form-control"  name="caregiver_name" id="caregiver_name">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                <label>Date</label>
                                                <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                                    <input type="text" class="form-control" name="caregiver_date" id="caregiver_date" readonly>
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
                                                <label>Name of Interviewer: </label>
                                                <input type="text" class=" form-control"  name="interviewer_name" id="interviewer_name">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                <label>Date</label>
                                                <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                                    <input type="text" class="form-control" name="interviewer_date" id="interviewer_date" readonly>
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
                                                <label>Name of Reviewer: </label>
                                                <input type="text" class=" form-control"  name="reviewer_name" id="reviewer_name">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                <label>Date </label>
                                                <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                                    <input type="text" class="form-control" name="reviewer_date" id="reviewer_date" readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

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

            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
@stop

