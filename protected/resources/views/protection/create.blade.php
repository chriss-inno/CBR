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
    $("#formAssessmentProtections").validate({
        rules: {
            client_id: "required",
            progress_number: "required",
            fs: "required",
            name: "required",
            sex: "required",
            assessment_date: "required",
            assessment_place: "required"
        },
        messages: {
            client_id: "Field is required",
            progress_number: "Field is required",
            fs: "Field is required",
            name: "Field is required",
            sex: "Field is required",
            assessment_date: "Field is required",
            assessment_place: "Field is required"
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#formAssessmentProtections').serializeArray();
            var formURL = $('#formAssessmentProtections').attr("action");
            $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    success: function (data) {
                        $("#output").html("<h3><span class='text-info'><i class='fa fa-info'></i>"+ data.message +"</span><h3>");
                        setTimeout(function () {
                            location.replace("{{url('protection/assessment')}}");
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
@include('clients.findclient')
<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'protection/assessment','role'=>'form','id'=>'formAssessmentProtections')) !!}
        <div class="panel panel-flat">

            <div class="panel-body">
                <fieldset class="scheduler-border">
                    <legend class="text-bold"><h3 class="text-center text-bold">Select client for assessment</h3></legend>
                    <div class="form-group">
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="clientSearchResultsTable">
                                    <thead>
                                    <tr>
                                        <th> SNO </th>
                                        <th> File number  </th>
                                        <th> Full Name </th>
                                        <th> Sex </th>
                                        <th> Age </th>
                                        <th>Nationality </th>
                                        <th> Address </th>
                                        <th> Camp </th>
                                        <th class="text-center"> Select Client </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th> SNO </th>
                                        <th> File number  </th>
                                        <th> Full Name </th>
                                        <th> Sex </th>
                                        <th> Age </th>
                                        <th>Nationality </th>
                                        <th> Address </th>
                                        <th> Camp </th>
                                        <th class="text-center"> Select Client </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="text-bold">Assessments Details </legend>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Progress Number</label>
                                <input type="text" class="form-control" name="progress_number" id="progress_number"  value="">
                            </div>
                        </div>

                        <div class="col-md-4">
                         <div class="form-group ">
                            <label class="control-label">F/S:</label>
                            <input type="text" class="form-control" name="fs" id="fs"  value="">
                         </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">CODE:</label>
                                <input type="text" class="form-control" name="code" id="code"  value="">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Date of Assessment</label>
                                <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                    <input type="text" class="form-control" name="assessment_date" id="assessment_date" readonly value="{{old('assessment_date')}}">
                                    <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="control-label">Place of assessment:</label>
                                <input type="text" class="form-control" name="assessment_place" id="assessment_place"  value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group ">
                            <label class="control-label">Date of birth:</label>
                            <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                <input type="text" class="form-control" name="dob" id="dob" readonly value="{{old('dob')}}">
                                <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                            </div>
                        </div>
                        </div>

                    </div>

                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="text-bold">PWD/PSNBASIC  </legend>
                    <div id="psnprofile"></div>


                </fieldset>

                    <fieldset class="scheduler-border">
                        <legend class="text-bold">IDENTIFIED PROTECTIONNEEDS</legend>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]"  value="Mental Health Services">
                                    Mental Health Services
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]" value="Psychological Interventions" >
                                    Psychological Interventions
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]" value="Physical HealthCare" >
                                    Physical HealthCare
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]" value="Medical Rehabilitation" >
                                    Medical Rehabilitation
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]"  value="Protection Support/Services">
                                    Protection Support/Services
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]" value="Social support " >
                                    Social support
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]"  value="Family Tracing Services">
                                    Family Tracing Services
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]" value="Legal Assistance" >
                                    Legal Assistance
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]" value="Family Tracing Services">
                                    Family Tracing Services
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]" value="Social rehabilitation">
                                    Social rehabilitation
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]"  value="Education">
                                    Education
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]"  value="Material support">
                                    Material support
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]"  value="Negative att./neglect">
                                    Negative att./neglect
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]" value="Exclusion from community">
                                    Exclusion from community
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]"  value="Lack of communication">
                                    Lack of communication
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]"  value="Accessible latrine">
                                    Accessible latrine
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]"  value="House renovation">
                                    House renovation
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" name="service_request[]" value="Shelter assistance">
                                    Shelter assistance
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" class="styled" name="service_request[]"  value="Other – specify">
                                            Other – specify
                                        </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="other"  value="">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </fieldset>
                    <fieldset class="scheduler-border">
                        <legend class="text-bold">History of Client</legend>
                        <textarea  class="form-control" name="history" id="history"></textarea>
                    </fieldset>
                    <fieldset class="scheduler-border">
                        <legend class="text-bold">Action Plan</legend>
                        <textarea  class="form-control" name="action_plan" id="action_plan"></textarea>
                    </fieldset>

                <div class="row" style="margin-top: 10px">
                    <div class="col-md-8 col-sm-8 pull-left" id="output">

                    </div>
                    <div class="col-md-4 col-sm-4 pull-right text-right">
                        <button type="button" class="btn btn-danger "  data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Submit Form </button>
                    </div>

                </div>


            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>



