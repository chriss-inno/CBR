@extends('layout.main')
@section('page-title')
    Client Registration
@stop
@section('page-style')
    {!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
    {!! Html::style("assets/global/plugins/clockface/css/clockface.css") !!}
    {!! Html::style("assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" ) !!}
    {!! Html::style("assets/global/plugins/select2/css/select2.min.css"  ) !!}
    {!! Html::style("assets/global/plugins/select2/css/select2-bootstrap.min.css" ) !!}
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

    {!! Html::script("assets/global/plugins/select2/js/select2.full.min.js"  ) !!}
    {!! Html::script("assets/global/plugins/jquery-validation/js/jquery.validate.min.js"  ) !!}
    {!! Html::script("assets/global/plugins/jquery-validation/js/additional-methods.min.js"  ) !!}
    {!! Html::script("assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" ) !!}
@stop
@section('page-scripts-level2')
    {!! Html::script("assets/pages/scripts/components-date-time-pickers.min.js" ) !!}
    {!! Html::script("assets/pages/scripts/form-wizard.js" ) !!}
    {!! Html::script("assets/pages/scripts/components-editors.min.js"  ) !!}

@stop
@section('custom-scripts')
    {!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
    <script>
        $("#DepartmentFormUN").validate({
            rules: {
                first_name: "required",
                last_name: "required",
                marital_status: "required",
                nationality: "required",
                sex: "required"
            },
            messages: {
                first_name: "Please enter first name",
                last_name: "Please enter last status",
                marital_status: "Please select marital status",
                nationality: "Please select nationality",
                sex: "Please select sex"
            }
        });
    </script>
    <script>

        $("#addRegion").click(function(){
            var modaldis = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modaldis+= '<div class="modal-dialog" style="width:70%;margin-right: 15% ;margin-left: 15%">';
            modaldis+= '<div class="modal-content">';
            modaldis+= '<div class="modal-header">';
            modaldis+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modaldis+= '<span id="myModalLabel" class="caption caption-subject font-blue-sharp bold uppercase" style="text-align: center"><i class="fa fa-plus font-blue-sharp"></i> Add Camps: Camps details</span>';
            modaldis+= '</div>';
            modaldis+= '<div class="modal-body">';
            modaldis+= ' </div>';
            modaldis+= '</div>';
            modaldis+= '</div>';
            $('body').css('overflow','hidden');

            $("body").append(modaldis);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("camps/create") ?>");
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })

        });

        $(".editRecord").click(function(){
            var id1 = $(this).parent().attr('id');
            var modaldis = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modaldis+= '<div class="modal-dialog" style="width:60%;margin-right: 20% ;margin-left: 20%">';
            modaldis+= '<div class="modal-content">';
            modaldis+= '<div class="modal-header">';
            modaldis+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modaldis+= '<span id="myModalLabel" class="caption caption-subject font-blue-sharp bold uppercase" style="text-align: center"><i class="fa fa-edit font-blue-sharp"></i> Update Camps: Camps details</span>';
            modaldis+= '</div>';
            modaldis+= '<div class="modal-body">';
            modaldis+= ' </div>';
            modaldis+= '</div>';
            modaldis+= '</div>';
            $('body').css('overflow','hidden');

            $("body").append(modaldis);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("camps") ?>/"+id1+"/edit");
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
                $.get("<?php echo url('remove/camps') ?>/"+id1,function(data){
                    btn.hide("slow").next("hr").hide("slow");
                });
            });
        });

        $("#region_id").change(function () {
            var id1 = this.value;
            if(id1 != "")
            {
                $.get("<?php echo url('fetch/districts') ?>/"+id1,function(data){
                    $("#district_id").html(data);
                });

            }else{$("#district_id").html("<option value=''>----</option>");}
        });

        $("#camp_id").change(function () {
            var id1 = this.value;
            if(id1 != "")
            {
                $.get("<?php echo url('fetch/centres') ?>/"+id1,function(data){
                    $("#center_id").html(data);
                });

            }else{$("#center_id").html("<option value=''>----</option>");}
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
            <a href="{{url('clients')}}">Clients/Patient</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span class="active">New Client registration</span>
        </li>
    </ul>
@stop
@section('contents')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered" id="form_wizard_1">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-users font-dark"></i>
                        <span class="caption-subject bold uppercase">Client Assessment</span>
                    </div>
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
                <hr/>
                <div class="portlet-body form">
                    {!! Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'PUT','role'=>'form','id'=>'submit_form')) !!}
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="#tab1" data-toggle="tab" class="step">
                                        <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Client Details </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Assessment </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success"> </div>
                            </div>
                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-none">
                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                <div class="tab-pane active" id="tab1">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Clients Details</legend>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <label for="dob">Date registered</label>
                                                    <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                                        <input type="text" class="form-control" name="date_registered" id="date_registered" readonly value="{{$client->date_registered}}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                        @if($errors->first('last_name') !="")
                                                            <span class="error">{{ $errors->first('last_name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-sm-8">
                                            <label for="first_name">File Number</label>
                                            <input type="text" class="form-control" name="file_number" id="file_number" placeholder="Enter file number" value="{{$client->file_number}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First name" value="{{$client->first_name}}">
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last name" value="{{$client->last_name}}">
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <label for="middle_name">Other Name</label>
                                                    <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Other name" value="{{$client->middle_name}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <label for="dob">Date of birth</label>
                                                    <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                                        <input type="text" class="form-control" name="dob" id="dob" readonly value="{{$client->dob}}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <label for="sex">Sex</label>
                                                    <select class="form-control" name="sex" id="sex">
                                                        @if($client->dob != "")
                                                        <option value="{{$client->sex}}">{{$client->sex}}</option>
                                                            @else
                                                            <option value="">--Select--</option>
                                                        @endif
                                                        <option value="Female">Female</option>
                                                        <option value="Male">Male</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <label for="marital_status">Marital Status</label>
                                                    <select class="form-control" name="marital_status" id="marital_status">
                                                        @if($client->marital_status != "")
                                                            <option value="{{$client->marital_status}}">{{$client->marital_status}}</option>
                                                        @else
                                                            <option value="">--Select--</option>
                                                        @endif
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Widow">Widow</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <label>Nationality</label>
                                                    <select name="nationality" class="form-control" id="nationality">
                                                        @if($client->nationality != "")
                                                            <option value="{{$client->nationality}}">{{$client->nationality}}</option>
                                                        @else
                                                            <option value="">--Select--</option>
                                                        @endif
                                                        <option value="">-- select one --</option>
                                                        <option value="afghan">Afghan</option>
                                                        <option value="albanian">Albanian</option>
                                                        <option value="algerian">Algerian</option>
                                                        <option value="american">American</option>
                                                        <option value="andorran">Andorran</option>
                                                        <option value="angolan">Angolan</option>
                                                        <option value="antiguans">Antiguans</option>
                                                        <option value="argentinean">Argentinean</option>
                                                        <option value="armenian">Armenian</option>
                                                        <option value="australian">Australian</option>
                                                        <option value="austrian">Austrian</option>
                                                        <option value="azerbaijani">Azerbaijani</option>
                                                        <option value="bahamian">Bahamian</option>
                                                        <option value="bahraini">Bahraini</option>
                                                        <option value="bangladeshi">Bangladeshi</option>
                                                        <option value="barbadian">Barbadian</option>
                                                        <option value="barbudans">Barbudans</option>
                                                        <option value="batswana">Batswana</option>
                                                        <option value="belarusian">Belarusian</option>
                                                        <option value="belgian">Belgian</option>
                                                        <option value="belizean">Belizean</option>
                                                        <option value="beninese">Beninese</option>
                                                        <option value="bhutanese">Bhutanese</option>
                                                        <option value="bolivian">Bolivian</option>
                                                        <option value="bosnian">Bosnian</option>
                                                        <option value="brazilian">Brazilian</option>
                                                        <option value="british">British</option>
                                                        <option value="bruneian">Bruneian</option>
                                                        <option value="bulgarian">Bulgarian</option>
                                                        <option value="burkinabe">Burkinabe</option>
                                                        <option value="burmese">Burmese</option>
                                                        <option value="burundian">Burundian</option>
                                                        <option value="cambodian">Cambodian</option>
                                                        <option value="cameroonian">Cameroonian</option>
                                                        <option value="canadian">Canadian</option>
                                                        <option value="cape verdean">Cape Verdean</option>
                                                        <option value="central african">Central African</option>
                                                        <option value="chadian">Chadian</option>
                                                        <option value="chilean">Chilean</option>
                                                        <option value="chinese">Chinese</option>
                                                        <option value="colombian">Colombian</option>
                                                        <option value="comoran">Comoran</option>
                                                        <option value="congolese">Congolese</option>
                                                        <option value="costa rican">Costa Rican</option>
                                                        <option value="croatian">Croatian</option>
                                                        <option value="cuban">Cuban</option>
                                                        <option value="cypriot">Cypriot</option>
                                                        <option value="czech">Czech</option>
                                                        <option value="danish">Danish</option>
                                                        <option value="djibouti">Djibouti</option>
                                                        <option value="dominican">Dominican</option>
                                                        <option value="dutch">Dutch</option>
                                                        <option value="east timorese">East Timorese</option>
                                                        <option value="ecuadorean">Ecuadorean</option>
                                                        <option value="egyptian">Egyptian</option>
                                                        <option value="emirian">Emirian</option>
                                                        <option value="equatorial guinean">Equatorial Guinean</option>
                                                        <option value="eritrean">Eritrean</option>
                                                        <option value="estonian">Estonian</option>
                                                        <option value="ethiopian">Ethiopian</option>
                                                        <option value="fijian">Fijian</option>
                                                        <option value="filipino">Filipino</option>
                                                        <option value="finnish">Finnish</option>
                                                        <option value="french">French</option>
                                                        <option value="gabonese">Gabonese</option>
                                                        <option value="gambian">Gambian</option>
                                                        <option value="georgian">Georgian</option>
                                                        <option value="german">German</option>
                                                        <option value="ghanaian">Ghanaian</option>
                                                        <option value="greek">Greek</option>
                                                        <option value="grenadian">Grenadian</option>
                                                        <option value="guatemalan">Guatemalan</option>
                                                        <option value="guinea-bissauan">Guinea-Bissauan</option>
                                                        <option value="guinean">Guinean</option>
                                                        <option value="guyanese">Guyanese</option>
                                                        <option value="haitian">Haitian</option>
                                                        <option value="herzegovinian">Herzegovinian</option>
                                                        <option value="honduran">Honduran</option>
                                                        <option value="hungarian">Hungarian</option>
                                                        <option value="icelander">Icelander</option>
                                                        <option value="indian">Indian</option>
                                                        <option value="indonesian">Indonesian</option>
                                                        <option value="iranian">Iranian</option>
                                                        <option value="iraqi">Iraqi</option>
                                                        <option value="irish">Irish</option>
                                                        <option value="israeli">Israeli</option>
                                                        <option value="italian">Italian</option>
                                                        <option value="ivorian">Ivorian</option>
                                                        <option value="jamaican">Jamaican</option>
                                                        <option value="japanese">Japanese</option>
                                                        <option value="jordanian">Jordanian</option>
                                                        <option value="kazakhstani">Kazakhstani</option>
                                                        <option value="kenyan">Kenyan</option>
                                                        <option value="kittian and nevisian">Kittian and Nevisian</option>
                                                        <option value="kuwaiti">Kuwaiti</option>
                                                        <option value="kyrgyz">Kyrgyz</option>
                                                        <option value="laotian">Laotian</option>
                                                        <option value="latvian">Latvian</option>
                                                        <option value="lebanese">Lebanese</option>
                                                        <option value="liberian">Liberian</option>
                                                        <option value="libyan">Libyan</option>
                                                        <option value="liechtensteiner">Liechtensteiner</option>
                                                        <option value="lithuanian">Lithuanian</option>
                                                        <option value="luxembourger">Luxembourger</option>
                                                        <option value="macedonian">Macedonian</option>
                                                        <option value="malagasy">Malagasy</option>
                                                        <option value="malawian">Malawian</option>
                                                        <option value="malaysian">Malaysian</option>
                                                        <option value="maldivan">Maldivan</option>
                                                        <option value="malian">Malian</option>
                                                        <option value="maltese">Maltese</option>
                                                        <option value="marshallese">Marshallese</option>
                                                        <option value="mauritanian">Mauritanian</option>
                                                        <option value="mauritian">Mauritian</option>
                                                        <option value="mexican">Mexican</option>
                                                        <option value="micronesian">Micronesian</option>
                                                        <option value="moldovan">Moldovan</option>
                                                        <option value="monacan">Monacan</option>
                                                        <option value="mongolian">Mongolian</option>
                                                        <option value="moroccan">Moroccan</option>
                                                        <option value="mosotho">Mosotho</option>
                                                        <option value="motswana">Motswana</option>
                                                        <option value="mozambican">Mozambican</option>
                                                        <option value="namibian">Namibian</option>
                                                        <option value="nauruan">Nauruan</option>
                                                        <option value="nepalese">Nepalese</option>
                                                        <option value="new zealander">New Zealander</option>
                                                        <option value="ni-vanuatu">Ni-Vanuatu</option>
                                                        <option value="nicaraguan">Nicaraguan</option>
                                                        <option value="nigerien">Nigerien</option>
                                                        <option value="north korean">North Korean</option>
                                                        <option value="northern irish">Northern Irish</option>
                                                        <option value="norwegian">Norwegian</option>
                                                        <option value="omani">Omani</option>
                                                        <option value="pakistani">Pakistani</option>
                                                        <option value="palauan">Palauan</option>
                                                        <option value="panamanian">Panamanian</option>
                                                        <option value="papua new guinean">Papua New Guinean</option>
                                                        <option value="paraguayan">Paraguayan</option>
                                                        <option value="peruvian">Peruvian</option>
                                                        <option value="polish">Polish</option>
                                                        <option value="portuguese">Portuguese</option>
                                                        <option value="qatari">Qatari</option>
                                                        <option value="romanian">Romanian</option>
                                                        <option value="russian">Russian</option>
                                                        <option value="rwandan">Rwandan</option>
                                                        <option value="saint lucian">Saint Lucian</option>
                                                        <option value="salvadoran">Salvadoran</option>
                                                        <option value="samoan">Samoan</option>
                                                        <option value="san marinese">San Marinese</option>
                                                        <option value="sao tomean">Sao Tomean</option>
                                                        <option value="saudi">Saudi</option>
                                                        <option value="scottish">Scottish</option>
                                                        <option value="senegalese">Senegalese</option>
                                                        <option value="serbian">Serbian</option>
                                                        <option value="seychellois">Seychellois</option>
                                                        <option value="sierra leonean">Sierra Leonean</option>
                                                        <option value="singaporean">Singaporean</option>
                                                        <option value="slovakian">Slovakian</option>
                                                        <option value="slovenian">Slovenian</option>
                                                        <option value="solomon islander">Solomon Islander</option>
                                                        <option value="somali">Somali</option>
                                                        <option value="south african">South African</option>
                                                        <option value="south korean">South Korean</option>
                                                        <option value="spanish">Spanish</option>
                                                        <option value="sri lankan">Sri Lankan</option>
                                                        <option value="sudanese">Sudanese</option>
                                                        <option value="surinamer">Surinamer</option>
                                                        <option value="swazi">Swazi</option>
                                                        <option value="swedish">Swedish</option>
                                                        <option value="swiss">Swiss</option>
                                                        <option value="syrian">Syrian</option>
                                                        <option value="taiwanese">Taiwanese</option>
                                                        <option value="tajik">Tajik</option>
                                                        <option value="tanzanian" selected>Tanzanian</option>
                                                        <option value="thai">Thai</option>
                                                        <option value="togolese">Togolese</option>
                                                        <option value="tongan">Tongan</option>
                                                        <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                                        <option value="tunisian">Tunisian</option>
                                                        <option value="turkish">Turkish</option>
                                                        <option value="tuvaluan">Tuvaluan</option>
                                                        <option value="ugandan">Ugandan</option>
                                                        <option value="ukrainian">Ukrainian</option>
                                                        <option value="uruguayan">Uruguayan</option>
                                                        <option value="uzbekistani">Uzbekistani</option>
                                                        <option value="venezuelan">Venezuelan</option>
                                                        <option value="vietnamese">Vietnamese</option>
                                                        <option value="welsh">Welsh</option>
                                                        <option value="yemenite">Yemenite</option>
                                                        <option value="zambian">Zambian</option>
                                                        <option value="zimbabwean">Zimbabwean</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="phone">Phone/Tel</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone/Tel" value="{{$client->phone}}">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Location/Settlement Details</legend>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                    <label>Camp Name</label>
                                                    <select class="form-control" name="camp_id" id="camp_id">
                                                        @if($client->camp_id != "" && is_object($client->camp) && $client->camp != null)
                                                            <option value="{{$client->camp->id}}">{{$client->camp->camp_name}}</option>
                                                        @else
                                                            <option value="">--Select--</option>
                                                        @endif
                                                        @foreach(\App\Camp::orderBy('camp_name','ASC')->get() as $camp)
                                                            <option value="{{$camp->id}}">{{$camp->camp_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                    <label>Service Center</label>
                                                    <select class="form-control" name="center_id" id="center_id">
                                                        @if($client->center_id != "" && is_object($client->centre) && $client->centre != null)
                                                            <option value="{{$client->centre->id}}">{{$client->centre->centre_name}}</option>
                                                        @else
                                                            <option value="">--Select--</option>
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                    <label>Region Name</label>
                                                    <select class="form-control" name="region_id" id="region_id">
                                                        @if($client->region_id != "" && is_object($client->region) && $client->region != null)
                                                            <option value="{{$client->region->id}}">{{$client->region->region_name}}</option>
                                                        @else
                                                            <option value="">--Select--</option>
                                                        @endif
                                                        @foreach(\App\Region::orderBy('region_name','ASC')->get() as $region)
                                                            <option value="{{$region->id}}">{{$region->region_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                    <label>District</label>
                                                    <select class="form-control" name="district_id" id="district_id">
                                                        @if($client->district_id != "" && is_object($client->district) && $client->district != null)
                                                            <option value="{{$client->district->id}}">{{$client->district->district_name}}</option>
                                                        @else
                                                            <option value="">--Select--</option>
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" name="street" id="street"  value="{{$client->street}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="ward">Ward</label>
                                            <input type="text" class="form-control" name="ward" id="ward" value="{{$client->ward}}" >
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="wysihtml5 form-control" name="address" rows="4" id="address">{{$client->address}}</textarea>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    @if(is_object($client->assessment) && $client->assessment !=null )
                                        <input type="hidden" name="assessment_id" value="{{$client->assessment->id}}">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Assessment details</legend>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="dob">Date of first consultation</label>
                                                    <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                                        <input type="text" class="form-control" name="consultation_date" id="consultation_date" readonly value="{{$client->assessment->consultation_date}}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="sex">Consultation No</label>
                                                    <input type="text" class="form-control" name="consultation_no" id="consultation_no" value="{{$client->assessment->consultation_no}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group>">
                                            <label for="diagnosis">Diagnosis</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="diagnosis" id="diagnosis" >{{$client->assessment->diagnosis}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="medical_history">Medical History</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="medical_history" id="medical_history" >{{$client->assessment->medical_history}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="social_history">Social History</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="social_history" id="social_history" >{{$client->assessment->diagnosis}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="employment">School/employment</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="employment" id="employment" >{{$client->assessment->diagnosis}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="skin_condition">Skin condition</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="skin_condition" id="skin_condition" >{{$client->assessment->skin_condition}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="daily_activities">Activities of daily living</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="daily_activities" id="daily_activities" >{{$client->assessment->daily_activities}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="joint_assessment">Joint assessment</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="joint_assessment" id="joint_assessment" >{{$client->assessment->joint_assessment}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="muscle_assessment">Muscle assessment</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="muscle_assessment" id="muscle_assessment" >{{$client->assessment->muscle_assessment}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="functional_assessment">Functional assessment</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="functional_assessment" id="functional_assessment" >{{$client->assessment->functional_assessment}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="problem_list">Problem list</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="problem_list" id="problem_list" >{{$client->assessment->problem_list}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="treatment">Treatment</label>
                                            <textarea class="wysihtml5 form-control" rows="6" name="treatment" id="treatment" >{{$client->assessment->treatment}}</textarea>
                                        </div>
                                        <div class="form-group>">
                                            <label for="remarks">Remarks</label>
                                            <input type="text" class="form-control" name="remarks" id="remarks" value="{{$client->assessment->remarks}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Client Assessment Status</label>
                                            <select  class="form-control" name="status" id="status">
                                                @if($client->status != "")
                                                    <option value="{{$client->status}}">{{$client->status}}</option>
                                                @else
                                                    <option value="">--Select--</option>
                                                @endif
                                                <option value="Disabled">Disabled</option>
                                                <option value="Soft injury">Soft injury</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="examiner_name">Examiner Name</label>
                                                    <input type="text" class="form-control" name="examiner_name" id="examiner_name" value="{{$client->assessment->examiner_name}}">
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="examiner_title">Examiner Title</label>
                                                    <input type="text" class="form-control" name="examiner_title" id="examiner_title" value="{{$client->assessment->examiner_name}}">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                        @else
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Assessment details</legend>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="dob">Date of first consultation</label>
                                                        <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                                            <input type="text" class="form-control" name="consultation_date" id="consultation_date" readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="sex">Consultation No</label>
                                                        <input type="text" class="form-control" name="consultation_no" id="consultation_no">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group>">
                                                <label for="diagnosis">Diagnosis</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="diagnosis" id="diagnosis" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="medical_history">Medical History</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="medical_history" id="medical_history" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="social_history">Social History</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="social_history" id="social_history" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="employment">School/employment</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="employment" id="employment" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="diagnosis">Diagnosis</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="diagnosis" id="diagnosis" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="skin_condition">Skin condition</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="skin_condition" id="skin_condition" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="daily_activities">Activities of daily living</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="daily_activities" id="daily_activities" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="joint_assessment">Joint assessment</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="joint_assessment" id="joint_assessment" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="muscle_assessment">Muscle assessment</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="muscle_assessment" id="muscle_assessment" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="functional_assessment">Functional assessment</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="functional_assessment" id="functional_assessment" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="problem_list">Problem list</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="problem_list" id="problem_list" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="treatment">Treatment</label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="treatment" id="treatment" ></textarea>
                                            </div>
                                            <div class="form-group>">
                                                <label for="remarks">Remarks</label>
                                                <input type="text" class="form-control" name="remarks" id="remarks">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Client Assessment Status</label>
                                                <select  class="form-control" name="status" id="status">
                                                    <option value="">------</option>
                                                    <option value="Disabled">Disabled</option>
                                                    <option value="Soft injury">Soft injury</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="examiner_name">Examiner Name</label>
                                                        <input type="text" class="form-control" name="examiner_name" id="examiner_name">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="examiner_title">Examiner Title</label>
                                                        <input type="text" class="form-control" name="examiner_title" id="examiner_title">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <a href="javascript:;" class="btn default button-previous">
                                        <i class="fa fa-angle-left"></i> Back </a>
                                    <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                    <input type="submit" class="btn green button-submit" value="Submit">
                                </div>
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
