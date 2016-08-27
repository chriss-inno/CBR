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
                    HOSPITAL REFERRAL FORM  <br/>  NYARUGUSU CAMP
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
                    <th>Address</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        @if(is_object($referral->client) && $referral->client != null)
                            {{$referral->client->file_number}}
                        @endif
                    </td>
                    <td>
                        @if(is_object($referral->client) && $referral->client != null)
                            {{$referral->client->full_name}}
                        @endif
                    </td>
                    <td>
                        @if(is_object($referral->client) && $referral->client != null)
                            {{$referral->client->sex}}
                        @endif

                    </td>
                    <td>
                        @if(is_object($referral->client) && $referral->client != null)
                            {{$referral->client->age}}
                        @endif

                    </td>
                    <td>
                        @if(is_object($referral->client) && $referral->client != null)
                            {{$referral->client->address}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th colspan="5">Referred To/In</th>
                </tr>
                <tr>
                    <td colspan="5"><?php echo $referral->referral_to; ?></td>
                </tr>
                <tr>
                    <th colspan="5">History</th>
                </tr>
                <tr>
                    <td colspan="5"><?php echo $referral->history;?></td>
                </tr>
                <tr>
                    <th colspan="5">Examination</th>
                </tr>
                <tr>
                    <td colspan="5"><?php echo $referral->examination; ?></td>
                </tr>
                <tr>
                    <th colspan="5">Reason for referral</th>
                </tr>
                <tr>
                    <td colspan="5"><?php echo $referral->referral_reason; ?></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="4">Referred by:</th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Signature</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$referral->referred_by_name}}</td>
                        <td>{{$referral->referred_by_title}}</td>
                        <td>{{$referral->referred_by_date}}</td>
                        <td></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    <hr style="background-color: #e7ecf1 ; border-color: #e7ecf1 ;margin-bottom: 20px"/>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="4">Findings and Feedback on the plans:</th>
                </tr>
                <tr>
                    <td colspan="4" style="height: 300px;"><?php echo $referral->findings; ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Signature</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$referral->findings_name}}</td>
                    <td>{{$referral->findings_title}}</td>
                    <td>{{$referral->referred_by_date}}</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>