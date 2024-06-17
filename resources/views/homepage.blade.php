@include('header')

@if(session('role')=="admin")
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
        <div class="col-2 d-flex align-items-center">
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#registerModal">
                Add New &nbsp;
                <i class="material-icons align-middle">
                    person_add
                </i>
            </button>
        </div>
    </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col">
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
                                    <a class="btn btn-primary" href="{{ url('view/'.$item->id) }}">View</a>
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
@else
<div class="alert alert-danger mt-2">
    <div class="container-fluid">
        You are not allowed to view this page.
    </div>
</div>
@endif



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
    <div class="modal-dialog modal-dialog-centered modal-lg">
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
                            <div class="form-floating">
                                <input type="text" class="form-control" id="firstName" name="firstName" maxlength="50">
                                <label for="firstName" class="form-label">First Name</label>
                                <div class="invalid-feedback">Please enter your first name.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="lastName" name="lastName" maxlength="50">
                                <label for="lastName" class="form-label">Last Name</label>
                                <div class="invalid-feedback">Please enter your last name.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <div class="form-floating">
                                <select class="form-select" id="gender" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label for="gender" class="form-label">Gender</label>
                                <div class="invalid-feedback">Please select your gender.</div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="age" name="age">
                                <label for="age" class="form-label">Age</label>
                                <div class="invalid-feedback">Please enter your age.</div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" maxlength="12">
                                <label for="contactNumber" class="form-label">Contact Number</label>
                                <div class="invalid-feedback">Please enter your contact number.</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select" id="role" name="role">
                                    <option value="">Select role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                <label for="role" class="form-label">User Role</label>
                                <div class="invalid-feedback">Please select a role.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="userName" name="reg_userName" maxlength="20">
                                <label for="userName" class="form-label">Username</label>
                                <div class="invalid-feedback">Please enter a username.</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="reg_Password" maxlength="20">
                                <label for="password" class="form-label">Password</label>
                                <div class="invalid-feedback">Please enter a password.</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary w-50">Save User</button>
                        <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>



@include('footer')

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

<script>
    $('#age').on('input', function() {
        var value = $(this).val().replace(/[^0-9]/g, '');
        if (value.length > 3) {
            value = '100';
        }
        $(this).val(value);
    });

    $(document).ready(function() {
        $('#registerForm').submit(function(event) {
            var isValid = true;

            var firstName = $('#firstName').val().trim();
            if (firstName === '') {
                $('#firstName').addClass('is-invalid').removeClass('is-valid');
                isValid = false;
            } else {
                $('#firstName').removeClass('is-invalid').addClass('is-valid');
            }

            var lastName = $('#lastName').val().trim();
            if (lastName === '') {
                $('#lastName').addClass('is-invalid').removeClass('is-valid');
                isValid = false;
            } else {
                $('#lastName').removeClass('is-invalid').addClass('is-valid');
            }

            var gender = $('#gender').val();
            if (gender === '') {
                $('#gender').addClass('is-invalid').removeClass('is-valid');
                isValid = false;
            } else {
                $('#gender').removeClass('is-invalid').addClass('is-valid');
            }

            var age = $('#age').val().trim();
            if (age === '' || isNaN(age) || parseInt(age) <= 0) {
                $('#age').addClass('is-invalid').removeClass('is-valid');
                isValid = false;
            } else {
                $('#age').removeClass('is-invalid').addClass('is-valid');
            }

            var contactNumber = $('#contactNumber').val().trim();
            if (contactNumber === '') {
                $('#contactNumber').addClass('is-invalid').removeClass('is-valid');
                isValid = false;
            } else {
                $('#contactNumber').removeClass('is-invalid').addClass('is-valid');
            }

            var role = $('#role').val();
            if (role === '') {
                $('#role').addClass('is-invalid').removeClass('is-valid');
                isValid = false;
            } else {
                $('#role').removeClass('is-invalid').addClass('is-valid');
            }

            var userName = $('#userName').val().trim();
            if (userName === '') {
                $('#userName').addClass('is-invalid').removeClass('is-valid');
                isValid = false;
            } else {
                $('#userName').removeClass('is-invalid').addClass('is-valid');
            }

            var password = $('#password').val().trim();
            if (password === '') {
                $('#password').addClass('is-invalid').removeClass('is-valid');
                isValid = false;
            } else {
                $('#password').removeClass('is-invalid').addClass('is-valid');
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#table_users').DataTable();
    });
</script>
