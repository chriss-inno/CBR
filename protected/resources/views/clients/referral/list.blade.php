    <?php $count=1;?>
    @if(count($clients )>0)
        @foreach($clients as $client)
            <tr class="odd gradeX">
                <td> {{$count++}} </td>
                <td>
                    {{$client->first_name	}}
                </td>
                <td>
                    {{$client->last_name}}
                </td>
                <td>
                    {{$client->middle_name}}
                </td>
                <td>
                    {{$client->sex}}
                </td>
                <td>
                    {{$client->age}}
                </td>
                <td>
                    {{$client->status}}
                </td>
                <td class="text-center" id="{{$client->id}}">
                    <a href="{{url('clients')}}/{{$client->id}}"  class="btn btn-icon-only blue"> <i class="fa fa-eye"></i> </a>
                </td>
                <td class="text-center" id="{{$client->id}}">
                    <a href="#"  class="btn btn-icon-only blue "> <i class="fa fa-edit"></i> </a>
                    <a href="#" class="btn btn-icon-only red deleteRecord"> <i class="fa fa-trash"></i> </a>
                </td>
            </tr>
        @endforeach
    @endif
