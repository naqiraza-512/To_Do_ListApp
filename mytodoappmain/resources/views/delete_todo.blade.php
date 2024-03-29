@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete {{ $todo->Title }}</div>
                <hS class="card-header">
                    <a href="{{ route('todo.index') }}" class="btn btn-sm brn-outline-primary"><i class="fa fa arraw-left"></i> Back to list</a>
                </hS>
                <div class="card-body">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                

                <form method="POST" action="{{ route('todo.destroy' , $todo->id) }}">
                        @csrf
                        @method("Delete")
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <h4>
                                    Are you sure that you want to delete {{ $todo->delete }} ?
                                </h4>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    Yes
                                </button>
                                <a href="{{ route('todo.index') }}" class="btn btn-info">No</a>
                            </div>
                        </div>
                    </form>

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
