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
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#registerModal">Add</button>
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
        <div class="row">
            <div class="col-4">
                
            </div>
            <div class="col-8">
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
                                    <a class="btn btn-primary" href="{{ url('edit/'.$item->id) }}">Edit</a>
                                    <a class="btn btn-danger delete-btn" data-item-id="{{ $item->id }}" href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Delete</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a id="confirmDeleteButton" href="#" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Register New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="registerForm" method="POST" action="{{ url('register') }}">
              @csrf
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required maxlength="50">
              </div>
              <div class="col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required maxlength="50">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
              </div>
              <div class="col-md-4">
                <label for="contactNumber" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required maxlength="12">
              </div>
            </div>
            <hr>
            <div class="row mt-2">
                <div class="col">
                    <label for="role" class="form-label">User Role</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="">Select role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
                
            <div class="row mt-2">
                <div class="col-6">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" class="form-control" id="userName" name="reg_userName" required maxlength="30">
                </div>
                <div class="col-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="reg_Password" required>
                </div>
            </div>
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const itemId = button.getAttribute('data-item-id');
                confirmDeleteButton.setAttribute('href', '{{ url('delete/') }}/' + itemId);
            });
        });
    });
</script>


@include('footer')
<script type="text/javascript">
    $(document).ready(function () {
        $('#table_users').DataTable();
    });
</script>
