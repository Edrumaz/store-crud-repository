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

  <h1 class="title muted-text display-4 text-center"> Update user</h1>

   <div class="row">
   <div class="col-sm-1"> </div>
      <form method="POST" class ="col-sm-7" action="/users/{{ $user->id }}/edit">
      @csrf
      @method('PATCH')
         <div class="form-group">
            <label for="nameInput">Full name</label>
            <input type="text" name="name" class="form-control" id="nameInput" placeholder="Enter name" value="{{ $user->name }}">
            @if ($errors->has('name'))
               <small class="form-text text-danger"> {{ $errors->first('name') }} </small>
            @endif
         </div>
         <div class="form-group">
            <label for="numberInput">Telephone Number</label>
            <input type="number" name="telephone" class="form-control" id="numberInput" placeholder="Enter telephone number" value= "{{ $user->telephone }}">
            @if ($errors->has('telephone'))
               <small class="form-text text-danger"> {{ $errors->first('telephone') }} </small>
            @endif
         </div>
         <div class="form-group">
            <label for="date_of_birth">Date of birth</label>
            <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="Enter date of birth" value= "{{ $user->date_of_birth }}">
            @if ($errors->has('date_of_birth'))
               <small class="form-text text-danger"> {{ $errors->first('date_of_birth') }} </small>
            @endif
         </div>
         <div class="form-group">
            <label for="usernameInput">Username</label>
            <input type="text" name="username" class="form-control" id="usernameInput" placeholder="Enter username" value="{{ $user->username }}">
            @if ($errors->has('username'))
               <small class="form-text text-danger"> {{ $errors->first('username') }} </small>
            @endif
         </div>
         <div class="form-group">
            <label for="emailInput">Email address</label>
            <input type="email" name="email" class="form-control" id="emailInput" placeholder="Enter email" value="{{ $user->email }}">
            @if ($errors->has('email'))
               <small class="form-text text-danger"> {{ $errors->first('email') }} </small>
            @endif
         </div>
         <div class="input-group-prepend col-md">
            <button type="submit" class="btn btn-primary col-md-3">Update user</button>
            <div class="col-md-1"></div>
            <a class="btn btn-outline-secondary col-md-3" href="/users">Return</a>
         </div>
      </form>
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
