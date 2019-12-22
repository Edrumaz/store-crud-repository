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

  <h1 class="title muted-text display-4 text-center"> Update product</h1>

   <div class="row">
   <div class="col-sm-1"> </div>
   <form method="POST" class ="col-md-7" action="/products/{{ $product->id}}/edit" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="form-group">
         <label for="skuInput">SKU number: </label>
         <input autofocus type="number" name="sku" class="form-control @error('sku') is-invalid @enderror" id="skuInput" placeholder="Enter SKU number" value="{{ $product->sku }}">
         @if ($errors->has('sku'))
               <p class="form-text text-danger"> {{ $errors->first('sku') }} </p>
         @endif
      </div>
      <div class="form-group">
         <label for="nameInput">Product name</label>
         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nameInput" placeholder="Enter name" value="{{ $product->name }}">
         @if ($errors->has('name'))
               <p class="form-text text-danger"> {{ $errors->first('name') }} </p>
         @endif
      </div>
      <div class="form-group">
         <label for="quantityInput">Quantity: </label>
         <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantityt" placeholder="Enter quantity number" value="{{ $product->quantity }}">
         @if ($errors->has('quantity'))
               <p class="form-text text-danger"> {{ $errors->first('quantity') }} </p>
         @endif
      </div>
      <div class="form-group">
         <label for="priceInput">Price: </label>
         <div class="input-group">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">$</span>
            </div>
            <input type="number" name="price" class="form-control currency" placeholder="Price" value="{{ $product->price }}" min="0" step="0.01">
         </div>
         @if ($errors->has('price'))
            <p class="form-text text-danger"> {{ $errors->first('price') }} </p>
         @endif
      </div>
      <div class="form-group">
         <label for="emailInput">Product description:</label>
         <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="descriptionInput" placeholder="Enter description" value="{{ $product->description }}" rows="7">{{ $product->description }}</textarea>
         @if ($errors->has('description'))
               <p class="form-text text-danger"> {{ $errors->first('description') }} </p>
         @endif
      </div>
      <div class="form-group">
         <label for="picture">Product's picture:</label>
         <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" id="pictureInput" placeholder="Select file" value="{{ $product->picture }}">
         @if ($errors->has('picture'))
               <p class="form-text text-danger"> {{ $errors->first('picture') }} </p>
         @endif
      </div>
      <div class="form-group">
         @if($product->picture != null)
            <td><img src="/img/products/{{ $product->picture }}" height="150" width="150"></td>
         @endif
         @if ($product->picture == null)
            <td><img src="/img/unavailable.jpg" height="150" width="150"></td>
         @endif
      </div>
      <div class="input-group-prepend col-md">
         <button type="submit" class="btn btn-primary col-md-3">Update product</button>
         <div class="col-md-1"></div>
         <a class="col-md-3 btn btn-outline-secondary" href="/products">Return</a>
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
