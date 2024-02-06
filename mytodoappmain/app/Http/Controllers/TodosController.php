<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $todos = Todo::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('home', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('add_todo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request , [
            'Title' => 'required | string',
            'description' => 'nullable | string',
            'completed' => 'nullable'

        ]);

        $todo = new Todo;

        $todo->Title = $request->input('Title');
        $todo->description = $request->input('description');
        if($request->has('completed'))
        {
            $todo->Completed = true;
        }
        $todo->user_id = Auth::user()->id;
        $todo->save();
        return back()->with('success','Item added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $todo = Todo::where('id', $id)->where('user_id', Auth::user()->id)->first();
        return view('delete_todo', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $todo = Todo::where('id', $id)->where('user_id', Auth::user()->id)->first();
        return view('edit_todo', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request , [
            'Title' => 'required | string',
            'description' => 'nullable | string',
            'completed' => 'nullable'

        ]);

        $todo = Todo::find($id);

        $todo->Title = $request->input('Title');
        $todo->description = $request->input('description');
        if($request->has('completed'))
        {
            $todo->Completed = true;
        }
        else
        {
            $todo->Completed = false;
        }

        $todo->save();
        return back()->with('success','Item updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $todo = Todo::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $todo->delete();
        return redirect()->route('todo.index')->with('success','Successfully Deleted Item');
    }
}
