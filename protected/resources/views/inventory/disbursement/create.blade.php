{!! Html::style("assets/global/plugins/datatables/datatables.min.css" ) !!}
{!! Html::style("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
{!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/clockface/css/clockface.css" ) !!}
{!! Html::script("assets/tinymce/js/tinymce/tinymce.min.js") !!}
<script>
    tinymce.init({ selector:'textarea' });
    var TableDatatablesManaged = function () {

        var initTable1 = function () {

            var table = $('#clientSearchResultsTable');

            // begin first table
            table.dataTable({

                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ records",
                    "infoEmpty": "No records found",
                    "infoFiltered": "(filtered1 from _MAX_ total records)",
                    "lengthMenu": "Show _MENU_",
                    "search": "Search:",
                    "zeroRecords": "No matching records found",
                    "paginate": {
                        "previous":"Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },

                // Or you can use remote translation file
                //"language": {
                //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
                //},

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
                // So when dropdowns used the scrollable div should be removed.
                //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

                "columnDefs": [ {
                    "targets": 0,
                    "orderable": false,
                    "searchable": false
                }],

                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5,
                "pagingType": "bootstrap_full_number",
                "columnDefs": [{  // set default column settings
                    'orderable': false,
                    'targets': [0]
                }, {
                    "searchable": false,
                    "targets": [0]
                }],
                "scrollX": false,
                "order":false
                // set first column as a default sort by asc
                ,
                //"fnDrawCallback": function (oSettings) {}
            });

            var tableWrapper = jQuery('#sample_1_wrapper');

            table.find('.group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).prop("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).prop("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });
            });

            table.on('change', 'tbody tr .checkboxes', function () {
                $(this).parents('tr').toggleClass("active");
            });
        }

        return {

            //main function to initiate the module
            init: function () {
                if (!jQuery().dataTable) {
                    return;
                }

                initTable1();
            }

        };

    }();

    if (App.isAngularJsApp() === false) {
        jQuery(document).ready(function() {
            TableDatatablesManaged.init();
        });
    }

    $("#region_id").change(function () {
        var id1 = this.value;
        if(id1 != "")
        {
            $.get("<?php echo url('fetch/districts') ?>/"+id1,function(data){
                $("#district_id").html(data);
            });
        }else{$("#district_id").html("<option value=''>----</option>");}
    });
    function getPSNProfile(id1){
        if(id1 != "")
        {
            $.get("<?php echo url('getpasprofile') ?>/"+id1,function(data){
                $("#psnprofile").html(data);
            });
        }else{$("#psnprofile").html("");}
    }
</script>
<!-- END SAMPLE FORM PORTLET-->
{!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
{!! Html::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/clockface/js/clockface.js" ) !!}
{!! Html::script("assets/pages/scripts/components-date-time-pickers.min.js" ) !!}

<script>

    $("#formItemsDistribution").validate({
        rules: {
            beneficiary_id: "required",
            donor_type: "required",
            item: "required",
            quantity: "required",
            distributed_date: "required"
        },
        messages: {
            beneficiary_id: "Please field is required",
            donor_type: "Please field is required",
            item: "Please field is required",
            distributed_date: "Please field is required",
            quantity: "Please enter quantity"
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#formItemsDistribution').serializeArray();
            var formURL = $('#formItemsDistribution').attr("action");
            $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    success: function (data) {
                        $("#output").html("<h3><span class='text-info'><i class='fa fa-info'></i>"+ data.message +"</span><h3>");
                        setTimeout(function () {
                            location.replace("{{url('inventory/disbursement')}}");
                            $("#output").html("");
                        }, 2000);
                    },
                    error: function (jqXhr, status, response) {
                        console.log(jqXhr);
                        if (jqXhr.status === 401) {
                            location.replace('{{url('login')}}');
                        }
                        if (jqXhr.status === 400) {
                            if(jqXhr.responseJSON.errors ==1){
                                errorsHtml = '<div class="alert alert-danger"><p class="text-uppercase text-bold">There are errors kindly check</p>';
                                errorsHtml += '<p>'+ jqXhr.responseJSON.message +'</p></div>';
                                $('#output').html(errorsHtml);
                            }else {
                                var errors = jqXhr.responseJSON.errors;
                                errorsHtml = '<div class="alert alert-danger"><p class="text-uppercase text-bold">There are errors kindly check</p><ul>';
                                $.each(errors, function (key, value) {
                                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                                });
                                errorsHtml += '</ul></di>';
                                $('#output').html(errorsHtml);
                            }
                        }
                        else {
                            $('#output').html(jqXhr.message);
                        }

                    }
                });
        }
    });
</script>
<script>

    $("#region_id").change(function () {
        var id1 = this.value;
        if(id1 != "")
        {
            $.get("<?php echo url('fetch/districts') ?>/"+id1,function(data){
                $("#district_id").html(data);
            });

        }else{$("#district_id").html("<option value=''>----</option>");}
    });
    $(".addRow").click(function(){

        var div = document.createElement('div');

        div.className = 'row';

        div.innerHTML = '<div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">\
               <label> Item/materials distributed</label>\
               <select name="item[]" id="item" class="form-control" >\
                <option value="">--Select--</option>\
                @foreach(\App\ItemsInventory::orderBy('item_name','ASC')->get() as $itm)\
                <option value="{{$itm->id}}">{{$itm->item_name}}</option>\
                @endforeach\
                </select>\
                </div>\
                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">\
                <label>Quantity</label>\
                <input type="text" class="form-control" name="quantity[]" id="quantity">\
                </div>';

        document.getElementById('itemsdispatch').appendChild(div);
    });
    $(".removeRow").click(function(){

        alert('hhh');
        // document.getElementById('itemsdispatch').removeChild( this.parent().parent() );
    });
</script>
@include('beneficiaries.searchBeneficiary')
<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'inventory/disbursement/create','role'=>'form','id'=>'formItemsDistribution')) !!}

        <div class="form-body">
            <fieldset class="scheduler-border">
                <legend class="text-bold"><h3 class="text-center text-bold">Select client for assessment</h3></legend>
                <div class="form-group">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="clientSearchResultsTable">
                                <thead>
                                <tr>
                                    <th> SNO </th>
                                    <th> Progress number  </th>
                                    <th> Full Name </th>
                                    <th> Sex </th>
                                    <th> Age </th>
                                    <th>Nationality </th>
                                    <th> Address </th>
                                    <th class="text-center"> Select Client </th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th> SNO </th>
                                    <th> Progress number  </th>
                                    <th> Full Name </th>
                                    <th> Sex </th>
                                    <th> Age </th>
                                    <th>Nationality </th>
                                    <th> Address </th>
                                    <th class="text-center"> Select Client </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset class="scheduler-border">
                <legend class="text-bold"><h3 class="text-center text-bold">Distribution Details</h3></legend>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label>Date</label>
                        <input type="text" class="form-control date-picker" readonly name="distributed_date" id="distributed_date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                        <label>Distributed by</label>
                        <input type="text" class="form-control" name="distributed_by" id="distributed_by">
                    </div>

                </div>
            </div>
            <div class="form-group" id="itemsdispatch">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">

                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">

                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1">
                        <a href="#" class="addRow"><i class="fa fa-plus"></i> Add </a>
                    </div>
                </div>
                <div class="row">
                 <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                    <label> Item/materials distributed</label>
                     <select name="item[]" id="item" class="form-control" >
                         <option value="">--Select--</option>
                         @foreach(\App\ItemsInventory::orderBy('item_name','ASC')->get() as $itm)
                             <option value="{{$itm->id}}">{{$itm->item_name}}</option>
                             @endforeach
                     </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="quantity[]" id="quantity">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label>Donor type</label>
                <input type="text" class="form-control" name="donor_type" id="donor_type">
            </div>
            </fieldset>
            <hr/>
            <div class="row">
                <div class="col-md-8 col-sm-8 pull-left" id="output">

                </div>
                <div class="col-md-4 col-sm-4 pull-right text-right">
                    <button type="button" class="btn btn-danger "  data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit Form </button>
                </div>

            </div>

            </div>

        {!! Form::close() !!}
    </div>
</div>
