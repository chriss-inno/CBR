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

                <li class="nav-item  ">
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
        <li class="nav-item start active open ">
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
    {!! Html::script("assets/global/plugins/fullcalendar/fullcalendar.min.js" ) !!}
    {!! Html::script("assets/global/plugins/jquery-ui/jquery-ui.min.js" ) !!}
@stop
@section('page-scripts-level2')
    {!! Html::script("assets/apps/scripts/calendar.js" ) !!}
@stop
@section('page-head-bar')
    <!-- BEGIN PAGE TITLE -->
    <h3>Welcome
        <small>Registration desk</small>
    </h3>
    <!-- END PAGE TITLE -->
    <!-- BEGIN PAGE TOOLBAR -->
    <div class="page-toolbar">
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
        <div class="col-md-4">
            <!-- BEGIN WIDGET THUMB -->
               <a href="{{url('clients/create')}}" class="btn btn blue btn-block " style="padding-bottom: 30px; padding-top: 30px"><i class="fa fa-user fa-2x"></i> New Client</a>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-4">
            <!-- BEGIN WIDGET THUMB -->
            <a href="{{url('clients')}}" class="btn btn blue btn-block" style="padding-bottom: 30px; padding-top: 30px"><i class="fa fa-search fa-2x"></i> Search Client</a>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-4">
            <!-- BEGIN WIDGET THUMB -->
            <a href="{{url('clients')}}" class="btn btn blue btn-block" style="padding-bottom: 30px; padding-top: 30px"><i class="fa fa-users fa-2x"></i> View all Client</a>
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
