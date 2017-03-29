@extends('layout.main')
@section('page-title')
    Reports
@stop
@section('page-style')
    {!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" ) !!}
    {!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" ) !!}
    {!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" ) !!}
    {!! Html::style("assets/global/plugins/clockface/css/clockface.css" ) !!}
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
                    <a href="{{url('disabilities')}}" class="nav-link ">
                        <span class="title">Disabilities</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('referrals')}}" class="nav-link ">
                        <span class="title">Client Referral</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('referrals')}}" class="nav-link ">
                        <span class="title">Client Referral</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('protection/assessment')}}" class="nav-link nav-toggle">
                <i class="fa fa-cogs fa-2x"></i>
                <span class="title">Protection Assessment </span>
            </a>

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
        <li class="nav-item start active open  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-line-chart fa-2x"></i>
                <span class="title"> Reports</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item active ">
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
@section('page-scripts-level1')

@stop
@section('page-scripts-level2')
    {!! Html::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" ) !!}
    {!! Html::script("assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" ) !!}
    {!! Html::script("assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" ) !!}
    {!! Html::script("assets/global/plugins/clockface/js/clockface.js" ) !!}
    {!! Html::script("assets/pages/scripts/components-date-time-pickers.min.js" ) !!}

@stop
@section('custom-scripts')
    {!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
    <script>
        $("#SearchForm").validate({
            rules: {
                searchKeyword: "required"
            },
            messages: {
                searchKeyword: "Please enter search keyword "
            },
            submitHandler: function(form) {
                $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
                var postData = $('#SearchForm').serializeArray();
                var formURL = $('#SearchForm').attr("action");
                $.ajax(
                        {
                            url : formURL,
                            type: "POST",
                            data : postData,
                            success:function(data)
                            {
                                console.log(data);
                                //data: return data from server
                                $("#clientsSearchResults").html(data);
                            },
                            error: function(data)
                            {
                                console.log(data.responseJSON);
                            }
                        });
            }
        });
        $(".addRecord").click(function(){
            var modaldis = '<div class="modal fade"   data-backdrop="false" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modaldis+= '<div class="modal-dialog" style="width:70%;margin-right: 15% ;margin-left: 15%">';
            modaldis+= '<div class="modal-content">';
            modaldis+= '<div class="modal-header">';
            modaldis+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modaldis+= '<span id="myModalLabel" class="caption caption-subject font-blue-sharp bold uppercase" style="text-align: center"><i class="fa fa-plus font-blue-sharp"></i>Physiotherapy treatment </span>';
            modaldis+= '</div>';
            modaldis+= '<div class="modal-body">';
            modaldis+= ' </div>';
            modaldis+= '</div>';
            modaldis+= '</div>';
            $('body').css('overflow-y','scroll');

            $("body").append(modaldis);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("rehabilitation/services/create") ?>");
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })

        });

        $(".editRecord").click(function(){
            var id1 = $(this).parent().attr('id');
            var modaldis = '<div class="modal fade"   data-backdrop="false" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modaldis+= '<div class="modal-dialog" style="width:60%;margin-right: 20% ;margin-left: 20%">';
            modaldis+= '<div class="modal-content">';
            modaldis+= '<div class="modal-header">';
            modaldis+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modaldis+= '<span id="myModalLabel" class="caption caption-subject font-blue-sharp bold uppercase" style="text-align: center"><i class="fa fa-edit font-blue-sharp"></i> Update</span>';
            modaldis+= '</div>';
            modaldis+= '<div class="modal-body">';
            modaldis+= ' </div>';
            modaldis+= '</div>';
            modaldis+= '</div>';
            $('body').css('overflow-y','scroll');

            $("body").append(modaldis);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("rehabilitation/services/edit") ?>/"+id1);
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
                $.get("<?php echo url('rehabilitation/services/remove') ?>/"+id1,function(data){
                    btn.hide("slow").next("hr").hide("slow");
                });
            });
        });
    </script>
    {!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
    <script>

        $("#DepartmentFormUN").validate({
            rules: {
                date_from: "required",
                date_to: "required",
                quantity: "required"
            },
            messages: {
                date_from: "Please Select file to upload",
                date_to: "Please select status",
                quantity: "Please enter quantity"
            }
        });
        $("#DepartmentFormUN1").validate({
            rules: {
                clients_file: "required",
                status: "required",
                quantity: "required"
            },
            messages: {
                clients_file: "Please Select file to upload",
                status: "Please select status",
                quantity: "Please enter quantity"
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
            <a href="{{url('assessment/roam')}}">Assessment Roam</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span class="active">Reports</span>
        </li>
    </ul>
@stop
@section('contents')
    <div class="row widget-row">
        <div class="col-md-12 pull-right">
            <div class="btn-group pull-right">
                <a href="{{url('reports/assessment/roam/generate')}}" class="btn blue-madison"><i class="fa fa-bar-chart"></i> Generate Reports</a>
                <a href="{{url('excel/export/clients')}}" class="btn blue-madison"><i class="fa fa-download"></i> Export Clients</a>
                <a href="{{url('reports/assessment/roam')}}" class="btn blue-madison"><i class="fa fa-line-chart"></i> Assessment Reports</a>
            </div>

        </div>

    </div>
    <div class="portlet light bordered" style="margin-top: 10px">
        <div class="portlet-title">
            <div class="caption font-dark">
                <span class="caption-subject bold uppercase">Assessment Report</span>
            </div>

        </div>
        <div class="portlet-body">
            <?php  $range = [$startDate, $endDate];?>
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">PWD & PSN statistics (OLD POPULATION) as of {{$startDate}} to {{$endDate}} </legend>
                <table class="table table-striped table-bordered table-hover ">
                    <thead>
                    <tr>
                        <th rowspan="3"> Disability cases subtotal: </th>
                        <th colspan="9" class="text-center">Population (Congolese)</th>
                    </tr>
                    <tr>
                        <th colspan="3">Total as of last reporting period</th>
                        <th colspan="3">*NEW* cases this reporting period</th>
                        <th colspan="3">Cumulative to date (February 2016)</th>
                    </tr>
                    <tr>
                        <th>F</th>
                        <th>M</th>
                        <th>Total</th>
                        <th>F</th>
                        <th>M</th>
                        <th>Total</th>
                        <th>F</th>
                        <th>M</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $totalF=0;
                    $totalM=0;
                    $totalT=0;
                    ?>
                    @if(count($clients )>0)
                        @foreach(\App\Disability::all() as $discategor)
                            <tr class="odd gradeX">
                                <?php
                                $totalF += count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('sex','=','Female')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get());
                                $totalM += count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('sex','=','Male')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get());
                                $totalT += count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get());
                                ?>
                                <td>{{$discategor->category}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('sex','=','Female')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('sex','=','Male')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('sex','=','Female')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('sex','=','Male')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('sex','=','Female')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('sex','=','Male')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','congolese')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tr class="odd gradeX">
                        <th>Total Disability cases: </th>
                        <td>{{$totalF}}</td>
                        <td>{{$totalM}}</td>
                        <td>{{$totalT}}</td>
                        <td>{{$totalF}}</td>
                        <td>{{$totalM}}</td>
                        <td>{{$totalT}}</td>
                        <td>{{$totalF}}</td>
                        <td>{{$totalM}}</td>
                        <td>{{$totalT}}</td>
                    </tr>
                    <tr class="odd gradeX">
                        <th>Total soft injury cases: </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>


                    </tbody>
                </table>
                <table class="table table-striped table-bordered table-hover " style="margin-top: 10px">
                    <thead>
                    <tr>
                        <th rowspan="3"> Disability cases: </th>
                        <th colspan="9" class="text-center">Population (Burundian)</th>
                    </tr>
                    <tr>
                        <th colspan="3">Total as of last reporting period</th>
                        <th colspan="3">*NEW* cases this reporting period</th>
                        <th colspan="3">Cumulative to date (February 2016)</th>
                    </tr>
                    <tr>
                        <th>F</th>
                        <th>M</th>
                        <th>Total</th>
                        <th>F</th>
                        <th>M</th>
                        <th>Total</th>
                        <th>F</th>
                        <th>M</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $totalF=0;
                    $totalM=0;
                    $totalT=0;
                    ?>
                    @if(count($clients )>0)
                        @foreach(\App\Disability::all() as $discategor)
                            <tr class="odd gradeX">
                                <?php
                                $totalF += count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('sex','=','Female')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get());
                                $totalM += count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('sex','=','Male')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get());
                                $totalT += count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get());
                                ?>
                                <td>{{$discategor->category}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('sex','=','Female')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('sex','=','Male')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('sex','=','Female')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('sex','=','Male')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('sex','=','Female')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('sex','=','Male')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                                <td>{{count(\App\Client::where('status','=','disabled')->where('nationality','=','burundian')->where('category_id','=',$discategor->id)->whereBetween('date_registered', $range)->get())}}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tr class="odd gradeX">
                        <th>Total Disability cases: </th>
                        <td>{{$totalF}}</td>
                        <td>{{$totalM}}</td>
                        <td>{{$totalT}}</td>
                        <td>{{$totalF}}</td>
                        <td>{{$totalM}}</td>
                        <td>{{$totalT}}</td>
                        <td>{{$totalF}}</td>
                        <td>{{$totalM}}</td>
                        <td>{{$totalT}}</td>
                    </tr>
                    <tr class="odd gradeX">
                        <th>Total soft injury cases: </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </fieldset>
        </div>
    </div>
@stop