@include('header')
<div class="container mt-4">
    
        <div class="card rounded-0 bg-light mb-2">
            <div class="card-body pb-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="/homepage">Homepage</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">View User</li>
                    </ol>
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
                <form action="/edit" method="POST">
                    @csrf
                    <input type="hidden" name="id" value={{$data['id']}}>
                    <div class="row">
                            <div class="col-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required value={{$data['firstName']}}>
                            </div>
                            <div class="col-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required value={{$data['lastName']}}>
                            </div>
                    </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male" @if(isset($data) && $data['gender'] == 'Male') selected @endif>Male</option>
                                        <option value="Female" @if(isset($data) && $data['gender'] == 'Female') selected @endif>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" id="age" name="age" required  value={{$data['age']}}>
                                </div>
                                <div class="col-md-4">
                                    <label for="contactNumber" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required value={{$data['contactNumber']}}>
                                </div>
                            </div>
                    <hr>
                    <div class="row mt-2 mb-2">
                        <div class="col-6">
                            <label for="userName" class="form-label">Username</label>
                            <input type="text" class="form-control" id="userName" name="reg_userName" required value={{$data['reg_userName']}}>
                        </div>
                        <div class="col-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="reg_password" required value={{$data['reg_Password']}}>
                        </div>
                    </div> 
                    <button type="submit" class="btn btn-primary w-25" >Save changes</button>
                    <a class="btn btn-secondary w-25" href="/homepage">Cancel</a>
                </form>
            </div>
        </div>
</div>

@include('footer')