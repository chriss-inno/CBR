<!-- BEGIN SAMPLE FORM PORTLET-->
{!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
{!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/clockface/css/clockface.css" ) !!}

<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'livelihood/materials/edit','role'=>'form','id'=>'DepartmentFormUN')) !!}

        <div class="form-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                        <label>Date</label>
                        <input type="text" class="form-control input-medium date-picker" readonly name="support_date" id="support_date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d" value="{{$support->support_date}}">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                        <label>Progress Number/Group Name</label>
                        <input type="text" name="progress_number" id="progress_number" placeholder="Enter Progress number" class="form-control" readonly  value="{{$support->supported_name}}">
                    </div>

                </div>
            </div>
            <div class="form-group" id="itemsdispatch">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label> Item/materials distributed</label>
                        <select name="item" id="item" class="form-control" >
                            @if(is_object($support->item) && $support->item != null)
                                <option value="{{$support->item->item_name}}" selected>{{$support->item->item_name}}</option>
                            @endif
                            <option value="">--Select--</option>
                            @foreach(\App\ItemsInventory::orderBy('item_name','ASC')->get() as $itm)
                                <option value="{{$itm->id}}">{{$itm->item_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label> Category </label>
                        <select name="category" id="category" class="form-control" >
                            <option value="{{$support->quantity}}">{{$support->category}}</option>
                            <option value="">--Select--</option>
                            @foreach(\App\ItemsCategories::orderBy('category_name','ASC')->get() as $itm)
                                <option value="{{$itm->category_name}}">{{$itm->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" value="{{$support->quantity}}">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label>Donor</label>
                <input type="text" class="form-control" name="donor" id="donor" value="{{$support->donor}}">
            </div>
            <div class="form-group">
                <label>Venue</label>
                <input type="text" class="form-control" name="venue" id="venue" value="{{$support->venue}}">
            </div>

            <hr/>
            <div class="row">
                <div class="col-md-8 col-sm-8 pull-left" id="output">

                </div>
                <div class="col-md-4 col-sm-4 pull-right text-right">
                    <button type="button" class="btn btn-danger "  data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="id" id="id"  value="{{$support->id}}">
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
            supported_name: "required",
            venue: "required",
            donor: "required",
            quantity: "required",
            support_date: "required"
        },
        messages: {
            supported_name: "Please field is required",
            venue: "Please field is required",
            donor: "Please field is required",
            support_date: "Please field is required",
            quantity: "Please enter quantity"
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
                                    location.replace("{{url('livelihood/materials')}}");
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