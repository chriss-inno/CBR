@extends('layout.main')
@section('page-title')
    Clients Referral request
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

        <li class="nav-item ">
            <a href="{{url('assessment/roam')}}" class="nav-link nav-toggle">
                <i class="fa fa-building-o fa-2x"></i>
                <span class="title">Assessment roam</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item  start active open">
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
            var modaldis = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modaldis+= '<div class="modal-dialog" style="width:70%;margin-right: 15% ;margin-left: 15%">';
            modaldis+= '<div class="modal-content">';
            modaldis+= '<div class="modal-header">';
            modaldis+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modaldis+= '<span id="myModalLabel" class="caption caption-subject font-blue-sharp bold uppercase" style="text-align: center"><i class="fa fa-plus font-blue-sharp"></i>Rehabilitation register</span>';
            modaldis+= '</div>';
            modaldis+= '<div class="modal-body">';
            modaldis+= ' </div>';
            modaldis+= '</div>';
            modaldis+= '</div>';
            $('body').css('overflow','hidden');

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
            var modaldis = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
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
            $('body').css('overflow','hidden');

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
@stop
@section('breadcrumb')
    <ul class="page-breadcrumb ">
        <li>
            <a href="{{url('home')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('rehabilitation/services')}}">Rehabilitation services </a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span class="active">Rehabilitation register </span>
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
                        <span class="caption-subject bold uppercase">Rehabilitation register </span>
                    </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-8 pull-right">
                            <div class="btn-group pull-right">
                                <a href="#" class="addRecord btn blue-madison"><i class="fa fa-file"></i> Register New</a>
                                <a href="{{url('rehabilitation/services')}}" class="btn blue-madison"><i class="fa fa-server"></i> Registration history</a>
                                <a href="{{url('excel/rehabilitation/services')}}" class="btn blue-madison"><i class="fa fa-database"></i> Import data</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="portlet-body" >
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                    <tr>
                        <th> SNO </th>
                        <th> File Number</th>
                        <th> Client Full Name </th>
                        <th> Diagnosis </th>
                        <th> Attending date </th>
                        <th class="text-center"> Action </th>
                    </tr>
                    </thead>
                    <tbody id="clientsSearchResults">
                    <?php $count=1;?>
                    @if(count($attendances )>0)
                        @foreach($attendances as $att)
                            <tr class="odd gradeX">
                                <td> {{$count++}} </td>
                                <td>
                                    <?php echo $att->file_no; ?>
                                </td>
                                <td>
                                    @if(is_object($att->client) && $att->client != null)
                                        {{$att->client->first_name ." ".$att->client->last_name	}}
                                    @endif
                                </td>
                                <td>
                                    <?php echo $att->diagnosis; ?>
                                </td>
                                <td>
                                    <?php echo $att->attendance_date; ?>
                                </td>
                                <td class="text-center" id="{{$att->id}}">
                                    <a href="#" class="editRecord"> <i class="fa fa-edit "></i> Edit </a>
                                    <a href="#" class="deleteRecord"> <i class="fa fa-trash text-danger "></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif


                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    </div>
@stop