{!! Html::script("assets/tinymce/js/tinymce/tinymce.min.js") !!}
<script>
    tinymce.init({ selector:'textarea' });
 </script>
<div class="form-group ">
    <label class="control-label">Name:</label>
    <input type="text" class="form-control" name="name" id="name"  value="{{$client->full_name}}" readonly="">
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group ">
            <label class="control-label">Sex:</label>
            <select class="form-control" name="sex" id="sex" data-placeholder="Choose an option..." readonly="">
                <option value="{{$client->sex}}">{{$client->sex}}</option>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group ">
            <label class="control-label">Marital Status</label>
            <select class="form-control" name="marital_status" id="marital_status" data-placeholder="Choose an option...">
                <option value=""></option>
                <option value="Child">Child</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widow">Widow</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group ">
            <label class="control-label">Head of household:</label>
            <input type="text" class="form-control" name="hh_household" id="hh_household"  value="">
        </div>
    </div>

</div>
<div class="row">

    <div class="col-md-4">
        <div class="form-group ">
            <label class="control-label">Address:</label>
            <input type="text" class="form-control" name="address" id="address"  value="{{$client->address}}" readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group ">
            <label class="control-label">Mobile Number:</label>
            <input type="text" class="form-control" name="mobile" id="mobile"  value="">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group ">
            <label class="control-label">Residency status:</label>
            <input type="text" class="form-control" name="residence_status" id="residence_status"  value="">
        </div>
    </div>

</div>
<div class="form-group ">
    <label class="control-label">Condition:</label>
    <textarea class="textEditor form-control" name="condition" id="condition" ></textarea>
</div>