<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;

class TodoController extends Controller
{
    public function index() {

        $todos = todo::all();

        return view('todos', [
            'todos' => $todos
        ]);
    }

    public function create(Request $request){

        $request->validate([
            'title'=>'required',
            'desc'=>'required',
        ]);

        todo::create([
            'title' => $request->title,
            'desc' => $request->desc
        ]);

        return redirect('/');
    }

    public function destroy($id){

        Todo::where('id','=',$id)->delete();

        return redirect('/');
    }

    public function update(Request $request){

        $request->validate([
            'title'=>'required',
            'desc'=>'required',
        ]);

        todo::where('id','=',$request->id)->update([
            'title'=>$request->title,
            'desc'=>$request->desc
        ]);

        return redirect('/');
    }
}
