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
                    Material Supports distribution
                </strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">

                <tbody>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Date</th>
                    <td class="col-md-3 col-sm-3 col-xs-3">
                        {{$disbursement->distributed_date}}
                    </td>
                    <th class="col-md-2 col-sm-2 col-xs-2">Donor</th>
                    <td class="col-md-3 col-sm-3 col-xs-3">
                        {{$disbursement->donor_type}}
                    </td>
                    <th class="col-md-2 col-sm-2 col-xs-2">Distributed By</th>
                    <td class="col-md-3 col-sm-3 col-xs-3">
                        {{$disbursement->distributed_by}}
                    </td>
                </tr>
             </tbody>
            </table>

            <table class="table table-bordered">

                <tbody>
                <tr>
                    <th colspan="4" class="col-md-12 col-sm-12 col-xs-12 text-center">List of Beneficiaries Supported</th>
                </tr>
                <tr>
                    <th>SNO </th>
                    <th> Progress number </th>
                    <th> Full Name</th>
                    <th> Sex </th>
                    <th> Age (Year)</th>
                    <th >Item/materials distributed</th>
                    <th >Quantity</th>
                </tr>
                @if(is_object($disbursement->distributions) && count($disbursement->distributions) >0)
                    <?php $co=1;?>
                @foreach($disbursement->distributions as $distribution)
                <tr>
                    <td >{{$co++}} </td>
                    <td>
                        @if(is_object($distribution->beneficiary) && $distribution->beneficiary != null)
                        {{ $distribution->beneficiary->progress_number}}
                            @endif
                    </td>
                    <td>
                        @if(is_object($distribution->beneficiary) && $distribution->beneficiary != null)
                            {{ $distribution->beneficiary->full_name}}
                        @endif
                    </td>
                    <td>
                        @if(is_object($distribution->beneficiary) && $distribution->beneficiary != null)
                            {{ $distribution->beneficiary->sex}}
                        @endif
                    </td>
                    <td>
                        @if(is_object($distribution->beneficiary) && $distribution->beneficiary != null)
                            {{ $distribution->beneficiary->age}}
                        @endif
                    </td>
                    <td >@if(is_object($distribution->item) && $distribution->item != null )
                            {{$distribution->item->item_name}}
                        @endif</td>
                    <td >{{ $distribution->quantity}}</td>
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