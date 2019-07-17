@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Category Registration</h1>
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
                        <form method="post" action=" {{url('/categories/create')}} ">
                            <div class="form-group">
                                <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                <label for="name">Category Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name')}}" required/>
                            </div>
                            <div class="form-group">
                                <label for="descriptions">Category descriptions:</label>
                                <textarea cols="5" rows="5" class="form-control" name="descriptions" required> {{ old('descriptions') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{action('CategoryController@index')}}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
