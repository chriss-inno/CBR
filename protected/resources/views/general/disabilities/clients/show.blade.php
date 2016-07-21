@extends('layout.main')
@section('page-title')
    Clients Managements
@stop
@section('page-style')
    {!! Html::style("assets/global/plugins/datatables/datatables.min.css" ) !!}
    {!! Html::style("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" ) !!}
@stop
@section('menu-sidebar')
    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="nav-item ">
            <a href="{{url('home')}}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Home</span>

            </a>

        </li>

        <li class="nav-item start active open">
            <a href="{{url('assessment/roam')}}" class="nav-link nav-toggle">
                <i class="fa fa-building-o fa-2x"></i>
                <span class="title">Assessment roam</span>
                <span class="selected"></span>
            </a>
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
            <a href="{{url('sr/materials')}}" class="nav-link nav-toggle">
                <i class="icon-list"></i>
                <span class="title">Material support</span>
            </a>
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
    {!! Html::script("assets/global/scripts/datatable.js" ) !!}
    {!! Html::script("assets/global/plugins/datatables/datatables.min.js" ) !!}
    {!! Html::script("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js") !!}
    {!! Html::script("assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" ) !!}
@stop
@section('page-scripts-level2')
    {!! Html::script("assets/pages/scripts/table-datatables-managed.min.js" ) !!}
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
            <a href="{{url('disabilities')}}">Disabilities</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('clients')}}">Clients</a>
            <i class="fa fa-angle-right"></i>
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
                        <span class="caption-subject bold uppercase">Client Disability profile</span>
                    </div>
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-12 pull-right">
                                <div class="btn-group pull-right">
                                    <a href="{{url('clients/create')}}" class="btn blue-madison"><i class="fa fa-file"></i> New Client</a>
                                    <a href="{{url('clients')}}" class="btn blue-madison"><i class="fa fa-users"></i> View All Client</a>
                                    <a href="{{url('excel/import/clients')}}" class="btn blue-madison"><i class="fa fa-database"></i> Import Clients</a>
                                    <a href="{{url('excel/export/clients')}}" class="btn blue-madison"><i class="fa fa-download"></i> Export Clients</a>
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
                                        <div class="col-md-4 col-sm-4 pull-right text-right">
                                            <input type="hidden" value="{{$client->id}}" name="client_id" id="client_id">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
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