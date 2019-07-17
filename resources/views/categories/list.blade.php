
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    {{\Session::get('success')}}
                </div>
            @endif
            <h1>Category Lists</h1>
            <div class="panel panel-primary">
                <div class="panel-body">
                    @if(count($categories) > 0)
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->descriptions}}</td>
                                    <td><a href="{{action('CategoryController@show',$category->id)}}" class="btn btn-primary">Detail</a></td>
                                    <td><a href="{{action('CategoryController@edit',$category->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{url('/categories/'.$category->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $categories->links() }}
                            </tbody>
                        </table>
                        @else
                        <p style="text-align: center">There is no Category</p>
                    @endif
                </div>
            </div>
            <a href="{{action('CategoryController@create')}}" class="btn btn-success">Create</a>
        </div>
    </div>
@endsection
