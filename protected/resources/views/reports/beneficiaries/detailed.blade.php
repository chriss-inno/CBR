<table >
    <thead>
    <tr>
        <th colspan="10" align="center" bgcolor="#cccccc"> Beneficiary Report as of {{$startDate}} to {{$endDate}} </th>

    </tr>
    <tr bgcolor="#cccccc">
        <th> Progress number </th>
        <th> Date of registration </th>
        <th> Full Name</th>
        <th> Sex</th>
        <th> Age </th>
        <th> Code </th>
        <th> Family size </th>
        <th> Number of females </th>
        <th> Number of males </th>
        <th> Category </th>
    </tr>
    </thead>
    <tbody >
    @if(count($beneficiaries )>0)
        @foreach($beneficiaries as $beneficiary)
            <tr class="odd gradeX">
                <td>
                    <?php echo $beneficiary->progress_number; ?>
                </td>
                <td>
                    <?php echo $beneficiary->date_registration; ?>
                </td>
                <td>
                    <?php echo $beneficiary->full_name; ?>
                </td>
                <td>
                    <?php echo $beneficiary->sex; ?>
                </td>

                <td>
                    <?php echo $beneficiary->age; ?>
                </td>
                <td>
                    <?php echo $beneficiary->code; ?>
                </td>
                <td>
                    <?php echo $beneficiary->family_size; ?>
                </td>
                <td>
                    <?php echo $beneficiary->number_females; ?>
                </td>
                <td>
                    <?php echo $beneficiary->number_male; ?>
                </td>
                <td>
                    <?php echo $beneficiary->category; ?>
                </td>
            </tr>
        @endforeach
    @endif


    </tbody>
</table>
