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

   <h1 class="title muted-text display-2"> See product details</h1>
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
               <th>{{ $product->id }}</th>
            </tr>
            <tr>
               <th scope="row">Name:</th>
               <td>{{ $product->name }}</td>
            </tr>
            <tr>
               <th scope="row">SKU:</th>
               <td>{{ $product->sku }}</td>
            </tr>
            <tr>
               <th scope="row">Quantity:</th>
               <td>{{ $product->quantity }}</td>
            </tr>
            <tr>
               <th scope="row">Price:</th>
               <td>{{ $product->price }}</td>
            </tr>
            <tr>
               <th scope="row">Picture:</th>      
               @if($product->picture != null)
                  <td><img src="/img/products/{{ $product->picture }}" height="150" width="150"></td>
               @endif
               @if ($product->picture == null)
                  <td><img src="/img/unavailable.jpg" height="150" width="150"></td>
               @endif
            </tr>
         </tbody>
      </table>
   </div>
   <div class="row">
      <div class="col-md-1"></div>
      <div class="input-group-prepend col-md">
         <a class="btn btn-outline-primary col-md-2" href="/products/{{ $product->id }}/edit">Edit Product</a>
         <div class="col-md-1"></div>
         <a class="btn btn-outline-secondary col-md-2" href="/products">Return</a>
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
