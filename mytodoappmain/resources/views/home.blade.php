@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TO DO LIST') }}</div>
                <h5 class="card-header">
                    <a href="{{ route('todo.create') }}" class="btn btn-sm btn-outline-primary">Add Item</a>
                </h5>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                   <table class="table table-hover table-borderless">
                    <thead>
                        <th scope="col">Item</th>
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                        @forelse( $todos as $todo)
                        <tr>
                            @if ( $todo->Completed )
                            <td>
                                <a href="{{ route('todo.edit', $todo->id ) }}" style="color: green">
                                    
                                <s>
                                {{ $todo->Title }}
                                </s>
                                </a>
                                
                            </td>
                            @else
                            <td>
                            <a href="{{ route('todo.edit', $todo->id ) }}" style="color: black">
                                    {{ $todo->Title }}
                                    </a> 
                                     
                            </td>
                            @endif
                            <td>
                                <a href="{{ route('todo.edit', $todo->id ) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{ route('todo.destroy', $todo->id ) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td>
                                No Tasks
                            </td>
                            
                        </tr>

                        @endforelse
                        
                    </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
