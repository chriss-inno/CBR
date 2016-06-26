<!-- BEGIN SAMPLE FORM PORTLET-->
@extends('layout.main')
@section('page-title')
Organization setup
@stop
@section('page-style')
    {!! Html::style("assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" ) !!}
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
                <li class="nav-item ">
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
        <li class="nav-item start active open ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title"> General Settings</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item active ">
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

    {!! Html::script("assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" ) !!}
    {!! Html::script("assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"  ) !!}
    {!! Html::script("assets/global/plugins/ckeditor/ckeditor.js" ) !!}
@stop
@section('page-scripts-level2')
    {!! Html::script("assets/pages/scripts/components-editors.js"  ) !!}

@stop
@section('custom-scripts')
    {!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
    <script>
        $("#DepartmentFormUN").validate({
            rules: {
                organization_name: "required"
            },
            messages: {
                organization_name: "Please enter organization_name"
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
            <span class="active">Organization setup</span>
        </li>
    </ul>
@stop
@section('contents')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

            <div class="portlet-body form">
                @if(count($sitesetup) >0 && $sitesetup != null)
                {!! Form::open(array('url'=>'setting/organization/edit','role'=>'form','id'=>'DepartmentFormUN')) !!}
                <div class="form-body">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Organization Details</legend>
                        <div class="form-group">
                            <label for="first_name">Organization Name</label>
                            <input type="text" class="form-control" name="organization_name" id="organization_name" value="{{$sitesetup->organization_name}}" >
                        </div>
                        <div class="form-group">
                            <label for="last_name">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$sitesetup->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Application Name</label>
                            <input type="text" class="form-control" name="app_name" id="app_name" value="{{$sitesetup->app_name}}">
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Tel</label>
                            <input type="text" class="form-control" name="tel" id="tel" value="{{$sitesetup->tel}}">
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Fax</label>
                            <input type="text" class="form-control" name="fax" id="fax" value="{{$sitesetup->fax}}" >
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{$sitesetup->email}}" >
                        </div>

                        <div class="form-group">
                            <label for="middle_name">Main Contact person</label>
                            <input type="text" class="form-control" name="contact_person" id="contact_person"  value="{{$sitesetup->contact_person}}">
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Website</label>
                            <input type="text" class="form-control" name="website" id="website" value="{{$sitesetup->website}}" >
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Address</label>
                            <textarea  class="wysihtml5 form-control" name="address" id="address" >{{$sitesetup->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Profile</label>
                            <textarea  class="wysihtml5 form-control" rows="10" name="profile" id="profile" >{{$sitesetup->profile}}</textarea>
                        </div>

                    </fieldset>
                    <div class="form-actions right">
                        <div class="col-md-3 col-sm-3 pull-right">
                            <input type="hidden" name="id" id="id" value="{{$sitesetup->id}}">
                            <button type="submit" class="btn blue btn-block"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
                    @else
                    {!! Form::open(array('url'=>'setting/organization/create','role'=>'form','id'=>'DepartmentFormUN')) !!}
                    <div class="form-body">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Organization Details</legend>
                            <div class="form-group">
                                <label for="first_name">Organization Name</label>
                                <input type="text" class="form-control" name="organization_name" id="organization_name" >
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Application Name</label>
                                <input type="text" class="form-control" name="app_name" id="app_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" >
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Tel</label>
                                <input type="text" class="form-control" name="tel" id="tel" >
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Fax</label>
                                <input type="text" class="form-control" name="fax" id="fax" >
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Email</label>
                                <input type="text" class="form-control" name="email" id="email" >
                            </div>

                            <div class="form-group">
                                <label for="middle_name">Main Contact person</label>
                                <input type="text" class="form-control" name="contact_person" id="contact_person" >
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Website</label>
                                <input type="text" class="form-control" name="website" id="website" >
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Address</label>
                                <textarea  class="wysihtml5 form-control" name="address" id="address" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Profile</label>
                                <textarea  class="wysihtml5 form-control" rows="10" name="profile" id="profile" ></textarea>
                            </div>

                        </fieldset>

                        <div class="form-actions right">
                            <div class="col-md-3 col-sm-3 pull-right">

                                <button type="submit" class="btn blue btn-block"><i class="fa fa-save"></i> Submit</button>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                @endif
            </div>
        </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->

    </div>
    </div>
@stop
