@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product Update</h1>
        <div class="panel panel-primary">
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <div class="row">
                    <div class="col-md-8">
                        <form method="post" action=" {{url('/products/edit/'.$product->id)}} ">
                            <div class="form-group">
                                <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                <input type="hidden" value="{{ $product->id }}" name="id"/>
                                <label for="name">Product Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" required/>
                            </div>
                            <div class="form-group">
                                <label for="descriptions">Product descriptions:</label>
                                <textarea cols="5" rows="5" class="form-control" name="descriptions" required> {{ $product->descriptions }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Product Price:</label>
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}" required/>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Choose Category:</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">Choose One....</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected': ''}}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="produced_on">Produced Date:</label>
                                <input type="text" class="form-control" name="produced_on" value="{{ $product->produced_on }}" required/>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{action('ProductController@index')}}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
