{!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
{!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/clockface/css/clockface.css" ) !!}

<div class="portlet-body form">
                    {!! Form::open(array('url'=>'clients','role'=>'form','id'=>'DepartmentFormUN')) !!}
                        <div class="form-wizard">
                            <div class="form-body">

                                <div class="tab-content">
                                     <div class="tab-pane active" id="tab1">
                                        <fieldset class="scheduler-border">
                                            <div class="form-group">
                                              <div class="row">
                                                  <div class="col-md-4 col-sm-4">
                                                      <label for="dob">Date registered</label>
                                                      <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                                          <input type="text" class="form-control" name="date_registered" id="date_registered" readonly value="{{old('date_registered')}}">
                                                          <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                          @if($errors->first('date_registered') !="")
                                                              <span class="error">{{ $errors->first('date_registered') }}</span>
                                                          @endif
                                                      </div>
                                                  </div>
                                                <div class="col-md-8 col-sm-8">
                                                <label for="file_number">File Number</label>
                                                <input type="text" class="form-control" name="file_number" id="file_number" placeholder="Enter file number" value="{{old('file_number')}}">
                                                @if($errors->first('file_number') !="")
                                                 <span class=" error">{{ $errors->first('file_number') }}</span>
                                                    @endif
                                               </div>

                                              </div>
                                            </div>
                                            <div class="form-group">

                                                        <label for="first_name">Full Name</label>
                                                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Full name" value="{{old('fullname')}}">
                                                        @if($errors->first('fullname') !="")
                                                            <span class="error">{{ $errors->first('fullname') }}</span>
                                                        @endif

                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="dob">Age</label>
                                                        <input type="text" class="form-control" name="age" id="age" value="{{old('age')}}">
                                                            @if($errors->first('age') !="")
                                                                <span class="error">{{ $errors->first('age') }}</span>
                                                            @endif
                                                        </div>

                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="sex">Sex</label>
                                                        <select class="form-control" name="sex" id="sex">
                                                            @if(old('sex') != "")
                                                                <option value="{{old('sex')}}">{{old('sex')}}</option>
                                                            @else
                                                                <option value="">--Select--</option>
                                                            @endif
                                                            <option value="Female">Female</option>
                                                            <option value="Male">Male</option>
                                                        </select>
                                                        @if($errors->first('sex') !="")
                                                            <span class="error">{{ $errors->first('sex') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                        <label>Nationality</label>
                                                        <select name="nationality" class="form-control" id="nationality">
                                                           <option value="">--Select--</option>
                                                            @foreach(\App\Country::orderBy('country_name','=','ASC')->get() as $country)
                                                                <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                                                @endforeach
                                                        </select>

                                            </div>


                                        </fieldset>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Location/Settlement Details</legend>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                        <label>Camp Name</label>
                                                        <select class="form-control" name="camp_id" id="camp_id">
                                                            @if(old('camp_id') != "")
                                                                <?php $camp=\App\Camp::find(old('camp_id'));?>
                                                                <option value="{{$camp->id}}">{{$camp->camp_name}}</option>
                                                            @else
                                                                <option value="">--Select--</option>
                                                            @endif
                                                            @foreach(\App\Camp::orderBy('camp_name','ASC')->get() as $camp)
                                                                <option value="{{$camp->id}}">{{$camp->camp_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                        <label>Service Center</label>
                                                        <select class="form-control" name="center_id" id="center_id">
                                                            @if(old('center_id') != "")
                                                                <?php $cent=\App\Centre::find(old('center_id'));?>
                                                                <option value="{{$cent->id}}">{{$cent->centre_name}}</option>
                                                            @else
                                                                <option value="">--Select--</option>
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                        <label>Region Name</label>
                                                        <select class="form-control" name="region_id" id="region_id">
                                                            @if(old('region_id') != "")
                                                                <?php $reg=\App\Region::find(old('region_id'));?>
                                                                <option value="{{$reg->id}}">{{$reg->region_name}}</option>
                                                            @else
                                                                <option value="">--Select--</option>
                                                            @endif
                                                            @foreach(\App\Region::orderBy('region_name','ASC')->get() as $region)
                                                                <option value="{{$region->id}}">{{$region->region_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                        <label>District</label>
                                                        <select class="form-control" name="district_id" id="district_id">
                                                            @if(old('district_id') != "")
                                                                <?php $dist=\App\District::find(old('district_id'));?>
                                                                <option value="{{$dist->id}}">{{$dist->district_name}}</option>
                                                            @else
                                                                <option value="">--Select--</option>
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class=" form-control" name="address" id="address"  value="{{old('address')}}">
                                            </div>
                                        </fieldset>
                                    </div>

                                </div>
                            </div>
                            <div class="form-actions">

                                    <div class="col-md-8 col-sm-8 pull-left" id="output">

                                    </div>
                                    <div class="col-md-4 col-sm-4 pull-right text-right">
                                        <button type="button" class="btn btn-danger "  data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit </button>
                                    </div>



                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
<!-- END SAMPLE FORM PORTLET-->
{!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
{!! Html::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/clockface/js/clockface.js" ) !!}
{!! Html::script("assets/pages/scripts/components-date-time-pickers.min.js" ) !!}


<script>
    $("#DepartmentFormUN").validate({
        rules: {
            date_registered: "required",
            file_number: "required",
            fullname: "required",
            nationality: "required",
            address: "required",
            sex: "required",
            age: "required"
        },
        messages: {
            date_registered: "Field is required",
            file_number: "Field is required",
            fullname: "Field is required",
            nationality: "Field is required",
            address: "Field is required",
            sex: "Field is required",
            age: "Field is required"
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
                            if(data =="<span class='text-success'><i class='fa fa-info'></i> Saved successfully</span>")
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

    $("#region_id").change(function () {
        var id1 = this.value;
        if(id1 != "")
        {
            $.get("<?php echo url('fetch/districts') ?>/"+id1,function(data){
                $("#district_id").html(data);
            });
        }else{$("#district_id").html("<option value=''>----</option>");}
    });
    $("#camp_id").change(function () {
        var id1 = this.value;
        if(id1 != "")
        {
            $.get("<?php echo url('fetch/centres') ?>/"+id1,function(data){
                $("#center_id").html(data);
            });
        }else{$("#center_id").html("<option value=''>----</option>");}
    });
</script>

