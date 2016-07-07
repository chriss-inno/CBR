<!-- BEGIN SAMPLE FORM PORTLET-->
{!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
{!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/clockface/css/clockface.css" ) !!}
{!! Html::script("assets/tinymce/js/tinymce/tinymce.min.js") !!}
<script>tinymce.init({ selector:'textarea' });</script>
<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'orthopedic/services/create','role'=>'form','id'=>'DepartmentFormUN')) !!}
        <div class="form-body">
            <div class="form-group" id="itemsdispatch">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Attending date</label>
                            <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                <input type="text" class="form-control" name="attendance_date" id="attendance_date" readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>

                        </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                            <label>File Number</label>
                            <input type="text" class="form-control" name="file_no" id="file_no">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label>Diagnosis</label>
                    <textarea class="wysihtml5 form-control" rows="5" name="diagnosis" id="diagnosis"></textarea>
                </div>
                <div class="form-group" id="itemsdispatch">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Service receive</label>
                            <select name="service_received[]" id="service_received" class="form-control">
                                <option value="">--Select--</option>
                                <option value="Repairing">Repairing</option>
                                <option value="Fabrication">Fabrication</option>
                                <option value="Item measurement">Item measurement</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Item serviced</label>
                            <input type="text" class="form-control" name="item_serviced[]" id="item_serviced">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                            <label>Quantity</label>
                            <input type="text" class="form-control" name="quantity[]" id="quantity">
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1">
                            <a href="#" class="addRow"><i class="fa fa-plus"></i> Add record </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="form-actions">
        <div class="row">
            <div class="col-md-8 col-sm-8 pull-left" id="output">

            </div>
            <div class="col-md-4 col-sm-4 pull-right text-right">
                <button type="button" class="btn btn-danger "  data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
            </div>

        </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->
{!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
{!! Html::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/clockface/js/clockface.js" ) !!}
{!! Html::script("assets/pages/scripts/components-date-time-pickers.min.js" ) !!}


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
    $("#DepartmentFormUN").validate({
        rules: {
            attendance_date: "required",
            diagnosis: "required",
            diagnosis: "required",
            diagnosis: "required",
            file_no: "required"
        },
        messages: {
            attendance_date: "Please field is required",
            diagnosis: "Please field is required",
            diagnosis: "Please field is required",
            diagnosis: "Please field is required",
            file_no: "Please field is required"
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#DepartmentFormUN').serializeArray();
            var formURL = $('#DepartmentFormUN').attr("action");
            $.ajax(
                    {
                        url : formURL,
                        type: "POST",
                        data : postData,
                        success:function(data)
                        {
                            console.log(data);
                            if(data =="<span class='text-success'><i class='fa-info'></i> Saved successfully</span>")
                            {
                                //data: return data from server
                                $("#output").html(data);
                                setTimeout(function() {
                                    location.reload();
                                    $("#output").html("");
                                }, 2000);
                            }
                            else
                            {
                                $("#output").html(data);

                            }

                        },
                        error: function(data)
                        {
                            console.log(data.responseJSON);
                            //in the responseJSON you get the form validation back.
                            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Error in processing data try again...</span><h3>");

                            setTimeout(function() {
                                $("#output").html("");
                            }, 2000);
                        }
                    });
        }
    });

    $(".addRow").click(function(){

        var div = document.createElement('div');

        div.className = 'row';

        div.innerHTML = '<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">\
               <label>Service receive</label>\
               <select name="service_received[]" id="service_received" class="form-control">\
                <option value="">--Select--</option>\
                <option value="Repairing">Repairing</option>\
                <option value="Fabrication">Fabrication</option>\
                <option value="Item measurement">Item measurement</option>\
        </select>\
        </div>\
                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">\
                <label>Item serviced</label>\
        <input type="text" class="form-control" name="item_serviced[]" id="item_serviced">\
                </div>\
                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">\
                <label>Quantity</label>\
                <input type="text" class="form-control" name="quantity[]" id="quantity">\
                </div>\
                <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1">\
                </div>\
       ';

        document.getElementById('itemsdispatch').appendChild(div);
    });
    $(".removeRow").click(function(){

        alert('hhh');
        // document.getElementById('itemsdispatch').removeChild( this.parent().parent() );
    });
</script>