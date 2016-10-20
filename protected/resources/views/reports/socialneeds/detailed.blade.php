<table >
    <thead>
    <tr>
        <th colspan="10" align="center" bgcolor="#cccccc"> Social needs report as of {{$startDate}} to {{$endDate}} </th>

    </tr>
    <tr>
        <th> SNO </th>
        <th> Progress number </th>
        <th> Full Name</th>
        <th> Sex </th>
        <th> Age </th>
        <th> Status </th>
        <th> Assistance needs </th>
        <th> Date </th>
    </tr>
    </thead>
    <tbody id="clientsSearchResults">
    <?php $count=1;?>
    @if(count($needs )>0)
        @foreach($needs as $need)
            <tr class="odd gradeX">
                <td> {{$count++}} </td>
                <td>
                    <?php echo $need->progress_number; ?>
                </td>
                <td>
                    @if(count($need->beneficiary) > 0 && is_object($need->beneficiary))
                        <?php echo $need->beneficiary->full_name; ?>
                    @endif
                </td>
                <td>
                    @if(count($need->beneficiary) > 0 && is_object($need->beneficiary))
                        <?php echo $need->beneficiary->sex; ?>
                    @endif
                </td>
                <td>
                    @if(count($need->beneficiary) > 0 && is_object($need->beneficiary))
                        <?php echo $need->beneficiary->age; ?>
                    @endif
                </td>
                <td>
                    <?php echo $need->status; ?>
                </td>
                <td>
                    <?php echo $need->assistance; ?>
                </td>
                <td>
                    <?php echo $need->date_attended; ?>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
