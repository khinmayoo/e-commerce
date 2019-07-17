
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    {{\Session::get('success')}}
                </div>
            @endif
            <h1>Product Lists of {{ $category->name }}</h1>
            <div class="panel panel-primary">
                <div class="panel-body">
                    @if(count($category->products) > 0)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Category</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Produced On</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category->products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td><a href="{{action('CategoryController@show',$product->category->id)}}">{{$product->category->name}}</a></td>
                                    <td>{{$product->descriptions}}</td>
                                    <td>{{$product->price}} MMK</td>
                                    <td>{{$product->produced_on}}</td>
                                    <td><a href="{{action('ProductController@show',$product->id)}}" class="btn btn-primary">Detail</a></td>
                                    <td><a href="{{action('ProductController@edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{url('/products/'.$product->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p style="text-align: center">There is no products on this Category</p>
                    @endif
                </div>
            </div>
            <a href="{{action('CategoryController@create')}}" class="btn btn-success">Create</a>
            <a href="{{action('CategoryController@index')}}" class="btn btn btn-primary">Back</a>
        </div>
    </div>
@endsection
