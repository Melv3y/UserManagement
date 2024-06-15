@include('header')
<div class="container mt-4">
    <table class="table table-bordered">
        <thead class=" table-primary">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    Gender
                </th>
                <th>
                    Age
                </th>
                <th>
                    Contact Number
                </th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach($collection as $item)
            <tr>
                <td>{{$item['userID']}}</td>
                <td>{{$item['firstName']}} {{$item['lastName']}}</td>
                <td>{{$item['gender']}}</td>
                <td>{{$item['age']}}</td>
                <td>{{$item['contactNumber']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>