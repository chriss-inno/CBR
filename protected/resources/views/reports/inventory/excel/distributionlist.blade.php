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
    @if(count($beneficiaries )>0)
        @foreach($beneficiaries as $beneficiary)
            <tr class="odd gradeX">
                <td>{{$count++}}</td>
                <td>
                    {{$beneficiary->progress_number}}
                </td>
                <td>
                    {{$beneficiary->full_name}}
                </td>
                <td>
                    {{$beneficiary->address}}
                </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        @endforeach
    @endif


    </tbody>
</table>
