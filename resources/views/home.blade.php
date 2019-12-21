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

    <div class="offset-md-1 row ">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7">
                <a href="/users">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="/img/user.jpg" alt="">
                </a>
                </div>
                <div class="col-md-5">
                <h3>Manage Users</h3>
                <p>Review user data and administrate users. </p>
                <a class="btn btn-primary" href="/users">View users</a>
                </div>
            </div>
            <!-- /.row -->
            <hr>            
            <div class="row">
                <div class="col-md-7">
                <a href="/products">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="/img/product.jpg" alt="">
                </a>
                </div>
                <div class="col-md-5">
                <h3>Manage Products</h3>
                <p>View all products available on the website.</p>
                <a class="btn btn-primary" href="/products">View Products</a>
                </div>
            </div>
        <div>
    </div>
      <!-- /.row -->

    <br><br><br><br><bnr><br><br>
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
