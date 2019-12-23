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

  <h1 class="title muted-text display-4"> Registered Products</h1>
  <div class="row">
    <div class="col-md-1"></div>
    <a class="btn btn-outline-info col-md-2" href="/products/create">Add Product</a>
    <div class="col-md-6"></div>
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/search-product/" method="POST">
    {{ csrf_field() }}
      <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small @error('searchValue') is-invalid @enderror" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="searchValue">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
        @if ($errors->has('searchValue'))
          <p class="form-text text-danger"> {{ $errors->first('searchValue') }} </p>
        @endif
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
          <th scope="col">SKU</th>
          <th scope="col">Quantity</th>
          <th scope="col" colspan="4">Price</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      @if(!empty($products) && $products->count())
      @foreach ($products as $product) 
      <tbody>
        <tr>
          <th scope="row">{{ $product->id }}</th>
          <td>{{ $product->name }}</td>
          <td>{{ $product->sku }}</td>
          <td>{{ $product->quantity }}</td>
          <td colspan="4">$ {{ $product->price }}</td>
          <td>{{ $product->description }}</td>
          <td>
            <div class="input-group-prepend">
              <a class="btn btn-outline-primary" href="/products/{{ $product->id }}">See product</a>
              <form method="POST" action="/products/{{ $product->id }}/delete">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger">Delete product</button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
      @else
      <tr>
            <td colspan="10" class="text-center">No data matched your search.</td>
        </tr>
      @endif
      </tbody>
    </table>
  </div>
  <div class="col">
  <div class="row">
    <div class="col"></div>
    <div class="col text-center"> 
      {{ $products->links() }}
    </div>
    <div class="col"></div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-1"></div>
    <div class="input-group-prepend col-md">
      <a class="col-md-2 btn btn-outline-secondary" href="/home">Return</a>
      <div class="col-md-1"></div>
      <a class="col-md-2 btn btn-outline-secondary" href="/products">Refresh</a>
    </div>
  </div>

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
