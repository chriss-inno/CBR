@extends('layout.main')
@section('page-title')
    Item inventories
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
    <script>
        $(".addRegion").click(function(){
            var modaldis = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modaldis+= '<div class="modal-dialog" style="width:70%;margin-right: 15% ;margin-left: 15%">';
            modaldis+= '<div class="modal-content">';
            modaldis+= '<div class="modal-header">';
            modaldis+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modaldis+= '<span id="myModalLabel" class="caption caption-subject font-blue-sharp bold uppercase" style="text-align: center"><i class="fa fa-plus font-blue-sharp"></i> Add Item</span>';
            modaldis+= '</div>';
            modaldis+= '<div class="modal-body">';
            modaldis+= ' </div>';
            modaldis+= '</div>';
            modaldis+= '</div>';
            $('body').css('overflow','hidden');

            $("body").append(modaldis);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("inventory/create") ?>");
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })

        });
        $(".showImport").click(function(){
            var modaldis = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modaldis+= '<div class="modal-dialog" style="width:70%;margin-right: 15% ;margin-left: 15%">';
            modaldis+= '<div class="modal-content">';
            modaldis+= '<div class="modal-header">';
            modaldis+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modaldis+= '<span id="myModalLabel" class="caption caption-subject font-blue-sharp bold uppercase" style="text-align: center"><i class="fa fa-plus font-blue-sharp"></i> Add Item</span>';
            modaldis+= '</div>';
            modaldis+= '<div class="modal-body">';
            modaldis+= ' </div>';
            modaldis+= '</div>';
            modaldis+= '</div>';
            $('body').css('overflow','hidden');

            $("body").append(modaldis);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("inventory/import") ?>");
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
            modaldis+= '<span id="myModalLabel" class="caption caption-subject font-blue-sharp bold uppercase" style="text-align: center"><i class="fa fa-edit font-blue-sharp"></i> Update item details</span>';
            modaldis+= '</div>';
            modaldis+= '<div class="modal-body">';
            modaldis+= ' </div>';
            modaldis+= '</div>';
            modaldis+= '</div>';
            $('body').css('overflow','hidden');

            $("body").append(modaldis);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("inventory/edit") ?>/"+id1);
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
                $.get("<?php echo url('inventory/remove') ?>/"+id1,function(data){
                    btn.hide("slow").next("hr").hide("slow");
                });
            });
        });
    </script>
    <!-- END SAMPLE FORM PORTLET-->
    {!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
    <script>

        $("#DepartmentFormUN").validate({
            rules: {
                item_name: "required",
                status: "required",
                quantity: "required"
            },
            messages: {
                item_name: "Please enter item name",
                status: "Please select status",
                quantity: "Please enter quantity"
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
            <a href="#">Inventory</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span class="active">Items</span>
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
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Manage Inventory</span>
                    </div>
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-8 pull-right">
                                <div class="btn-group pull-right">
                                    <a href="#" class="addRegion btn blue-madison"> <i class="fa fa-plus"></i> Add New Item</a>
                                    <a href="{{url('inventory')}}" class="btn blue-madison"><i class="fa fa-server"></i> Item list</a>
                                    <a href="{{url('inventory/categories')}}" class="btn blue-madison"><i class="fa fa-server"></i> Inventory Categories</a>
                                    <a href="#" class="showImport btn blue-madison"><i class="fa fa-download"></i> Import Items</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="portlet-body">
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'inventory/import','role'=>'form','id'=>'DepartmentFormUN','files'=>true)) !!}
        <div class="form-body">
            <div class="form-group">
                <label>Import Items from MS Excel <a href={{asset("assets/templates/item_import_template.xls")}}>Download template here</a> </label>
                <input TYPE="file" class="form-control" name="inventory_file" id="inventory_file">
            </div>
            <hr/>
            <div class="row text-center">
                <div class="col-md-4 col-sm-4">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Import </button>
                </div>

            </div>

        </div>

        {!! Form::close() !!}
    </div>
</div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@stop