<div class="portlet light bordered">
    <div class="portlet-body form">

        <div class="form-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="5" align="center" class="text-center"> Rehabilitation Register </th>
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
                        <?php echo $attendances->file_no; ?>
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
