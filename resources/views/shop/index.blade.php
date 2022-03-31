@extends('admin.index')

@section('content')


<!-- End Search Bar -->

<h2>Sotuv Ofisi</h2>
<hr>



<form class="row g-3 d-flex justify-content-between align-center form-control m-1" action="{{ route('product-id') }}">
    @csrf
    <h4 class="col-md-6">Tavar ID raqamini kiriting:</h4>
    <div class="div col-md-6 d-flex aling-center justify-content-between">
    <div class="col-auto" style="width:80%">
        <label for="inputPassword2" class="visually-hidden">Tavar</label>
        <input type="text" name="productid"  class="form-control" id="inputPassword2" placeholder="ID kiriting:">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2">Topish</button>
    </div>
    </div>
</form>

<hr>





@endsection