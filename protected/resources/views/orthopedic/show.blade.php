<div class="portlet light bordered">
    <div class="portlet-body form">

        <div class="form-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="5" align="center" class="text-center"> Orthopedic Register </th>
                </tr>
                <tr>
                    <th>File Number</th>
                    <th>Full Name</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Attending Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        @if(is_object($attendances->client) && $attendances->client != null)
                            {{$attendances->client->file_number}}
                        @endif
                    </td>
                    <td>
                        @if(is_object($attendances->client) && $attendances->client != null)
                            {{$attendances->client->full_name}}
                        @endif
                    </td>
                    <td>
                        @if(is_object($attendances->client) && $attendances->client != null)
                            {{$attendances->client->sex}}
                        @endif

                    </td>
                    <td>
                        @if(is_object($attendances->client) && $attendances->client != null)
                            {{$attendances->client->age}}
                        @endif

                    </td>
                    <td>
                        <?php echo $attendances->attendance_date; ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="5">Diagnosis</th>
                </tr>
                <tr>
                    <td colspan="5"><?php echo $attendances->diagnosis; ?></td>
                </tr>

                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="3" align="center" class="text-center"> Service details </th>
                </tr>
                <tr>
                    <th>Service Received</th>
                    <th>Item serviced</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                @if(is_object($attendances->items) && $attendances->items != null && count($attendances->items))
                    @foreach($attendances->items as $item)
                        <tr>
                            <td>{{$item->service_received}}</td>
                            <td>{{$item->item_serviced}}</td>
                            <td>{{$item->quantity}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <div class="form-actions">
            <div class="row">
                <div class="col-md-8 col-sm-8 pull-left" id="output">

                </div>
                <div class="col-md-4 col-sm-4 pull-right text-right">
                    <button type="button" class="btn btn-primary "  data-dismiss="modal">Close</button>

                </div>

            </div>
        </div>


    </div>
</div>
