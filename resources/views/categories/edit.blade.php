@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Category Update</h1>
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
                        <form method="post" action=" {{url('/categories/edit/'.$category->id)}} ">
                            <div class="form-group">
                                <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                <input type="hidden" value="{{ $category->id }}" name="id"/>
                                <label for="name">Product Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}" required/>
                            </div>
                            <div class="form-group">
                                <label for="descriptions">Product descriptions:</label>
                                <textarea cols="5" rows="5" class="form-control" name="descriptions" required> {{ $category->descriptions }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{action('CategoryController@index')}}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
