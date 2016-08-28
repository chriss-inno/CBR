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
        {!! Form::open(array('url'=>'livelihood/clients','role'=>'form','id'=>'DepartmentFormUN')) !!}
        <div class="form-body">
            <div class="form-group" id="itemsdispatch">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Date of registration</label>
                            <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                <input type="text" class="form-control" name="registration_date" id="registration_date" readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>

                        </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                            <label>Progress number</label>
                            <input type="text" class="form-control" name="progress_number" id="progress_number">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label>Full name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Sex</label>
                            <select name="sex" id="sex" class="form-control">
                                <option value="">--Select--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" id="age">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Category</label>
                            <input type="text" class="form-control" name="category" id="category">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Position</label>
                            <input type="text" class="form-control" name="position" id="position">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Group</label>
                            <select name="group" id="group" class="form-control">
                                <option value="">--None--</option>
                                @foreach(\App\LiveliHoodsGroup::orderBy('group_name','ASC')->get() as $lg )
                                    <option value="{{$lg->id}}">{{$lg->group_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Zone</label>
                            <input type="text" class="form-control" name="zone" id="zone">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Activity</label>
                            <input type="text" class="form-control" name="activity" id="activity">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Nationality</label>
                           <select name="nationality" id="nationality" class="form-control">
                               <option value="">--Select--</option>
                               @foreach(\App\Country::orderBy('country_name','ASC')->get() as $country )
                                   <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                   @endforeach
                           </select>
                        </div>

                    </div>
                </div>
                <div class="form-group">

                    <label>Donor</label>
                    <input type="text" class="form-control" name="donor" id="donor">
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
            progress_number: "required",
            full_name: "required",
            registration_date: "required",
            sex: "required",
            age: "required",
            nationality: "required",
            group: "required",
            category: "required",
            family_size: "required"
        },
        messages: {
            attendance_date: "Please field is required",
            full_name: "Please field is required",
            date_registration: "Please field is required",
            sex: "Please field is required",
            age: "Please field is required",
            nationality: "Please field is required",
            group: "Please field is required",
            category: "Please field is required",
            family_size: "Please field is required"
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

</script>