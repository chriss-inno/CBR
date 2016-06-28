@extends('layout.main')
@section('page-title')
    Welcome
    @stop
@section('page-style')
    {!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" ) !!}
    {!! Html::style("assets/global/plugins/morris/morris.css" ) !!}
    {!! Html::style("assets/global/plugins/fullcalendar/fullcalendar.min.css" ) !!}
    {!! Html::style("assets/global/plugins/jqvmap/jqvmap/jqvmap.css" ) !!}
    @stop
@section('menu-sidebar')
    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="nav-item start active open">
            <a href="{{url('home')}}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="selected"></span>
            </a>

        </li>
        <li class="nav-item">
            <a href="{{url('registration/desk')}}" class="nav-link nav-toggle">
                <i class="icon-users"></i>
                <span class="title">Registration Desk</span>
            </a>
        </li>
        <li class="heading">
            <h3 class="uppercase">Medical rehabilitation </h3>
        </li>
        <li class="nav-item">
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
    {!! Html::script("assets/global/plugins/moment.min.js" ) !!}
    {!! Html::script("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" ) !!}
    {!! Html::script("assets/global/plugins/morris/morris.min.js" ) !!}
    {!! Html::script("assets/global/plugins/morris/raphael-min.js" ) !!}
    {!! Html::script("assets/global/plugins/counterup/jquery.waypoints.min.js" ) !!}
    {!! Html::script("assets/global/plugins/counterup/jquery.counterup.min.js" ) !!}
    {!! Html::script("assets/global/plugins/amcharts/amcharts/amcharts.js" ) !!}
    {!! Html::script("assets/global/plugins/amcharts/amcharts/serial.js" ) !!}
    {!! Html::script("assets/global/plugins/amcharts/amcharts/pie.js" ) !!}
    {!! Html::script("assets/global/plugins/amcharts/amcharts/radar.js" ) !!}
    {!! Html::script("assets/global/plugins/amcharts/amcharts/themes/light.js" ) !!}
    {!! Html::script("assets/global/plugins/amcharts/amcharts/themes/patterns.js" ) !!}
    {!! Html::script("assets/global/plugins/amcharts/amcharts/themes/chalk.js" ) !!}
    {!! Html::script("assets/global/plugins/amcharts/ammap/ammap.js" ) !!}
    {!! Html::script("assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" ) !!}
    {!! Html::script("assets/global/plugins/amcharts/amstockcharts/amstock.js" ) !!}
    {!! Html::script("assets/global/plugins/fullcalendar/fullcalendar.min.js" ) !!}
    {!! Html::script("assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" ) !!}
    {!! Html::script("assets/global/plugins/flot/jquery.flot.min.js" ) !!}
    {!! Html::script("assets/global/plugins/flot/jquery.flot.resize.min.js" ) !!}
    {!! Html::script("assets/global/plugins/flot/jquery.flot.categories.min.js" ) !!}
    {!! Html::script("assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" ) !!}
    {!! Html::script("assets/global/plugins/jquery.sparkline.min.js" ) !!}
    {!! Html::script("assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" ) !!}
    {!! Html::script("assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" ) !!}
    {!! Html::script("assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" ) !!}
    {!! Html::script("assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" ) !!}
    {!! Html::script("assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" ) !!}
    {!! Html::script("assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" ) !!}
    {!! Html::script("assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" ) !!}
    @stop
@section('page-scripts-level2')
    {!! Html::script("assets/pages/scripts/dashboard.min.js" ) !!}
    {!! Html::script("assets/highcharts/js/highcharts.js") !!}
    {!! Html::script("assets/highcharts/js/modules/exporting.js") !!}
    @stop
@section('custom-scripts')
    <script>

        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Average Clients Registration for {{date("Y")}}'
            },
            credits: {
                enabled: false
            },

            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of clients'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            <?php
                    $MonthCount="";
                    $monthData="";
                    for($i=1; $i<= 12; $i++)
                    {
                        $MonthCount.=count(\App\Client::where(\DB::raw('Month(created_at)'),'=',$i)->where(\DB::raw('Year(created_at)'),'=',date('Y'))->where('is_disabled','=','Yes')->get()).",";
                    }
                    $monthData.=substr($MonthCount,0,strlen($MonthCount)-1);
                    ?>
                    <?php
                    $MonthCount2="";
                    $monthData2="";
                    for($i=1; $i<= 12; $i++)
                    {
                        $MonthCount2.=count(\App\Client::where(\DB::raw('Month(created_at)'),'=',$i)->where(\DB::raw('Year(created_at)'),'=',date('Y'))->where('is_psn','=','Yes')->get()).",";
                    }
                    $monthData2.=substr($MonthCount2,0,strlen($MonthCount2)-1);
                    ?>
                    <?php
                    $MonthCount3="";
                    $monthData3="";
                    for($i=1; $i<= 12; $i++)
                    {
                        $MonthCount3.=count(\App\Client::where(\DB::raw('Month(created_at)'),'=',$i)->where(\DB::raw('Year(created_at)'),'=',date('Y'))->get()).",";
                    }
                    $monthData3.=substr($MonthCount3,0,strlen($MonthCount3)-1);
                    ?>
            series: [{
                name: 'Disabled',
                data:[<?php echo $monthData;?>]

            }, {
                name: 'PSN',
                data: [<?php echo $monthData2;?>]

            },
                {
                    name: 'Disabled and PSN',
                    data: [<?php echo $monthData3;?>]

                }]
        });

    </script>
@stop
@section('page-head-bar')
        <!-- BEGIN PAGE TITLE -->
            <h3>Welcome
                <small>dashboard & statistics</small>
            </h3>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->
        <div class="page-toolbar">
            <div  class="pull-right tooltips btn btn-fit-height green">
                <i class="icon-calendar"></i>&nbsp;
                <span class="thin uppercase hidden-xs">{{date("F d, Y")}}</span>&nbsp;

            </div>

        </div>
        <!-- END PAGE TOOLBAR -->
    @stop
@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('home')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span class="active">Dashboard</span>
        </li>
    </ul>
    @stop
@section('contents')
    <div class="row widget-row">
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">Registered Clients</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-bulb"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{count(\App\Client::all())}}">0</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">Clients with disabilities</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{count(\App\Client::where('is_disabled','=','Yes')->get())}}">0</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">People with Special Needs</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{count(\App\Client::where('is_psn','=','Yes')->get())}}">0</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">Available Items/Materials</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{count(\App\ItemsInventory::all())}}">0</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
    </div>
    <div class="row widget-row">
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    @stop
