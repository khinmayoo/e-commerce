@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Product Detail</h1>
            <div class="panel panel-primary">
                <div class="panel-body">
                        <div class="panel-heading"><h1>{{title_case('Product '. $product->id)}}</h1></div>
                    <ul>
                        <li>Name: {{ $product->name }}</li>
                        <li>Descriptions: {{ $product->descriptions }}</li>
                        <li>Price: {{ $product->price }} MMK</li>
                        <li>Produced on: {{ $product->produced_on }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <a href="{{action('ProductController@index')}}" class="btn btn-success">Back</a>
    </div>
@endsection
