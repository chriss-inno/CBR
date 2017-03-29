<!-- END SAMPLE FORM PORTLET-->
<div class="row" style="margin-top: 20px">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::open(array('url'=>'reports/material/support','role'=>'form','id'=>'formItemsDistributionReport')) !!}
                <div class="panel panel-flat">


                    <div class="panel-body">
                        <fieldset class="scheduler-border">
                            <legend class="text-bold">Material Distribution Report</legend>
                            @if (session('message'))
                                <div class="alert alert-danger">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label"> Start Date</label>
                                        <div class="input-group date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                            <input type="text" class="form-control" name="start_date" id="start_date" readonly value="{{old('start_date')}}">
                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label"> End Date</label>
                                        <div class="input-group date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-date-end-date="+0d">
                                            <input type="text" class="form-control" name="end_date" id="end_date" readonly value="{{old('end_date')}}">
                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label">Progress Number</label>
                                        <input type="text" class="form-control" name="progress_number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Full Name</label>
                                        <input type="text" class="form-control" name="full_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Items</label>
                                        <select  class="form-control" data-live-search="true" data-width="100%" name="item" id="item">
                                            <optgroup label="Sex">
                                                <option value="All">All</option>
                                                @foreach(\App\ItemsInventory::all() as $item)
                                                <option value="{{$item->id}}">{{$item->item_name}}</option>
                                                    @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Sex</label>
                                        <select  class="form-control" data-live-search="true" data-width="100%" name="sex" id="sex">
                                            <optgroup label="Sex">
                                                <option value="All">All</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label>Nationality</label>
                                        <select name="nationality" class="form-control" id="nationality">
                                            <option value="All">All</option>
                                            @foreach(\App\Country::orderBy('country_name','=','ASC')->get() as $country)
                                                <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label"> Present address</label>
                                        <input type="text" class="form-control" placeholder="Present address " name="address" id="address" value="{{old('address')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label"> Diagnosis</label>
                                        <input type="text" class="form-control" placeholder="Diagnosis" name="diagnosis" id="diagnosis" value="{{old('diagnosis')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>What type of report type do you need?</label>
                                        <select  class="form-control" data-live-search="true" data-width="100%" name="report_type" id="report_type" data-placeholder="Choose an option...">
                                            <optgroup label="Report Type">
                                                <option></option>
                                                <option value="1">List of beneficiaries who have not supported by any items</option>
                                                <option value="2">List beneficiaries  who haven’t  supported with the selected items</option>
                                                <option value="4">List of beneficiaries supplied with particular items</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Export Type</label>
                                        <select  class="form-control" data-live-search="true" data-width="100%" name="export_type" id="export_type" data-placeholder="Choose an option...">
                                            <optgroup label="Export Type">
                                                <option value="1" >Preview</option>
                                                <option value="2">Export to MS Excel</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-cogs"></i> Generate Report </button>
                            </div>
                            <div class="col-md-2 col-sm-2 ">
                                <button type="reset" class="btn btn-block btn-default"><i class="fa fa-refresh"></i> Reset </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8" id="output_advanced_search">

                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}


            </div>
        </div>
    </div>


</div>
