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
                   Social Need/Supports Form
                </strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">

                <tbody>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Date</th>
                    <td class="col-md-10 col-sm-10 col-xs-10">

                    </td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Progress Number</th>
                    <td class="col-md-10 col-sm-10 col-xs-10">
                        @if(is_object($need->beneficiary) && $need->beneficiary != null)
                            {{$need->beneficiary->progress_number}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Name:</th>
                    <td class="col-md-10 col-sm-10 col-xs-10">
                        @if(is_object($need->beneficiary) && $need->beneficiary != null)
                            {{$need->beneficiary->full_name}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Sex</th>
                    <td class="col-md-10 col-sm-10 col-xs-10">
                        @if(is_object($need->beneficiary) && $need->beneficiary != null)
                            {{$need->beneficiary->sex}}
                        @endif

                    </td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Age</th>
                    <td class="col-md-10 col-sm-10 col-xs-10">
                        @if(is_object($need->beneficiary) && $need->beneficiary != null)
                            {{$need->beneficiary->age}}
                        @endif

                    </td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Location/Address: </th>
                    <td class="col-md-10 col-sm-10 col-xs-10">
                        @if(is_object($need->beneficiary) && $need->beneficiary != null)
                            {{$need->beneficiary->address}}
                        @endif
                    </td>
                </tr>


                </tbody>
            </table>
            <table class="table table-bordered">

                <tbody>
                <tr>
                    <th colspan="2">Assistance he/she needs:</th>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $need->assistance; ?></td>
                </tr>
                <tr>
                    <th >Status </th>
                    <td ><?php echo $need->status; ?></td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Date </th>
                    <td ><?php echo $need->date_attended; ?></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>
</body>
</html>
<div class="form-actions">
    <div class="row">
        <div class="col-md-8 col-sm-8 pull-left" id="output">

        </div>
        <div class="col-md-4 col-sm-4 pull-right text-right">
            <button type="button" class="btn btn-primary "  data-dismiss="modal">Close</button>
        </div>

    </div>
</div>
