 <table border="1">
    <thead>
    <tr>
        <th colspan="22" align="center"> {{$startDate}} to {{$endDate}}</th>
    </tr>
    <tr>
        <th> Progress Number</th>
        <th> Full Name </th>
        <th> Address</th>
        <th> Item </th>
        <th> Category </th>
        <th> Quantity </th>
        <th> Donor Type </th>
        <th> Distributed Date </th>
    </tr>
    </thead>
     <tbody id="clientsSearchResults">
     <?php $count=1;?>
     @if(count($items )>0)
         @foreach($items as $item)
             <tr class="odd gradeX">
                 <td>
                     @if(is_object($item->beneficiary) && $item->beneficiary != null)
                         {{$item->beneficiary->progress_number}}
                     @endif
                 </td>
                 <td>
                     @if(is_object($item->beneficiary) && $item->beneficiary != null)
                         {{$item->beneficiary->full_name }}
                     @endif
                 </td>
                 <td>
                     @if(is_object($item->beneficiary) && $item->beneficiary != null)
                         {{$item->beneficiary->address}}
                     @endif
                 </td>
                 <td>
                     @if(is_object($item->item) && $item->item != null)
                         {{$item->item->item_name}}
                     @endif
                 </td>
                 <td>
                     @if(is_object($item->item) && $item->item != null)
                         {{ucwords($item->item->category->category_name)}}
                     @endif
                 </td>
                 <td>
                     <?php echo $item->quantity; ?>
                 </td>
                 <td>
                     <?php echo $item->donor_type; ?>
                 </td>
                 <td>
                     <?php echo $item->distributed_date; ?>
                 </td>
             </tr>
         @endforeach
     @endif


     </tbody>
</table>
