@extends('layout.main')
@section('page-title')
    Inventory
@stop
@section('page-style')
    {!! Html::style("assets/global/plugins/fullcalendar/fullcalendar.css" ) !!}
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
                <span class="selected"></span>
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
        <li class="nav-item start active open">
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
    {!! Html::script("assets/global/plugins/fullcalendar/fullcalendar.min.js" ) !!}
    {!! Html::script("assets/global/plugins/jquery-ui/jquery-ui.min.js" ) !!}
@stop
@section('page-scripts-level2')
    {!! Html::script("assets/apps/scripts/calendar.js" ) !!}
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

    </ul>
@stop
@section('contents')
    <div class="row widget-row">
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <a href="{{url('inventory')}}" class="btn btn blue btn-block" style="padding-bottom: 30px; padding-top: 30px"><i class="fa fa-database fa-2x"></i> Material inventory</a>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <a href="{{url('inventory/disbursement')}}" class="btn btn blue btn-block" style="padding-bottom: 30px; padding-top: 30px"><i class="fa fa-users fa-2x"></i> Material Disbursement</a>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <a href="{{url('inventory/received')}}" class="btn btn blue btn-block" style="padding-bottom: 30px; padding-top: 30px"><i class="fa fa-users fa-2x"></i> Received Items</a>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <a href="{{url('inventory/reports')}}" class="btn btn blue btn-block" style="padding-bottom: 30px; padding-top: 30px"><i class="fa fa-line-chart fa-2x"></i> Inventory reports</a>
            <!-- END WIDGET THUMB -->
        </div>
    </div>

    <div class="row" style="margin-top: 10px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit bordered calendar">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-layers font-green"></i>
                                <span class="caption-subject font-green sbold uppercase">Calendar</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div id="calendar" class="has-toolbar"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
