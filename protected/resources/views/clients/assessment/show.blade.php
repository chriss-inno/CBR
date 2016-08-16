<div class="portlet-body form">
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <img src="{{asset('assets/logo.ico')}}" width="100px" height="100px"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <h3><strong>INTERNATIONAL RESCUE COMMITTEE</strong></h3> <br/>
            Box 259, Kasulu Field Office<br/>
            Tel : 028 2810705 ;  Fax : 028 2810706<br/>
            Email : irc.kasulu@tanzania.theirc.org
            <br/>

        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <h4><strong>
    COMMUNITY BASED REHABILITATION PROGRAMME (CBR)<br/>
    PROGRAMME DE REHABILITATION SUR BASE COMMUNAUTAIRE (PRBC)<br/>
                    <br/>
    ASSESSMENT FORM REHABILITATION<br/>
    FICHE D'EVALUATION POUR REHABILITATION<br/>
                </strong></h4> <br/>
            <br/>

        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>
    <div class="row">
        <div class="col-md-9 col-xs-9">
            <table border="0">
                <tr>
                    <th class="col-md-4 col-xs-4">Date of first consultation:<br/>
                        Date de premiere consultation</th>
                    <td class="col-md-5 col-xs-5">{{$assessment->client->date_registered}}</td>
                </tr>
            </table>
        </div>

        <div class="col-md-3 col-xs-3">
           <table border="0">
               <tr>
                   <th>No:</th>
                   <td style="border-bottom:#000000 solid 1px" class="text-center">{{$assessment->client->file_number}}</td>
               </tr>
           </table>
        </div>
        <br/>

    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>
    <div class="row">
        <div class="col-md-12 col-xs-12">
             <table border="0">
                 <tr>
                     <th>Name:<br/>
                         Nom:
                     </th>
                     <td>{{$assessment->client->full_name}}</td>
                 </tr>
                 <tr>
                     <th>Carers name:<br/>
                         Non du porteur/responsible:

                     </th>
                     <td></td>
                 </tr>
                 <tr>
                     <th>Sex:
                     </th>
                     <td>{{$assessment->client->sex}}</td>
                 </tr>
                 <tr>
                     <th>Date of  Birth:<br/>
                         Date de naissance:
                     </th>
                     <td>{{$assessment->client->age}}</td>
                 </tr>
                 <tr>
                     <th>Address:<br/>
                         Adresse:

                     </th>
                     <td>{{$assessment->client->address}}</td>
                 </tr>

             </table>
        </div>

    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Diagnosis:<br/>
                        Diagnostic:
                    </th>
                    <td></td>
                </tr>

            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
           <?php echo $assessment->diagnosis; ?>
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Medical History:<br/>
                        Histore medicale:
                    </th>
                    <td></td>
                </tr>
            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->medical_history; ?>
        </div>
    </div>
    <div class="row" style="margin-top: 10px">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Social History;<br/>
                        Histore Social
                    </th>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->social_history; ?>
        </div>
    </div>
    <div class="row" style="margin-top: 10px">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>School/employment<br/>
                        Fonction
                    </th>
                    <td></td>
                </tr>

            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->employment; ?>
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Skin condition<br/>
                        Condition de la peau
                    </th>
                    <td></td>
                </tr>

            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->skin_condition; ?>
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Activities of daily living:<br/>
                        Activites de la vie quotidienne

                    </th>
                    <td></td>
                </tr>

            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->daily_activities; ?>
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Remarks:<br/>
                        Remarques:
                    </th>
                    <td></td>
                </tr>

            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->remarks; ?>
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Joint assessment:<br/>
                        Etat des orticulations:
                    </th>
                    <td></td>
                </tr>

            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->joint_assessment; ?>
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Muscle assessment:<br/>
                        Evaluation musculaire:
                    </th>
                    <td></td>
                </tr>

            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->muscle_assessment; ?>
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Functional assessment:<br/>
                        Evaluation fonctionnel:
                    </th>
                    <td></td>
                </tr>

            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->functional_assessment; ?>
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Problem list:<br/>
                        Liste des problemes:
                    </th>
                    <td></td>
                </tr>

            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->problem_list; ?>
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table border="0">
                <tr>
                    <th>Treatment:<br/>
                        Traitement:

                    </th>
                    <td></td>
                </tr>

            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php echo $assessment->treatment; ?>
        </div>
    </div>
    <hr style="background-color: #000000; border-color: #000000;"/>



</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-4 col-sm-4 pull-right text-right">
            <button type="button" class="btn green btn-block "  data-dismiss="modal">Close</button>
        </div>
    </div>

</div>