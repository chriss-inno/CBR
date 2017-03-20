@extends('layout.main')
@section('page-title')
    Reports
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

        $('#containerBeneficiaries').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly  Beneficiaries Registration country wise for {{date("Y")}}'
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
                    $series="";
                    foreach (\App\Country::orderBy('country_name','ASC')->get() as $country) {

                        $series .="{";
                        $series .=" name: '".$country->country_name."',";

                        $MonthCount="";
                        $monthData="";
                        for($i=1; $i<= 12; $i++)
                        {
                            $MonthCount.=count(\App\Beneficiary::where('nationality','=',$country->country_name)->where(\DB::raw('Month(date_registration)'),'=',$i)->where(\DB::raw('Year(date_registration)'),'=',date('Y'))->get()).",";
                        }
                        $monthData.=substr($MonthCount,0,strlen($MonthCount)-1);
                        $series .=" data:[".$monthData."]";
                        $series .=" },";

                    }
                    $seriesdata=substr($series,0,strlen($series)-1);

                    ?>

            series: [<?php echo $seriesdata;?>]
        });
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly  Clients Registration country wise for {{date("Y")}}'
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
                    text: 'Number of beneficiaries'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
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
                    $series1="";
                    foreach (\App\Country::orderBy('country_name','ASC')->get() as $country) {

                        $series1 .="{ ";
                        $series1 .=" name: '".$country->country_name."',";

                        $MonthCount="";
                        $monthData="";
                        for($i=1; $i<= 12; $i++)
                        {
                            $MonthCount.=count(\App\Client::where('nationality','=',$country->country_name)->where(\DB::raw('Month(date_registered)'),'=',$i)->where(\DB::raw('Year(date_registered)'),'=',date('Y'))->get()).",";
                        }
                        $monthData.=substr($MonthCount,0,strlen($MonthCount)-1);
                        $series1 .=" data:[".$monthData."]";
                        $series1 .="  },";

                    }
                    $seriesdata1=substr($series1,0,strlen($series1)-1);

                    ?>

            series: [<?php echo $seriesdata1;?>]
        });
        $('#containerPie').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Beneficiaries '
            },
            credits: {
                enabled: false
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            @if(count(\App\Beneficiary::all()) >0)
            <?php
                    $scollection="";
                    $sdata="";
                    foreach (\App\Country::all() as $count)
                    {
                        $seriesdata="{
                    name: '$count->country_name',
                    y: ".count(\App\Beneficiary::where('nationality','=',$count->country_name)->get())."
                      }
                      ";
                        $scollection .= $seriesdata.",";
                    }
                    $sdata=substr($scollection,0,strlen($scollection)-1);
                    ?>
            series: [{
                name: 'Beneficiaries',
                colorByPoint: true,
                data: [<?php echo $sdata;?>]
            }],
            @endif
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
            <a href="{{url('beneficiaries')}}">Beneficiaries</a>
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
                <a href="{{url('reports/beneficiaries/generate')}}" class="btn blue-madison"><i class="fa fa-bar-chart"></i> Generate Reports</a>
                <a href="{{url('reports/beneficiaries')}}" class="btn blue-madison"><i class="fa fa-line-chart"></i> Beneficiaries Reports</a>
            </div>

        </div>

    </div>

    <div class="row widget-row" style="margin-top: 20px">
        <div class="col-md-12">
            <div id="containerBeneficiaries" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
    <div class="row widget-row" style="margin-top: 20px">
        <div class="col-md-6">
            <div id="disabilityChart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
        <div class="col-md-6">
            <div id="SoftInjureChart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>

    </div>
    <div class="row widget-row">
        <div class="col-md-6">
            <div id="BurundianChart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
        <div class="col-md-6">
            <div id="CongoleseChart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
@stop
