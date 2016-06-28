<!-- BEGIN SAMPLE FORM PORTLET-->
{!! Html::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
{!! Html::style("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" ) !!}
{!! Html::style("assets/global/plugins/clockface/css/clockface.css" ) !!}

<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'inventory/disbursement/create','role'=>'form','id'=>'DepartmentFormUN')) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                    <label>Date</label>
                    <input type="text" class="form-control input-medium date-picker" readonly name="disbursements_date" id="disbursements_date" data-date-format="yyyy-mm-dd">
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                    <label>Client full name</label>
                    <select name="client_id" class="form-control" id="client_id">
                        <option value="">--Select--</option>
                        @foreach(\App\Client::all() as $client)
                            <option value="{{$client->id}}">{{$client->first_name." ".$client->last_name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
        <div class="form-body">
            <div class="form-group" id="itemsdispatch">
                <div class="row">
                 <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                    <label> Item/Material Name</label>
                    <select name="item_id[]" class="form-control" id="item_id">
                        <option value="">--Select--</option>
                        @foreach(\App\ItemsInventory::all() as $item)
                            <option value="{{$item->id}}">{{$item->item_name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="quantity[]" id="quantity">
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1">
                       <a href="#" class="addRow"><i class="fa fa-plus"></i> Add </a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Distributed By</label>
                <input type="text" class="form-control" name="disbursements_by" id="disbursements_by">
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
            client_id: "required",
            disbursements_by: "required",
            item_id: "required",
            quantity: "required",
            disbursements_date: "required"
        },
        messages: {
            client_id: "Please field is required",
            disbursements_by: "Please field is required",
            item_id: "Please field is required",
            disbursements_date: "Please field is required",
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
    $(".addRow").click(function(){

        var div = document.createElement('div');

        div.className = 'row';

        div.innerHTML = '<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">\
                <label> Item/Material Name</label>\
        <select name="item_id[]" class="form-control" id="item_id">\
                <option value="">--Select--</option>\
                @foreach(\App\ItemsInventory::all() as $item)
                <option value="{{$item->id}}">{{$item->item_name}}</option>\
                @endforeach
                </select>\
                </div>\
                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">\
                <label>Quantity</label>\
                <input type="text" class="form-control" name="quantity[]" id="quantity">\
                </div>\
                <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1">\
                </div>\
                </div>';

        document.getElementById('itemsdispatch').appendChild(div);
    });
    $(".removeRow").click(function(){

        alert('hhh');
       // document.getElementById('itemsdispatch').removeChild( this.parent().parent() );
    });
</script>