<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-body form">
          {!! Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT','role'=>'form','id'=>'DepartmentFormUN')) !!}
        <div class="form-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 ">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{$user->first_name}}">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user->last_name}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" name="user_name" id="user_name" value="{{$user->user_name}}">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 ">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" id="pass" >
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="cpass" id="cpass" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 ">
                        <label> User Role</label>
                        <select class="form-control" name="user_role" id="user_role">
                            <option value="">---Select--</option>
                            @foreach(\App\Role::all() as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <label> Status</label>
                        <select class="form-control" name="status" id="status">
                            @if($user->status != "")
                            <option value="{{$user->status}}">{{$user->status}}</option>
                                @else
                                <option value="">---Select--</option>
                            @endif
                            <option value="Active">Active</option>
                            <option value="Disabled">Disabled</option>
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

    $("#DepartmentFormUN").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            user_name: "required",
            user_role: "required",
            pass: {
                minlength : 8
            },
            cpass : {
                minlength : 8,
                equalTo : "#pass"
            },
            status: "required"
        },
        messages: {
            first_name: "Please enter first_name",
            last_name: "Please enterlast_name",
            user_name: "Please enter user_name",
            user_role: "Please enter user role",
            pass : {
                minlength : "Password should not be less than 8 character"
            },
            cpass : {
                minlength : "Password should not be less than 8 character",
                equalTo : "Password don't match"
            },
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