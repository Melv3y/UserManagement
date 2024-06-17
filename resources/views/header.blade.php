<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>User Management System</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  
<nav class="navbar bg-dark">
  <div class="container-fluid justify-content-between">
    <a class="navbar-brand text-light" href="#">User Management System</a>
    @if(session('username'))
    <div >
      <span class="text-light pe-3">
        Logged id as: {{ session('role') }} - <span class="text-decoration-underline fw-bold">{{session('username')}}</span>
      </span>
      <a class="btn btn-sm btn-secondary text-center" href="/logout">
        <i class="material-icons align-middle" style="font-size:small;">
          logout
        </i>
        LOGOUT
        </a>
    </div>
      
    @endif
    
  </div>
</nav>