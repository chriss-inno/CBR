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
            <img src="{{asset('assets/logo.png')}}" widdiv="100px" height="100px"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <h3><strong>INTERNATIONAL RESCUE COMMITTEE</strong></h3> <br/>
            Box 259, Kasulu Field Office<br/>
            Tel : 028 2810705 ;  Fax : 028 2810706<br/>
            Email : irc.kasulu@tanzania.diveirc.org
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <h4><strong>
                    CBR - HOSPITAL REFERRAL FORM – IRC  NYARUGUSU CAMP.
                </strong></h4>
        </div>
    </div>
    <div class="row">
           <table width="100%">
               <tr>
                   <th class="col-md-3 col-xs-3">To</th>
                   <td colspan="3" class="col-md-9 col-xs-9">{{$referral->referral_to}}</td>
               </tr>
               <tr>
                   <th class="col-md-3 col-xs-3">Date</th>
                   <td colspan="3" class="col-md-9 col-xs-9">{{$referral->referral_date}}</td>
               </tr>
               <tr>
                   <th class="col-md-3 col-xs-3">Name</th>
                   <td colspan="3" class="col-md-9 col-xs-9">@if(is_object($referral->client) && $referral->client != null && $referral->client !="")
                           {{$referral->client->full_name}}
                       @endif</td>
               </tr>
               <tr>
                   <th class="col-md-3 col-xs-3">Age</th>
                   <td class="col-md-3 col-xs-3"> @if(is_object($referral->client) && $referral->client != null && $referral->client !="")
                           {{$referral->client->age}}
                       @endif</td>
                   <th class="col-md-3 col-xs-3">Sex</th>
                   <td class="col-md-3 col-xs-3"> @if(is_object($referral->client) && $referral->client != null && $referral->client !="")
                           {{$referral->client->sex}}
                       @endif</td>
               </tr>
           </table>
    </div>
    <div class="row" style="margin-top: 10px">
        <div class="col-md-12 col-xs-12"><strong>History: </strong><span style="border-bottom: 1px dotted #000" ><?php echo $referral->history;?></span></div>
    </div>
    <div class="row" style="margin-top: 10px">
        <div class="col-md-12 col-xs-12"><strong>Examination: </strong> <span style="border-bottom: 1px dotted #000" >
<?php echo $referral->examination;?>
            </span></div>
    </div>
    <div class="row" style="margin-top: 10px">
        <div class="col-md-12 col-xs-12"><strong>Reason for referral: </strong> <span style="border-bottom: 1px dotted #000" >
<?php echo $referral->referral_reason;?>
            </span></div>
    </div>
    <div class="row" style="margin-top: 10px">
        <div class="col-md-1 col-xs-1 text-bold"><strong> Referred by: </strong></div>
        <div class="col-md-10 col-xs-10">
            <table width="100%">
                <tr>
                    <th class="col-md-1 col-xs-1">Name:</th>
                    <td class="col-md-5 col-xs-5">{{$referral->referred_by_name}}</td>
                    <th class="col-md-1 col-xs-1">Title:</th>
                    <td class="col-md-5 col-xs-5">{{$referral->referred_by_title}}</td>
                </tr>
                <tr>
                    <th class="col-md-1 col-xs-1">Date:</th>
                    <td class="col-md-5 col-xs-5">{{$referral->referred_by_date}}</td>
                    <th class="col-md-1 col-xs-1">Signature:</th>
                    <td class="col-md-5 col-xs-5"></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row" style="margin-top: 10px">
        <div class="col-md-12 col-xs-12"><strong>Findings and Feedback on the plans:</strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12"></div>
    </div>
    <div class="row">
            <table width="100%">
                <tr>
                    <th class="col-md-3 col-xs-3">Name</th>
                    <td class="col-md-9 col-xs-9">……………………………………..</td>
                </tr>
                <tr>
                    <th class="col-md-3 col-xs-3">Title</th>
                    <td class="col-md-9 col-xs-9">………………………………………</td>
                </tr>
                <tr>
                    <th class="col-md-3 col-xs-3">Signature</th>
                    <td class="col-md-9 col-xs-9">…………………………</td>
                </tr>
            </table>
    </div>

    
</div>
</body>
</html>