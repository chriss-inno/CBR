<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'camps','role'=>'form','id'=>'DepartmentFormUN')) !!}
        <div class="form-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label>Date</label>
                        <input type="text" class="form-control" name="referral_date" id="referral_date">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label>Referred To</label>
                        <input type="text" class="form-control" name="referral_to" id="referral_to">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Reason for referral</label>
                <textarea class="form-control" name="referral_reason" id="referral_reason"></textarea>
            </div>
            <div class="form-group">
                <label>History</label>
                <textarea class="form-control" name="history" id="history"></textarea>
            </div>
            <div class="form-group">
                <label>Examination</label>
                <textarea class="form-control" name="examination" id="examination"></textarea>
            </div>
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Findings</legend>
                    <div class="form-group">
                        <label>Findings and Feedback on the plans</label>
                        <textarea class="form-control" name="findings" id="findings"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                <label>Name</label>
                                <input type="text" class="form-control" name="findings_name" id="findings_name">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                <label>Title</label>
                                <input type="text" class="form-control" name="findings_title" id="findings_title">
                            </div>
                        </div>
                    </div>
            </fieldset>
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Referred by</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Name</label>
                            <input type="text" class="form-control" name="referred_by_name" id="referred_by_name">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Title</label>
                            <input type="text" class="form-control" name="referred_by_title" id="referred_by_title">
                        </div>
                    </div>
                </div>
             </fieldset>
            <hr/>
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
            camp_name: "required",
            status: "required"
        },
        messages: {
            camp_name: "Please enter camp name",
            status: "Please select camp status"
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
                            //data: return data from server
                            $("#output").html(data);
                            setTimeout(function() {
                                location.reload();
                                $("#output").html("");
                            }, 2000);
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

</script>