@include('header')
<div class="container mt-4">
    <div class="row mb-2">
        <div class="col-10">
            <div class="card rounded-0 bg-light">
                <div class="card-body pb-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-1 d-flex align-items-center">
            <button type="button" class="btn btn-primary w-100">Add</button>
        </div>
        <div class="col-1 d-flex align-items-center">
            <a class="btn btn-secondary w-100 text-center" href="/logout">Logout</a>
        </div>
    </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <table id="table_users" class="table table-bordered">
                <thead class="table-primary text-uppercase border-0">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Contact Number</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($collection as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->firstName }} {{ $item->lastName }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->age }}</td>
                        <td>{{ $item->contactNumber }}</td>
                        <td>
                            <a href="{{ url('edit/'.$item->id) }}">Edit</a>
                            <a href="{{ url('delete/'.$item->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</div>


@include('footer')
<script type="text/javascript">
    $(document).ready(function () {
        $('#table_users').DataTable();
    });
</script>
