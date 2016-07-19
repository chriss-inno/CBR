@extends('layout.main')
@section('page-title')
    Material Support
@stop
@section('page-style')
    {!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" ) !!}
    {!! Html::style("assets/global/plugins/morris/morris.css" ) !!}
    {!! Html::style("assets/global/plugins/fullcalendar/fullcalendar.min.css" ) !!}
    {!! Html::style("assets/global/plugins/jqvmap/jqvmap/jqvmap.css" ) !!}
@stop
@section('menu-sidebar')
    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="nav-item ">
            <a href="{{url('home')}}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Home</span>

            </a>

        </li>

        <li class="nav-item ">
            <a href="{{url('assessment/roam')}}" class="nav-link nav-toggle">
                <i class="fa fa-building-o fa-2x"></i>
                <span class="title">Assessment roam</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-puzzle"></i>
                <span class="title"> Rehabilitation services </span>
                <span class="arrow"></span>
                <span class="selected"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item active ">
                    <a href="{{url('rehabilitation/services')}}" class="nav-link ">
                        <span class="title">Rehabilitation register </span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{url('rehabilitation/services/progress')}}" class="nav-link ">
                        <span class="title">Progress monitoring  </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="{{url('orthopedic/services')}}" class="nav-link nav-toggle">
                <i class="fa fa-cogs fa-2x"></i>
                <span class="title">Orthopedic services</span>

            </a>

        </li>
        <li class="nav-item  ">
            <a href="{{url('beneficiaries')}}" class="nav-link nav-toggle">
                <i class="fa fa-users fa-2x"></i>
                <span class="title">Beneficiaries</span>

            </a>

        </li>
        <li class="nav-item  ">
            <a href="{{url('social/needs')}}" class="nav-link nav-toggle">
                <i class="fa fa-users fa-2x"></i>
                <span class="title">Social needs/Support</span>

            </a>

        </li>
        <li class="nav-item active">
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
                <li class="nav-item start active open ">
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
                text: 'Monthly Average Item disbursements for {{date("Y")}}'
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
                    text: 'Items'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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
                        $MonthCount.=count(\App\ItemsDisbursement::where(\DB::raw('Month(created_at)'),'=',$i)->where(\DB::raw('Year(created_at)'),'=',date('Y'))->get()).",";
                    }
                    $monthData.=substr($MonthCount,0,strlen($MonthCount)-1);
                    ?>
            series: [{
                name: 'Items',
                data: [<?php echo $monthData;?>]

            }]
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
            <span class="active">Inventory</span>
        </li>
        <li>
            <span class="active">Reports</span>
        </li>

    </ul>
@stop
@section('contents')
    <div class="row widget-row" style="margin-top: 20px">
        <div class="col-md-9">
         <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
         <div class="col-md-3">
             <div class="row">
                 <div class="col-md-11">
                 <a href="#" class="btn btn-primary btn-block"><i class="fa fa-users" > </i> Prepare list of beneficiaries</a>
                 </div>
             </div>
             <div class="row" style="margin-top: 10px">
                 <div class="col-md-11">
                     <a href="#" class="btn btn-primary btn-block"><i class="fa fa-server" > </i> Materials Distribution</a>
                 </div>
             </div>
             <div class="row" style="margin-top: 10px">
                 <div class="col-md-11">
                     <a href="#" class="btn btn-primary btn-block text-left"><i class="fa fa-server" > </i> Import data</a>
                 </div>
             </div>
             <div class="row" style="margin-top: 10px">
                 <div class="col-md-11">
                     <a href="#" class="btn btn-primary btn-block"><i class="fa fa-server" > </i> Reports</a>
                 </div>
             </div>

             <div class="row" style="margin-top: 30px">
                 <div class="col-md-11">
                 {!! Form::open() !!}
                  <div class="form-group">
                      <input type="text" name="search_no" id="search_no" placeholder="Enter Progress number" class="form-control">
                  </div>
                 <div class="form-group">
                      <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                  </div>

                 {!! Form::close() !!}
                 </div>
             </div>

         </div>
    </div>
@stop
