@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover table-light">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        @if($products->count()>0)
                        @foreach($products as $product)
                        <tr>
                          <td>{{$product->name}}</td>
                          <td>{{$product->price}}</td>
                          <td><a href="{{route('edit', ['id' => $product->id])}}" class="btn btn-success">Edit</a></td>
                          <td><a href="{{route('destroy', ['id' => $product->id])}}" class="btn btn-danger">X</a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                          <th colspan="5" class="text-center">No Products Yet</th>
                        </tr>
                      @endif
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
