<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.head')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Navbar -->
    @include('layouts.nav')
    <!-- End of Navbar -->

  <h1 class="title muted-text display-4"> Registered Users</h1>
  <div class="row">
    <div class="col-md-1"></div>
    <a class="btn btn-outline-info col-md-2" href="/users/create">Create User</a>
    <div class="col-md-6"></div>
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/search/" method="POST" role="search">
    {{ csrf_field() }}
      <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </form>
  </div><br>
  <div class="row">
    <div class="col-md-1"></div>
    <table class="table table-hover table-secondary col-md-10">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Telephone</th>
          <th scope="col">Date of birth</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      @foreach ($users as $user) 
      <tbody>
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->telephone }}</td>
          <td>{{ $user->date_of_birth }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          <td>
            <div class="input-group-prepend">
              <a class="btn btn-outline-primary" href="/users/{{ $user->id }}">See User</a>
              <form method="POST" action="/users/{{ $user->id }}/delete">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger">Delete user</button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-1"></div>
      <a class="btn btn-outline-secondary col-md-2" href="/home">Return</a>
    </div>
  </div>

    <!-- Footer -->
    @include('layouts.footer')
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

@include('layouts.footer-scripts')

</body>

</html>
