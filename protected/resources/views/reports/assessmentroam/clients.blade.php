
<table border="1">
    <thead>
    <tr>
        <th colspan="22" align="center">All clients details</th>
    </tr>
    <tr>
        <th colspan="5" align="center">Client Details</th>
        <th colspan="14" align="center">Assessment Details</th>
        <th colspan="3" align="center">Disability Details</th>
    </tr>
    <tr>
        <th> Date registered </th>
        <th> File number  </th>
        <th> Client Name </th>
        <th> Sex </th>
        <th>Date of  Birth </th>
        <th>Nationality </th>
        <th>Date of first consultation </th>
        <th>Consultation No </th>
        <th>Diagnosis </th>
        <th>Medical History</th>
        <th>School/employment </th>
        <th>Social History </th>
        <th> Skin condition </th>
        <th> Activities of daily living </th>
        <th> Joint assessment </th>
        <th> Muscle assessment </th>
        <th> Functional assessment </th>
        <th> Problem list </th>
        <th> Treatment </th>
        <th> Remarks </th>
        <th>Disability Category</th>
        <th>Disability/Diagnosis</th>
        <th>Remarks</th>
    </tr>
    </thead>
    <tbody>
    <?php $count=1;?>
    @if(count($clients )>0)
        @foreach($clients as $client)
            <tr class="odd gradeX">
                <td> {{$client->date_registered}} </td>
                <td>
                    {{$client->file_number}}
                </td>
                <td>
                    {{$client->first_name ." ".$client->last_name}}
                </td>
                <td>
                    {{$client->sex}}
                </td>
                <td>
                    {{$client->dob}}
                </td>
                <td>
                    {{ucwords($client->nationality)}}
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->consultation_date;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->consultation_no;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->diagnosis;?>
                        @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->medical_history;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->employment;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->social_history;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->skin_condition;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->daily_activities;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->joint_assessment;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->muscle_assessment;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->functional_assessment;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->problem_list;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->treatment;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->assessment->remarks;?>
                    @endif
                </td>
                <td>
                    @if($client->category_id != "")
                        <?php $discat=\App\Disability::find($client->category_id);?>
                       {{$discat->category}}
                    @endif

                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->disability_diagnosis;?>
                    @endif
                </td>
                <td>
                    @if(count($client->assessment) >0 && $client->assessment !="" && $client->assessment != null)
                        <?php echo $client->remarks;?>
                    @endif
                </td>
            </tr>
        @endforeach
    @endif


    </tbody>
</table>
