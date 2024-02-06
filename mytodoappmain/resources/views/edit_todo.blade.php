@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{ $todo->Title }}</div>
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
                @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                <form method="POST" action="{{ route('todo.update' , $todo->id) }}">
                        @csrf
                        @method("Put")
                        <div class="form-group row">
                            <label for="Title" class="col-form-label text-md-right">Title</label>

                            <input id="Title" type="Title" class="form-control @error('Title') is-invalid @enderror" name="Title" value="{{ $todo->Title }}" autocomplete="Title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-form-label text-md-right">Description</label>

                            <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('password') is-invalid @enderror" autocomplete="description" value="{{ $todo->description }}"></textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="form-check">
                                @if( $todo->Completed)                               
                                <input class="form-check-input" type="checkbox" name="completed" id="completed" value="{{ $todo->completed }}" checked >
                                @else
                                <input class="form-check-input" type="checkbox" name="completed" id="completed" value="{{ $todo->completed }}">
                                @endif
                                <label class="form-check-label" for="completed">
                                    Completed?
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
