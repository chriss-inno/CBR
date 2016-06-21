<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'camps','role'=>'form','id'=>'DepartmentFormUN')) !!}
        <div class="form-body">
            <div class="form-group">
                <label>Camp Name</label>
                <input type="text" class="form-control" name="camp_name" id="camp_name">
            </div>
            <div class="form-group">
                <label>Camp Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
            <div class="form-group">
                <label>Camp Address/Location</label>
                <textarea class="form-control" name="address" id="address"></textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                        <label>Telephone</label>
                        <input type="text" class="form-control" name="tel" id="tel">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                        <label>Registration No</label>
                        <input type="text" class="form-control" name="reg_no" id="reg_no">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                        <label>Zone</label>
                        <input type="text" class="form-control" name="zone" id="zone">
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label>Region Name</label>
                        <select class="form-control" name="region_id" id="region_id">
                            <option value="">---Select--</option>
                            @foreach(\App\Region::orderBy('region_name','ASC')->get() as $region)
                                <option value="{{$region->id}}">{{$region->region_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label>District</label>
                        <select class="form-control" name="district_id" id="district_id">
                            <option value="">---Select--</option>

                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label>Camp Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">---Select--</option>
                            <option value="Closed">Closed</option>
                            <option value="Opened">Opened</option>
                        </select>
                    </div>
                </div>
            </div>
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