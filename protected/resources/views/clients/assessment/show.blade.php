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
                   ASSESSMENT FORM- NYARUGUSU CAMP
                </strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>
                        @if(is_object($assessment->client) && $assessment->client != null)
                            {{$assessment->client->date_registered}}
                        @endif
                    </th>
                    <th class="text-right">File Number</th>
                    <th>
                        @if(is_object($assessment->client) && $assessment->client != null)
                            {{$assessment->client->file_number}}
                        @endif
                    </th>
                    </tr>
                </thead>
                </table>
            </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Address</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        @if(is_object($assessment->client) && $assessment->client != null)
                            {{$assessment->client->full_name}}
                        @endif
                    </td>
                    <td>
                        @if(is_object($assessment->client) && $assessment->client != null)
                            {{$assessment->client->sex}}
                        @endif

                    </td>
                    <td>
                        @if(is_object($assessment->client) && $assessment->client != null)
                            {{$assessment->client->age}}
                        @endif

                    </td>
                    <td>
                        @if(is_object($assessment->client) && $assessment->client != null)
                            {{$assessment->client->address}}
                        @endif
                    </td>
                </tr>

                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                   <tr>
                       <th>Diagnosis:</th>
                   </tr>
                    <tr>
                        <td><?php echo $assessment->diagnosis; ?></td>
                    </tr>
                   <tr>
                       <th>Medical History:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->medical_history; ?></td>
                   </tr>
                   <tr>
                       <th>Social History:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->social_history; ?></td>
                   </tr>
                   <tr>
                       <th>School/employment:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->employment; ?></td>
                   </tr>
                   <tr>
                       <th>Skin condition:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->skin_condition; ?></td>
                   </tr>
                   <tr>
                       <th>Activities of daily living:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->daily_activities; ?></td>
                   </tr>
                   <tr>
                       <th>Remarks:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->remarks; ?></td>
                   </tr>
                   <tr>
                       <th>Joint assessment:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->joint_assessment; ?></td>
                   </tr>
                   <tr>
                       <th>Muscle assessment:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->muscle_assessment; ?></td>
                   </tr>
                   <tr>
                       <th>Functional assessment:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->functional_assessment; ?></td>
                   </tr>
                   <tr>
                       <th>Problem list:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->problem_list; ?></td>
                   </tr>
                   <tr>
                       <th>Treatment:</th>
                   </tr>
                   <tr>
                       <td><?php echo $assessment->treatment; ?></td>
                   </tr>

                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="4">Examined By:</th>
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
                    <td><?php echo $assessment->examiner_name; ?></td>
                    <td><?php echo $assessment->examiner_title; ?></td>
                    <td><?php  if($assessment->consultation_date != "") echo date("j F, Y",strtotime($assessment->consultation_date)); ?></td>
                    <td></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>