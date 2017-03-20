 <table border="1">
    <thead>
    <tr>
        <th> SNO</th>
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
                 <td>{{$count++}}</td>
                 <td>
                     @if(is_object(\App\MaterialSupportItem::find($item->id)->beneficiary) && \App\MaterialSupportItem::find($item->id)->beneficiary != null)
                         {{\App\MaterialSupportItem::find($item->id)->beneficiary->progress_number}}
                     @endif
                 </td>
                 <td>
                     @if(is_object(\App\MaterialSupportItem::find($item->id)->beneficiary) && \App\MaterialSupportItem::find($item->id)->beneficiary != null)
                         {{\App\MaterialSupportItem::find($item->id)->beneficiary->full_name }}
                     @endif
                 </td>
                 <td>
                     @if(is_object(\App\MaterialSupportItem::find($item->id)->beneficiary) && \App\MaterialSupportItem::find($item->id)->beneficiary != null)
                         {{\App\MaterialSupportItem::find($item->id)->beneficiary->address}}
                     @endif
                 </td>
                 <td>
                     @if(is_object(\App\MaterialSupportItem::find($item->id)->item) && \App\MaterialSupportItem::find($item->id)->item != null)
                         {{\App\MaterialSupportItem::find($item->id)->item->item_name}}
                     @endif
                 </td>
                 <td>
                     @if(is_object(\App\MaterialSupportItem::find($item->id)->item) && \App\MaterialSupportItem::find($item->id)->item != null)
                         {{ucwords(\App\MaterialSupportItem::find($item->id)->item->category->category_name)}}
                     @endif
                 </td>
                 <td>
                     <?php echo $item->quantity; ?>
                 </td>
                 <td>
                     @if(is_object(\App\MaterialSupportItem::find($item->id)->distribution) && \App\MaterialSupportItem::find($item->id)->distribution != null)
                         {{ucwords(\App\MaterialSupportItem::find($item->id)->distribution->donor_type)}}
                     @endif
                 </td>
                 <td>
                     <?php echo $item->distributed_date; ?>
                 </td>
             </tr>
         @endforeach
     @endif


     </tbody>
</table>
