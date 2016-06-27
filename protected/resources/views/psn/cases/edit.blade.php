<!-- BEGIN SAMPLE FORM PORTLET-->
{!! Html::script("assets/tinymce/js/tinymce/tinymce.min.js") !!}
<script>tinymce.init({ selector:'textarea' });</script>
{!! Form::open(array('url'=>'sr/cases/edit','role'=>'form','id'=>'DepartmentFormUN')) !!}
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <span class="caption-subject bold">Client information</span>
        </div>
    </div>
    <div class="portlet-body form">

        <div class="form-group">
            <label for="first_name">The needs were met?</label>
            <select class="form-control" name="needs_status" id="needs_status">
                @if(is_object($assessment->cReview) && $assessment->cReview != null && count($assessment->cReview) >0)
                <option  value="{{$assessment->cReview->needs_status}}">{{$assessment->cReview->needs_status}}</option>
                @else
                    <option  value="">---Select--</option>
                    @endif
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="first_name">Comments from the clients</label>
            <textarea class="form-control" name="comments" id="comments">{{$assessment->cReview->comments}}</textarea>
        </div>
        <div class="form-group">
            <label for="first_name">Remarks (need new plan or  case closure)</label>
            <textarea class="form-control" name="remarks" id="remarks">{{$assessment->cReview->remarks}}</textarea>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-8 col-sm-8 pull-left" id="output">

        </div>
        <div class="col-md-4 col-sm-4 pull-right text-right">
            <input type="hidden" value="{{$assessment->cReview->id}}" name="id" id="id">
            <button type="button" class="btn btn-danger "  data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
        </div>

    </div>


</div>
{!! Form::close() !!}
<!-- END SAMPLE FORM PORTLET-->
{!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
<script>

    $("#DepartmentFormUN").validate({
        rules: {
            needs_status: "required"
        },
        messages: {
            needs_status: "Please this field is mandatory"
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