<!-- BEGIN SAMPLE FORM PORTLET-->
{!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
{!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/clockface/css/clockface.css" ) !!}

<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'livelihood/materials/create','role'=>'form','id'=>'DepartmentFormUN')) !!}

        <div class="form-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                        <label>Date</label>
                        <input type="text" class="form-control input-medium date-picker" readonly name="support_date" id="support_date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                        <label>Progress Number/Group Name</label>
                        <input type="text" name="progress_number" id="progress_number" placeholder="Enter Progress number" class="form-control" readonly  @if($gtype=="Client") value="{{$client->progress_number}}" @else value="{{$group->group_name}}" @endif>
                    </div>

                </div>
            </div>
            <div class="form-group" id="itemsdispatch">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">

                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">

                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1">
                        <a href="#" class="addRow"><i class="fa fa-plus"></i> Add </a>
                    </div>
                </div>
                <div class="row">
                 <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                    <label> Item/materials distributed</label>
                     <select name="item[]" id="item" class="form-control" >
                         <option value="">--Select--</option>
                         @foreach(\App\ItemsInventory::orderBy('item_name','ASC')->get() as $itm)
                             <option value="{{$itm->id}}">{{$itm->item_name}}</option>
                             @endforeach
                     </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label> Category </label>
                        <select name="category[]" id="category" class="form-control" >
                            <option value="">--Select--</option>
                            @foreach(\App\ItemsCategories::orderBy('category_name','ASC')->get() as $itm)
                                <option value="{{$itm->category_name}}">{{$itm->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="quantity[]" id="quantity">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label>Donor</label>
                <input type="text" class="form-control" name="donor" id="donor">
            </div>
            <div class="form-group">
                <label>Venue</label>
                <input type="text" class="form-control" name="venue" id="venue">
            </div>

            <hr/>
            <div class="row">
                <div class="col-md-8 col-sm-8 pull-left" id="output">

                </div>
                <div class="col-md-4 col-sm-4 pull-right text-right">
                    <button type="button" class="btn btn-danger "  data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="client_id" id="client_id" @if($gtype=="Client") value="{{$client->id}}" @else value="{{$group->id}}" @endif">
                    <input type="hidden" name="category_type" id="category_type"  value="{{$gtype}}">
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
    $(".addRow").click(function(){

        var div = document.createElement('div');

        div.className = 'row';

        div.innerHTML = '<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">\
               <label> Item/materials distributed</label>\
               <select name="item[]" id="item" class="form-control" >\
                <option value="">--Select--</option>\
                @foreach(\App\ItemsInventory::orderBy('item_name','ASC')->get() as $itm)\
                <option value="{{$itm->id}}">{{$itm->item_name}}</option>\
                @endforeach\
                </select>\
                </div>\
                 <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">\
                <label> Category </label>\
                <select name="category[]" id="category" class="form-control" >\
                <option value="">--Select--</option>\
                @foreach(\App\ItemsCategories::orderBy('category_name','ASC')->get() as $itm)\
                <option value="{{$itm->category_name}}">{{$itm->category_name}}</option>\
                @endforeach\
                </select>\
                </div>\
                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">\
                <label>Quantity</label>\
                <input type="text" class="form-control" name="quantity[]" id="quantity">\
                </div>';

        document.getElementById('itemsdispatch').appendChild(div);
    });
    $(".removeRow").click(function(){

        alert('hhh');
       // document.getElementById('itemsdispatch').removeChild( this.parent().parent() );
    });
</script>