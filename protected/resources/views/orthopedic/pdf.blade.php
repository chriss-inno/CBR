<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<head>
    <link rel="stylesheet" type="text/css" href="{{asset("assets/global/plugins/bootstrap/css/bootstrap.min.css")}}"  media='all'>
</head>
<body>
<div class="portlet-body form">
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <img src="{{asset('assets/logo.png')}}" width="100px" height="100px"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <h3><strong>INTERNATIONAL RESCUE COMMITTEE</strong></h3> <br/>
            Box 259, Kasulu Field Office<br/>
            Tel : 028 2810705 ;  Fax : 028 2810706<br/>
            Email : irc.kasulu@tanzania.theirc.org
        </div>
    </div>
    <hr style="background-color: #e7ecf1 ; border-color: #e7ecf1 ;margin-bottom: 20px"/>
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <h4><strong>
                    COMMUNITY BASED REHABILITATION PROGRAMME (CBR)<br/>
                    PROGRAMME DE REHABILITATION SUR BASE COMMUNAUTAIRE (PRBC)<br/>
                    <br/>
                   ORTHOPEDIC REGISTER
                </strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">
                <thead>
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
    </div>
</div>
</body>
</html>