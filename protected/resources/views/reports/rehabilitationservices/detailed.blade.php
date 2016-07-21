 <table border="1">
    <thead>
    <tr>
        <th colspan="22" align="center">Case review as  of {{$startDate}} to {{$endDate}}</th>
    </tr>
    <tr>
        <th> File Number</th>
        <th> Client Full Name </th>
        <th> Sex </th>
        <th>Date of  Birth </th>
        <th>Nationality </th>
        <th> Attending date </th>
        <th> Diagnosis </th>


    </tr>
    </thead>
     <tbody id="clientsSearchResults">
     <?php $count=1;?>
     @if(count($attendances )>0)
         @foreach($attendances as $att)
             <tr class="odd gradeX">
                 <td>
                     <?php echo $att->file_no; ?>
                 </td>
                 <td>
                     @if(is_object($att->client) && $att->client != null)
                         {{$att->client->first_name ." ".$att->client->last_name	}}
                     @endif
                 </td>
                 <td>
                     @if(is_object($att->client) && $att->client != null)
                         {{$att->client->sex }}
                     @endif
                 </td>
                 <td>
                     @if(is_object($att->client) && $att->client != null)
                         {{$att->client->dob }}
                     @endif
                 </td>
                 <td>
                     @if(is_object($att->client) && $att->client != null)
                         {{$att->client->nationality }}
                     @endif
                 </td>
                 <td>
                     <?php echo $att->attendance_date; ?>
                 </td>
                 <td>
                     <?php echo $att->diagnosis; ?>
                 </td>

             </tr>
         @endforeach
     @endif


     </tbody>
</table>
