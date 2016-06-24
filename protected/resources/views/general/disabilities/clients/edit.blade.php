<!-- BEGIN SAMPLE FORM PORTLET-->
{!! Html::script("assets/tinymce/js/tinymce/tinymce.min.js") !!}
<script>tinymce.init({ selector:'textarea' });</script>
<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'disabilities/clients/edit','role'=>'form','id'=>'DepartmentFormUN')) !!}
        <div class="form-body">
            <div class="form-group">
                <label>Disability Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @if($clds->category_id !="" && is_object($clds->disability) )
                    <option value="{{$clds->disability->id}}">{{$clds->disability->category}}</option>
                    @else
                        <option value="">--Select--</option>
                        @endif
                    @foreach(\App\Disability::all() as $dis)
                        <option value="{{$dis->id}}">{{$dis->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Disability/Diagnosis</label>
                <textarea class="form-control" name="disability_diagnosis" rows="6" id="disability_diagnosis">{{$clds->disability_diagnosis}}</textarea>
            </div>
            <div class="form-group">
                <label>Remarks</label>
                <textarea class="form-control" name="remarks" rows="6" id="remarks">{{$clds->remarks}}</textarea>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-8 col-sm-8 pull-left" id="output">

                </div>
                <div class="col-md-4 col-sm-4 pull-right text-right">
                    <input type="hidden" value="{{$clds->id}}" name="id" id="id">
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
            category_id: "required",
            disability_diagnosis: "required"
        },
        messages: {
            category_id: "Please select category name",
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