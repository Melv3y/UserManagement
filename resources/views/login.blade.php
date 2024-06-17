<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('header')
   <body>
       
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4 ">
            <div class="row h-50">

            </div>
            <div class="row h-25">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <div class="col">

                <div class="card">
                    <div class="card-header">
                        User Login 
                    </div>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="homepage" method="POST">
                    <div class="card-body p-2">
                        @csrf
                        <input type="text" id="username" maxlength="10" name="username" class="form-control" placeholder="Enter User ID"/>
                        <span class="text-danger">@error('username'){{$message}}@enderror</span>
                
                        <input type="password" id="userpassword" maxlength="15" name="userpassword" class="form-control" placeholder="Enter User Password"/>
                        <span class="text-danger">@error('userpassword'){{$message}}@enderror</span>
                    </div>
                    <div class="card-footer justify-content-between">
                        <button class="btn btn-primary mt-4 w-100" type="submit">
                            Login
                        </button>
                        <button class="btn btn-success mt-4 w-100" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">
                            Create Account
                        </button>
                    </div>
                </form>
                
                </div>
                </div>
                
                
            </div>
            
        </div>
        <div class="col-4">

        </div>
    </div>
   

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="registerForm" method="POST" action="register">
            @csrf
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" required>
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
              <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required>
            </div>
          </div>
          <hr>
          <div class="mb-3">
            <label for="userName" class="form-label">Username</label>
            <input type="text" class="form-control" id="userName" name="reg_userName" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="reg_Password" required>
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

@include('footer')
</body>
</html>
