@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">
                <div class="card-header">New Product</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-group" action="{{route('update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                      @csrf

                      <label for="name">Product Name</label>
                      <input type="text" class="form-control" name="name" value="{{$product->name}}">
                      <div style="color: red">@if($errors->has('name')) {{$errors->first('name')}}@endif</div>
                      <label for="description">Description</label>
                      <input type="text" class="form-control" name="description" value="{{$product->description}}">
                      <div style="color: red">@if($errors->has('description')) {{$errors->first('description')}}@endif</div>
                      <label for="image">Image</label>
                      <input type="file" class="form-control" name="image">
                      <br>
                      <label for="price">Price</label>
                      <input type="number" class="form-control" name="price" value="{{$product->price}}">
                      <div style="color: red">@if($errors->has('price')) {{$errors->first('price')}}@endif</div><br>
                      <button type="submit" class="btn btn-outline-success">Upload Product</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
