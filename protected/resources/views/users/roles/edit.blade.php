<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-body form">
          {!! Form::model($role, array('route' => array('access.roles.update', $role->id), 'method' => 'PUT','role'=>'form','id'=>'DepartmentFormUN')) !!}
        <div class="form-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 ">
                        <label> Name</label>
                        <input type="text" class="form-control" name="role_name" id="role_name" value="{{$role->name}}">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <label>Display Name</label>
                        <input type="text" class="form-control" name="display_name" id="display_name" value="{{$role->display_name}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" id="description" value="{{$role->description}}">
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

    $("#DepartmentFormUN").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            user_name: "required",
            pass: "required",
            status: "required"
        },
        messages: {
            first_name: "Please enter first_name",
            last_name: "Please enterlast_name",
            user_name: "Please enter user_name",
            pass: "Please enter password",
            department_name: "Please enter department name",
            status: "Please select status"
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