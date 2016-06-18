<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'districts','role'=>'form','id'=>'DepartmentFormUN')) !!}
        <div class="form-body">
            <div class="form-group">
                <label>District Name</label>
                <input type="text" class="form-control" name="district_name" id="district_name">
            </div>
            <div class="form-group">
                <label>Region Name</label>
               <select class="form-control" name="region_id" id="region_id">
                   <option value="">---Select--</option>
                   @foreach(\App\Region::orderBy('region_name','ASC')->get() as $region)
                   <option value="{{$region->id}}">{{$region->region_name}}</option>
                       @endforeach
               </select>
        </div>
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
    $("#DepartmentFormUN").validate({
        rules: {
            district_name: "required",
            region_id: "required"
        },
        messages: {
            district_name: "Please enter district name",
            region_id: "Please select region"
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