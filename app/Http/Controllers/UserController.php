<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User;
        $userFound = $user->firstOrCreate(
            ['firstName' => 'Daniel'],
            [       
                'lastName' => 'Matuda',
                'email' => 'danielmatudaoficial@gmail.com',
                'password' => bcrypt('123'),
                'is_admin' => true
            ]
        );


        return view('user_create', [
            'title' => 'Create User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        // $saved = (new User)->create($validated);

        $saved = (new User())->insert($validated);

        ($saved) ?
            Session::flash('success', 'Cadastrado com sucesso'):
            Session::flash('error', 'Erro ao cadastrar');
        

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user', [
            'title' => 'User',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit', [
            'title' => 'Edit user',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ]);

        // $user->firstName = $validated['firstName'];
        // $user->lastName = $validated['lastName'];
        // $user->email = $validated['email'];
        // $updated = $user->save();

        $updated = $user->update($validated);

        ($updated) ?
            Session::flash('updated_success', 'Atualizado com sucesso'):
            Session::flash('updated_error', 'Erro ao atualizar');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}





