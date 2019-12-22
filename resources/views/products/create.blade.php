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

  <h1 class="title muted-text display-4"> Add new products</h1>

   <div class="row">
      <div class="col-sm-1"></div>
      <form method="POST" class ="col-md-7" action="/products/create" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
            <label for="skuInput">SKU number: </label>
            <input autofocus type="number" name="sku" class="form-control @error('sku') is-invalid @enderror" id="skuInput" placeholder="Enter SKU number" value="{{ old('sku') }}">
            @if ($errors->has('sku'))
                  <p class="form-text text-danger"> {{ $errors->first('sku') }} </p>
            @endif
         </div>
         <div class="form-group">
            <label for="nameInput">Product name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nameInput" placeholder="Enter name" value="{{ old('name') }}">
            @if ($errors->has('name'))
                  <p class="form-text text-danger"> {{ $errors->first('name') }} </p>
            @endif
         </div>
         <div class="form-group">
            <label for="quantityInput">Quantity: </label>
            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantityt" placeholder="Enter quantity number" value="{{ old('quantity') }}">
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
               <input type="number" name="price" class="form-control currency" placeholder="Price" value="{{ old('price') }}" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100">
            </div>
            @if ($errors->has('price'))
               <p class="form-text text-danger"> {{ $errors->first('price') }} </p>
            @endif
         </div>
         <div class="form-group">
            <label for="emailInput">Product description:</label>
            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="descriptionInput" placeholder="Enter description" value="{{ old('description') }}" rows="7"> {{ old('description') }} </textarea>
            @if ($errors->has('description'))
                  <p class="form-text text-danger"> {{ $errors->first('description') }} </p>
            @endif
         </div>
         <div class="form-group">
            <label for="picture">Product's picture:</label>
            <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" id="pictureInput" placeholder="Select file" value="{{ old('picture') }}">
            @if ($errors->has('picture'))
                  <p class="form-text text-danger"> {{ $errors->first('picture') }} </p>
            @endif
         </div>
         <div class="input-group-prepend col-md">
            <button type="submit" class="btn btn-primary col-md-3">Create product</button>
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
