<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
    <thead>
    <tr>
        <th> SNO </th>
        <th> Registration Date </th>
        <th> Progress number </th>
        <th> Full Name</th>
        <th> Age (Year)</th>
        <th> Sex </th>
        <th> Category </th>
        <th> Code </th>
        <th> Address </th>
        <th> Nationality </th>
        <th> Family Size </th>
        <th> Number of females </th>
        <th> Number of Males </th>
        <th> Diagnosis </th>
    </tr>
    </thead>
    <tbody id="clientsSearchResults">
    <?php $count=1;?>
    @if(count($beneficiaries )>0)
        @foreach($beneficiaries as $beneficiary)
            <tr class="odd gradeX">
                <td> {{$count++}} </td>
                <td>
                    <?php echo $beneficiary->date_registration; ?>
                </td>
                <td>
                    <?php echo $beneficiary->progress_number; ?>
                </td>
                <td>
                    <?php echo $beneficiary->full_name; ?>
                </td>
                <td>
                    <?php echo $beneficiary->age; ?>
                </td>
                <td>
                    <?php echo $beneficiary->sex; ?>
                </td>
                <td>
                    <?php echo $beneficiary->category; ?>
                </td>
                <td>
                    <?php echo $beneficiary->code; ?>
                </td>
                <td>
                    <?php echo $beneficiary->address; ?>
                </td>
                <td>
                    <?php echo $beneficiary->nationality; ?>
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
                    <?php echo $beneficiary->diagnosis; ?>
                </td>
            </tr>
        @endforeach
    @endif


    </tbody>
</table>