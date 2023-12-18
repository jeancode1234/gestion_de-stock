<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index ()
    {
        $clients = User::where('type',0)->orderBy('created_at','DESC')->paginate(5);

        return view('clients.index',compact('clients'));
    }

    public function destroy(int $id)
    {
        $client = User::find($id);
        $client->delete();
        return back();
    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }
    public function update(Request $request,User $user)
    {
       $request->validate([
          'nom'=>'nullable',
          'adresse'=>'nullable',
          'telephone'=>'nullable',
          'email' =>['nullable',Rule::unique('users')->ignore($user->id)],
          'password'=>'nullable|confirmed',
       ]);

       $user->nom = $request->input('nom') ?? $user->nom;
       $user->adresse = $request->input('adresse') ?? $user->adresse;
       $user->telephone = $request->input('telephone') ?? $user->telephone;
        $user->email = $request->input('email') ?? $user->email;
        $user->password = $request->input('password') ?? $user->password;
        $user->save();

        return back();
    }

    
}
