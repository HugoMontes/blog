<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(5);
        return view('admin.users.index')->with('users', $users);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        flash("El usuario $user->name ha sido creado de forma exitosa.")->success()->important();

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(User $user)
    {
        $user->delete();

        flash("El usuario $user->name ha sido eliminado de forma exitosa.")->success()->important();

        return redirect()->route('users.index');
    }
}
