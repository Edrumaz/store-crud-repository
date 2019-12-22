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

   <h1 class="title muted-text display-4"> See User</h1>
   <div class="row">  
      <div class="col-md-1"></div>
      <table class="table table-hover col-md-10">
         <thead>
            <tr>
               <th scope="col">User data</th>
               <th scope="col"></th>
            </tr>
         </thead> 
         <tbody>
            <tr>
               <th scope="row">#</th>
               <th>{{ $user->id }}</th>
            </tr>
            <tr>
               <th scope="row">Name:</th>
               <td>{{ $user->name }}</td>
            </tr>
            <tr>
               <th scope="row">Telephone number:</th>
               <td>{{ $user->telephone }}</td>
            </tr>
            <tr>
               <th scope="row">Date of birth:</th>
               <td>{{ $user->date_of_birth }}</td>
            </tr>
            <tr>
               <th scope="row">Username:</th>
               <td>{{ $user->username }}</td>
            </tr>
            <tr>
               <th scope="row">Email:</th>      
               <td>{{ $user->email }}</td>
            </tr>
         </tbody>
      </table>
   </div>
   <div class="row">
      <div class="col-md-1"></div>
      <div class="input-group-prepend col-md">
         <a class="btn btn-outline-primary col-md-3" href="/users/{{ $user->id }}/edit">Edit User</a>
         <div class="col-md-1"></div>
         <a class="btn btn-outline-secondary col-md-3" href="/users">Return</a>
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
