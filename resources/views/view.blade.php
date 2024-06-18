@include('header')

<body style="background-color:lightgray">
    <div class="container mt-4">
        @if(session('id') == $data['id'] || session('role') == "admin")
            <div class="card rounded-0 bg-light mb-2">
                <div class="card-body pb-0">
                    <nav aria-label="breadcrumb">
                        @if(session('role') == "admin")
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">
                                    <a href="/homepage">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">View</li>
                            </ol>
                        @elseif(session('role') == "user")
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Home</li>
                            </ol>
                        @endif
                    </nav>
                </div>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="card rounded-0">
                <div class="card-body">
                    <form action="/edit" method="POST" id="editForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex justify-content-center border">
                                    <img src="{{ URL('images/neutral-user.png')}}" alt="User Image">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="alert alert-info" id="viewInfoMessage">
                                    You are currently viewing this user. To edit, click on the <span class="badge bg-primary">Edit User</span> button.
                                </div>
                                <div class="alert alert-warning" id="editInfoMessage" style="display: none;">
                                    You've activated the <strong>edit mode</strong>. Feel free to adjust and modify the details, but remember to double-check and proceed with caution.
                                </div>
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $data['firstName'] }}" disabled maxlength="50">
                                                <label for="firstName" class="form-label">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $data['lastName'] }}" disabled maxlength="50">
                                                <label for="lastName" class="form-label">Last Name</label>
                                            </div>
                                        </div>
                                </div>
                                
                                <div class="row mt-1">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="gender" name="gender" disabled>
                                                <option value="">Select Gender</option>
                                                <option value="Male" @if(isset($data) && $data['gender'] == 'Male') selected @endif>Male</option>
                                                <option value="Female" @if(isset($data) && $data['gender'] == 'Female') selected @endif>Female</option>
                                            </select>
                                            <label for="gender" class="form-label">Gender</label>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="age" name="age" value="{{ $data['age'] }}" disabled>
                                            <label for="age" class="form-label">Age</label>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control" id="contactNumber" name="contactNumber" value="{{ $data['contactNumber'] }}" disabled maxlength="12">
                                            <label for="contactNumber" class="form-label">Contact Number</label>
                                        </div>
                                    </div>
                                </div>
                                @if(session('role') != "admin")
                                @else
                                    <div class="row mt-1">
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" id="role" name="role" disabled>
                                                    <option value="">Select Role</option>
                                                    <option value="admin" @if(isset($data) && $data['role'] == 'admin') selected @endif>Admin</option>
                                                    <option value="user" @if(isset($data) && $data['role'] == 'user') selected @endif>User</option>
                                                </select>
                                                <label for="role" class="form-label">User Role</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row mt-2 mb-2">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="userName" name="reg_userName" value="{{ $data['reg_userName'] }}" disabled maxlength="20">
                                    <label for="userName" class="form-label">Username</label>
                                </div>
                            
                            
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="reg_Password" value="{{ $data['reg_Password'] }}" disabled maxlength="20">
                                    <label for="password" class="form-label">Password</label>
                                </div>
                            </div>
                        </div>
                        <div id="editButtons" class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <button id="editButton" type="button" class="btn btn-primary w-25 me-md-2">
                            <i class="material-icons align-middle">edit_note</i>
                                Edit User
                            </button>
                            <button type="submit" class="btn btn-success w-25 d-none" id="saveChangesButton">
                                <i class="material-icons align-middle">save</i>
                                Save changes
                            </button>
                            @if(session('role')=="admin")
                            <a class="btn btn-secondary" id="goBackButton" href="/homepage">
                                <i class="material-icons align-middle">
                                        arrow_back
                                </i>
                                Go back to list
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="alert alert-danger mt-2">
                <div class="container-fluid">
                    You are not allowed to view this page.
                    <a href="{{ url('view/' . session('id')) }}">Click here to return to your profile page.</a>
                </div>
            </div>
        @endif
       
    </div>
</body>

@include('footer')

<script>
   // Function to toggle visibility of alert messages
function toggleAlertMessages(viewVisible, editVisible) {
    document.getElementById('viewInfoMessage').style.display = viewVisible ? 'block' : 'none';
    document.getElementById('editInfoMessage').style.display = editVisible ? 'block' : 'none';
}

// Function to toggle readonly attribute of input fields
function toggleReadOnly() {
    const inputs = document.querySelectorAll('input[disabled]');
    const selects = document.querySelectorAll('select[disabled]');

    inputs.forEach(input => input.disabled = !input.disabled);
    selects.forEach(select => select.disabled = !select.disabled);

    // Toggle visibility of buttons
    const editButton = document.getElementById('editButton');
    const saveChangesButton = document.getElementById('saveChangesButton');
    editButton.classList.toggle('d-none');
    saveChangesButton.classList.toggle('d-none');

    // Toggle visibility of alert messages
    toggleAlertMessages(false, true);
}

// Add event listener to edit button
document.getElementById('editButton').addEventListener('click', function () {
    toggleReadOnly();
});
</script>

<script>
    $(document).ready(function() {
        $('#editForm').submit(function(event) {
            var isValid = true;

            var firstName = $('#firstName').val().trim();
            if (firstName === '') {
                $('#firstName').addClass('is-invalid');
                isValid = false;
            } else {
                $('#firstName').removeClass('is-invalid');
            }

            var lastName = $('#lastName').val().trim();
            if (lastName === '') {
                $('#lastName').addClass('is-invalid');
                isValid = false;
            } else {
                $('#lastName').removeClass('is-invalid');
            }

            var gender = $('#gender').val();
            if (gender === '') {
                $('#gender').addClass('is-invalid');
                isValid = false;
            } else {
                $('#gender').removeClass('is-invalid');
            }

            var age = $('#age').val().trim();
            if (age === '' || isNaN(age) || parseInt(age) <= 0) {
                $('#age').addClass('is-invalid');
                isValid = false;
            } else {
                $('#age').removeClass('is-invalid');
            }

            // Check if age exceeds 3 digits
            if (age.length > 3) {
                $('#age').val('100');
            }

            var contactNumber = $('#contactNumber').val().trim();
            if (contactNumber === '') {
                $('#contactNumber').addClass('is-invalid');
                isValid = false;
            } else {
                $('#contactNumber').removeClass('is-invalid');
            }

            var role = $('#role').val();
            if (role === '') {
                $('#role').addClass('is-invalid');
                isValid = false;
            } else {
                $('#role').removeClass('is-invalid');
            }

            var userName = $('#userName').val().trim();
            if (userName === '') {
                $('#userName').addClass('is-invalid');
                isValid = false;
            } else {
                $('#userName').removeClass('is-invalid');
            }

            var password = $('#password').val().trim();
            if (password === '') {
                $('#password').addClass('is-invalid');
                isValid = false;
            } else {
                $('#password').removeClass('is-invalid');
            }

            if (!isValid) {
                event.preventDefault();
            }
            else {
              $('#saveChangesButton').prop('disabled', true);
              $('#saveChangesButton').html('Please wait...');
              $('#goBackButton').addClass('disabled');
            }
        });

        // Add event listener to age input
        $('#age').on('input', function() {
            var value = $(this).val().replace(/[^0-9]/g, '');
            if (value.length > 3) {
                value = '100';
            }
            $(this).val(value);
        });
    });
</script>