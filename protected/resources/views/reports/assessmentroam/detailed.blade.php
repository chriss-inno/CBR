<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
    <thead>
    <tr>
        <th> SNO </th>
        <th> File number  </th>
        <th> Client Name </th>
        <th> Sex </th>
        <th> Date of  Birth </th>
        <th>Disability </th>
        <th>Assessment Form </th>
        <th> Client Profile </th>
        <th class="text-center"> Action </th>
    </tr>
    </thead>
    <tbody>
    <?php $count=1;?>
    @if(count($clients )>0)
        @foreach($clients as $client)
            <tr class="odd gradeX">
                <td> {{$count++}} </td>
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
                <td class="text-center" id="{{$client->id}}">
                    @if(strtolower($client->status) =="disabled")
                        <a href="{{url('disabilities/clients/show')}}/{{$client->id}}"> <i class="fa fa-eye"></i> View form</a>
                    @else
                        {{$client->status}}
                    @endif

                </td>

                <td class="text-center" id="{{$client->id}}">
                    <a href="{{url('assessment/create')}}/{{$client->id}}"> <i class="fa fa-edit text-primary"></i> Edit </a>
                    <a href="#" class=" deleteRecordAssessment"> <i class="fa fa-trash text-danger"></i> Delete</a>
                </td>
                <td class="text-center" id="{{$client->id}}">
                    <a href="{{url('clients')}}/{{$client->id}}" > <i class="fa fa-eye"></i> View</a>
                </td>
                <td class="text-center" id="{{$client->id}}">
                    <a href="{{url('clients')}}/{{$client->id}}/edit" > <i class="fa fa-edit green fa-2x"></i> </a>
                    <a href="#" class=" deleteRecord d"> <i class="fa fa-trash text-danger fa-2x"></i> </a>
                </td>
            </tr>
        @endforeach
    @endif


    </tbody>
</table>