<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('header')
   <body>
       <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div class="col-12 col-md-6 col-lg-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                  <div class="text-center mt-3">
                    <h4>USER LOGIN</h4>
                  </div>
                    <form id="loginForm" action="homepage" method="POST">
                        <div class="card-body p-4">
                          @if($errors->any())
                              <div class="alert alert-danger pb-0">
                                  <ul>
                                      @foreach($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                            @csrf
                            <div class="form-floating mb-3">
                              <input type="text" id="username" maxlength="10" name="username" class="form-control" autocomplete="off" />
                              <label for="username">
                                  <span class="material-icons" style="font-size:small">person</span>
                                  Username:
                              </label>
                              <div class="invalid-feedback">Please enter your username.</div>
                          </div>
                          
                          <div class="form-floating">
                              <input type="password" id="userpassword" maxlength="15" name="userpassword" class="form-control"  autocomplete="off" />
                              <label for="userpassword">
                                  <span class="material-icons" style="font-size:small">lock</span>
                                  Password:
                              </label>
                              <div class="invalid-feedback">Please enter your password.</div>
                          </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary w-100 mb-2" type="submit">
                                Login
                            </button>
                            <div class="me-auto">
                              <span>Don't have an account?</span>
                              <a href="" data-bs-toggle="modal" data-bs-target="#registerModal">
                                  Create Here
                              </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       </div>


<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gray-100">
        <h5 class="modal-title" id="registerModalLabel">Register New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="registerForm" method="POST" action="register">
            @csrf
          <div class="row mb-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="firstName" name="firstName" autocomplete="off">
                <label for="firstName" class="form-label">First Name</label>
                <div class="invalid-feedback">Please enter your first name.</div>
              </div>
              
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="lastName" name="lastName" autocomplete="off">
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
                <div class="invalid-feedback">Please select gender.</div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-floating">
                <input type="number" class="form-control" id="age" name="age" maxlength="100"  autocomplete="off">
                <label for="age" class="form-label">Age</label>
                <div class="invalid-feedback">Please enter your valid age.</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="tel" class="form-control" id="contactNumber" name="contactNumber"  autocomplete="off" maxlength="15">
                <label for="contactNumber" class="form-label">Contact Number</label>
                <div class="invalid-feedback">Please enter your contact number.</div>
              </div>
              
            </div>
          </div>
          <hr>
          <div class="row mb-2">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="userName" name="reg_userName"  autocomplete="off">
                <label for="userName" class="form-label">Username</label>
                <div class="invalid-feedback">Please enter a username.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="password" class="form-control" id="password" name="reg_Password"  autocomplete="off">
                <label for="password" class="form-label">Password</label>
                <div class="invalid-feedback">Please enter a password.</div>
              </div>
             
                
            </div>
          </div>
          <div class="float-end">
            <button type="submit" class="btn btn-primary" >Save changes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@include('footer')
</body>
</html>

<script>
  $(document).ready(function() {
      $('#loginForm').submit(function(event) {
          var username = $('#username').val();
          var password = $('#userpassword').val();
          var isValid = true;

          if (username.trim() === '') {
              $('#username').addClass('is-invalid');
              isValid = false;
          } else {
              $('#username').removeClass('is-invalid');
          }

          if (password.trim() === '') {
              $('#userpassword').addClass('is-invalid');
              isValid = false;
          } else {
              $('#userpassword').removeClass('is-invalid');
          }

          if (!isValid) {
              event.preventDefault();
          }
      });
  });
</script>

<script>
  $(document).ready(function() {
      $('#registerForm').submit(function(event) {
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

          var contactNumber = $('#contactNumber').val().trim();
          if (contactNumber === '') {
              $('#contactNumber').addClass('is-invalid');
              isValid = false;
          } else {
              $('#contactNumber').removeClass('is-invalid');
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
      });
  });
</script>
