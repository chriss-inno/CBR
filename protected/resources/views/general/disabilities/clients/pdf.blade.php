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
                    Disability Registration Form
                </strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">

                <tbody>
                <tr>





                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">File Number</th>
                    <td class="col-md-10 col-sm-10 col-xs-10">
                        @if(is_object($disability->client) && $disability->client != null)
                            {{$disability->client->file_number}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Name:</th>
                    <td class="col-md-10 col-sm-10 col-xs-10">
                        @if(is_object($disability->client) && $disability->client != null)
                            {{$disability->client->full_name}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Sex</th>
                    <td class="col-md-10 col-sm-10 col-xs-10">
                        @if(is_object($disability->client) && $disability->client != null)
                            {{$disability->client->sex}}
                        @endif

                    </td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Age</th>
                    <td class="col-md-10 col-sm-10 col-xs-10">
                        @if(is_object($disability->client) && $disability->client != null)
                            {{$disability->client->age}}
                        @endif

                    </td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Camp:</th>
                    <td class="col-md-10 col-sm-10 col-xs-10">

                    </td>
                </tr>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2">Location/Address: </th>
                    <td class="col-md-10 col-sm-10 col-xs-10">
                        @if(is_object($disability->client) && $disability->client != null)
                            {{$disability->client->address}}
                        @endif
                    </td>
                </tr>


                </tbody>
            </table>
            <table class="table table-bordered">

                <tbody>
                <tr>
                    <th colspan="2">Disability/Diagnosis:</th>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $disability->disability_diagnosis; ?></td>
                </tr>
                <tr>
                    <th >Category</th>
                    <td ><?php echo $disability->category_name; ?></td>
                </tr>
                <tr>
                    <th colspan="2">Remarks:</th>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $disability->remarks; ?></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
    <hr style="background-color: #e7ecf1 ; border-color: #e7ecf1 ;margin-bottom: 20px"/>
    <p>The above named person has been assessed and recognized to have a significant disability by <strong> Medical rehabilitation (CBR) specialist (Physiotherapist/ Orthopaedic Technologist / Orthopaedic Surgeon or </strong>Medical Doctor under the jurisdiction of International Rescue Committee (IRC) Tanzania</p>
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">
                <tbody>
                   <tr>
                       <th class="col-md-1 col-xs-1 col-lg-1">Name:</th>
                       <th class="col-md-5 col-xs-5 col-lg-5"></th>
                       <th class="col-md-1 col-xs-1 col-lg-1">Sign:</th>
                       <th class="col-md-5 col-xs-5 col-lg-5"></th>
                   </tr>
                   <tr>
                       <th class="col-md-1 col-xs-1 col-lg-1">Date:</th>
                       <th class="col-md-11 col-xs-11 col-lg-11" colspan="3"></th>
                   </tr>
                   <tr>
                       <th class="col-md-1 col-xs-1 col-lg-1">Title:</th>
                       <th class="col-md-11 col-xs-11 col-lg-11" colspan="3"></th>
                   </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>