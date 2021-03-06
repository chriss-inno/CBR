<!-- BEGIN SAMPLE FORM PORTLET-->
{!! Html::script("assets/tinymce/js/tinymce/tinymce.min.js") !!}
<script>tinymce.init({ selector:'textarea' });</script>
<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'disabilities/create','role'=>'form','id'=>'DepartmentFormUN')) !!}
        <div class="form-body">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Personal Details</legend>
                <div class="form-group">
                    <label for="first_name">File Number</label>
                    <input type="text" class="form-control" name="file_number" id="file_number" placeholder="Enter file number" value="{{$client->file_number}}" disabled>
                </div>
                <div class="form-group">

                    <label for="first_name">Full Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First name" value="{{$client->full_name}}" disabled>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="dob">Age</label>
                            <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Full name"  value="{{$client->age}}"  disabled>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label for="sex">Sex</label>
                            <select class="form-control" name="sex" id="sex" disabled>
                                @if($client->sex != "")
                                    <option value="{{$client->sex}}" selected>{{$client->sex}}</option>
                                @else
                                    <option value="">---Select--</option>
                                @endif
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <label for="sex">Address</label>
                            <input type="text" class="form-control" value="{{$client->address}}" disabled>
                        </div>

                    </div>
                </div>

            </fieldset>
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Disability Details</legend>
                <div class="form-group">
                    <label>Progress Number</label>
                    <input type="text" class="form-control" name="progress_number" id="progress_number" >
                </div>
                <div class="form-group">
                    <label>Disability Category</label>
                    <input type="text" class="form-control" name="category_name" id="category_name" >
                </div>
                <div class="form-group">
                    <label>Disability/Diagnosis</label>
                    <textarea class="form-control" name="disability_diagnosis" rows="6" id="disability_diagnosis"></textarea>
                </div>
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks" rows="6" id="remarks"></textarea>
                </div>
            </fieldset>
            <hr/>
            <div class="row">
                <div class="col-md-8 col-sm-8 pull-left" id="output">

                </div>
                <div class="col-md-4 col-sm-4 pull-right text-right">
                    <input type="hidden" value="{{$client->id}}" name="client_id" id="client_id">
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
            category_name: "required",
            disability_diagnosis: "required"
        },
        messages: {
            category_name: "Please enter category name",
            disability_diagnosis: "Please enter diagnosis"
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
                                    location.replace("{{url('disabilities')}}");
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

</script>