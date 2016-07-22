 <table border="1">
    <thead>
    <tr>
        <th colspan="22" align="center"> {{$startDate}} to {{$endDate}}</th>
    </tr>
    <tr>
        <th> Date of attending</th>
        <th> File Number </th>
        <th> Client Full Name </th>
        <th> Sex </th>
        <th> Age </th>
        <th> Nationality </th>
        <th> Diagnosis </th>
        <th> Service received </th>
        <th> Item serviced </th>
        <th> Quantity </th>


    </tr>
    </thead>
     <tbody id="clientsSearchResults">
     <?php $count=1;?>
     @if(count($attendances )>0)
         @foreach($attendances as $att)
             <tr class="odd gradeX">
                 <td>
                     @if(is_object($att->client) && $att->client != null)
                         {{$att->client->file_number}}
                     @endif
                 </td>
                 <td>
                     @if(is_object($att->client) && $att->client != null)
                         {{$att->client->first_name ." ". $att->client->last_name}}
                     @endif
                 </td>
                 <td>
                     @if(is_object($att->client) && $att->client != null)
                         {{$att->client->sex}}
                     @endif
                 </td>
                 <td>
                     @if(is_object($att->client) && $att->client != null)
                         {{$att->client->age	}}
                     @endif
                 </td>
                 <td>
                     @if(is_object($att->client) && $att->client != null)
                         {{ucwords($att->client->nationality)}}
                     @endif
                 </td>
                 <td>
                     <?php echo $att->diagnosis; ?>
                 </td>
                 <td>
                     <?php echo $att->service_received; ?>
                 </td>
                 <td>
                     <?php echo $att->item_serviced; ?>
                 </td>
                 <td>
                     <?php echo $att->quantity; ?>
                 </td>
             </tr>
         @endforeach
     @endif


     </tbody>
</table>
