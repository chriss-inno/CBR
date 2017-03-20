<div class="row" style="margin-top: 20px">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::open(array('url'=>'advanced/search/beneficiaries','role'=>'form','id'=>'formAdvancedClientsSearch')) !!}
                <div class="panel panel-flat">


                    <div class="panel-body">
                        <fieldset class="scheduler-border">
                            <legend class="text-bold">Client Advance Search</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Registration: Start Date</label>
                                        <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                            <input type="text" class="form-control" name="start_date" id="start_date" readonly value="{{old('start_date')}}">
                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Registration: End Date</label>
                                        <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                            <input type="text" class="form-control" name="end_date" id="end_date" readonly value="{{old('end_date')}}">
                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Progress Number</label>
                                        <input type="text" class="form-control" name="progress_number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Full Name</label>
                                        <input type="text" class="form-control" name="full_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Sex</label>
                                        <select  class="form-control" data-live-search="true" data-width="100%" name="sex" id="sex">
                                            <optgroup label="Sex">
                                                <option value="All">All</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label>Nationality</label>
                                        <select name="nationality" class="form-control" id="nationality">
                                            <option value="All">All</option>
                                            @foreach(\App\Country::orderBy('country_name','=','ASC')->get() as $country)
                                                <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label"> Present address</label>
                                <input type="text" class="form-control" placeholder="Present address " name="address" id="address" value="{{old('address')}}">
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-search"></i> Search Client </button>
                            </div>
                            <div class="col-md-2 col-sm-2 ">
                                <button type="reset" class="btn btn-block btn-default"><i class="fa fa-refresh"></i> Reset </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8" id="output_advanced_search">

                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <script>
                    $("#formAdvancedClientsSearch").validate({
                        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
                        errorClass: 'validation-error-label',
                        successClass: 'validation-valid-label',
                        highlight: function(element, errorClass) {
                            $(element).removeClass(errorClass);
                        },
                        unhighlight: function(element, errorClass) {
                            $(element).removeClass(errorClass);
                        },
                        errorPlacement: function(error, element) {

                            // Styled checkboxes, radios, bootstrap switch
                            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                                    error.appendTo( element.parent().parent().parent().parent() );
                                }
                                else {
                                    error.appendTo( element.parent().parent().parent().parent().parent() );
                                }
                            }

                            // Unstyled checkboxes, radios
                            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                                error.appendTo( element.parent().parent().parent() );
                            }

                            // Input with icons and Select2
                            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                                error.appendTo( element.parent() );
                            }

                            // Inline checkboxes, radios
                            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                                error.appendTo( element.parent().parent() );
                            }

                            // Input group, styled file input
                            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                                error.appendTo( element.parent().parent() );
                            }

                            else {
                                error.insertAfter(element);
                            }
                        },
                        errorElement:'div',
                        rules: {
                            start_dategg: "required",
                            end_dategg:"required"
                        },
                        messages: {
                            start_dategg: "Please this field is required",
                            end_dategg: "Please  Camp name is required"
                        },
                        submitHandler: function(form) {
                            $("#output_advanced_search").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Processing please wait...</span><h3>");
                            var postData = $('#formAdvancedClientsSearch').serializeArray();
                            var formURL = $('#formAdvancedClientsSearch').attr("action");
                            $.ajax(
                                {
                                    url : formURL,
                                    type: "POST",
                                    dataType: 'json',
                                    data : postData,
                                    success: function(data){
                                        loadDataTable(data);
                                        $('#output_advanced_search').html("");
                                    },
                                    error: function(jqXhr,status, response) {

                                        if( jqXhr.status === 401 ) {
                                            location.replace('{{url('login')}}');
                                        }
                                        if( jqXhr.status === 400 ) {
                                            if(jqXhr.responseJSON.errors ==1){
                                                errorsHtml = '<div class="alert alert-danger"><p class="text-uppercase text-bold">There are errors kindly check</p>';
                                                errorsHtml +='<p> '+ jqXhr.responseJSON.message +'</p></div>';
                                                $('#output_advanced_search').html(errorsHtml);
                                            }
                                            else {
                                                var errors = jqXhr.responseJSON.errors;
                                                errorsHtml = '<div class="alert alert-danger"><p class="text-uppercase text-bold">There are errors kindly check</p><ul>';
                                                $.each(errors, function (key, value) {
                                                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                                                });
                                                errorsHtml += '</ul></di>';
                                                $('#output_advanced_search').html(errorsHtml);
                                            }
                                        }
                                        else
                                        {
                                            $('#output_advanced_search').html(jqXhr.message);
                                        }

                                    }
                                });
                        }
                    });
                    function loadDataTable(dataset){
                        console.log(dataset);
                        $(document).ready(function() {

                            $('#clientSearchResultsTable').dataTable().fnDestroy();
                            var TableDatatablesManaged = function () {

                                var initTable1 = function () {

                                    var table = $('#clientSearchResultsTable');

                                    // begin first table
                                    table.dataTable({

                                        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                                        data: dataset,
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


                        } );
                    }
                </script>
            </div>
        </div>
    </div>


</div>
