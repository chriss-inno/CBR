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
         <div class="form-body">
            <div class="form-group" id="itemsdispatch">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Date of registration</label>
                            <div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d" >
                                <input type="text" class="form-control" name="registration_date" id="registration_date" readonly value="{{$client->registration_date}}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>

                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                            <label>Progress number</label>
                            <input type="text" class="form-control" name="progress_number" id="progress_number" value="{{$client->progress_number}}">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label>Full name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name" value="{{$client->full_name}}">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Sex</label>
                            <select name="sex" id="sex" class="form-control">
                                @if($client->sex != "")
                                    <option value="{{$client->sex}}" selected>{{$client->sex}}</option>
                                @endif
                                <option value="">--Select--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" id="age" value="{{$client->age}}">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Category</label>
                            <input type="text" class="form-control" name="category" id="category" value="{{$client->category}}">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Position</label>
                            <input type="text" class="form-control" name="position" id="position" value="{{$client->position}}">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Group</label>
                            <select name="group" id="group" class="form-control">

                                @if($client->group != "")
                                    <option value="{{$client->group}}" selected>{{$client->group}}</option>
                                @endif
                                <option value="">--None--</option>
                                @foreach(\App\LiveliHoodsGroup::orderBy('group_name','ASC')->get() as $lg )
                                    <option value="{{$lg->group_name}}">{{$lg->group_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Zone</label>
                            <input type="text" class="form-control" name="zone" id="zone" value="{{$client->zone}}">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Activity</label>
                            <input type="text" class="form-control" name="activity" id="activity" value="{{$client->activity}}">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$client->phone}}">

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label>Nationality</label>
                            <select name="nationality" id="nationality" class="form-control">
                                <option value="">--Select--</option>
                                @if($client->nationality != "")
                                    <option value="{{$client->nationality}}" selected>{{$client->nationality}}</option>
                                @endif
                                @foreach(\App\Country::orderBy('country_name','ASC')->get() as $country )
                                    <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label>Donor</label>
                    <input type="text" class="form-control" name="donor" id="donor" value="{{$client->donor}}">
                </div>

            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-8 col-sm-8 pull-left" id="output">

                </div>
                <div class="col-md-4 col-sm-4 pull-right text-right">
                    <button type="button" class="btn btn-danger btn-block "  data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->
{!! Html::script("assets/pages/scripts/jquery.validate.min.js") !!}
{!! Html::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" ) !!}
{!! Html::script("assets/global/plugins/clockface/js/clockface.js" ) !!}
{!! Html::script("assets/pages/scripts/components-date-time-pickers.min.js" ) !!}


